<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;



class EnviromentController extends Controller
{
    public function calculateForm(Request $request): View
    {
        // Session::flush();
        Session::forget('suggestions_array');
        Session::forget('user_city');
        $users = DB::table('users')->get()->toArray();
        $suggestions_array = [];
        return view('calculator');
    }
    
    public function handleSubmit(Request $request)
    {

        $data = $request->json()->all();
        $section_title = $data['title'] ?? null;
        $insertId = null;
        $user_city = null;
        $suggestions_array = session('suggestions_array', []);

        if(isset($data['city'])){
            $insertId = DB::table('users')->insertGetId([
                'city' => $data['city']
            ]);
        } 

        if($insertId){
            $user_city = DB::table('users')->where('id', $insertId)->value('city');
            Session::put('user_city', $user_city);
        }

        $suggestions_array = session('suggestions_array', []);
        $user_city = $data['city'] ?? session('user_city');
        $suggestions = $this->getSuggestions($data, false, $user_city);

        if($section_title){
            $text = $suggestions['candidates'][0]['content']['parts'][0]['text'];

            // Replace ** with <strong> for bold text
            $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);

            // Replace * with <li> for list items
            $text = preg_replace('/\* (.*?)\n/', '<li>$1</li>', $text);

            // Convert newlines to <br>
            $text = nl2br($text);

            $suggestions_array[$section_title] = [$text];
            Session::put('suggestions_array', $suggestions_array);
        }

    }

    public function showResults(Request $request): View
    {
        $suggestions_array = session('suggestions_array', []);
        $local_programs = $this->getSuggestions([], true, session('user_city'));
        $text = $local_programs['candidates'][0]['content']['parts'][0]['text'] ?? "";

        // // Replace ** with <strong> for bold text
        // $text = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $text);

        // // Replace * with <li> for list items
        // $text = preg_replace('/\* (.*?)\n/', '<li>$1</li>', $text);

        // // Convert newlines to <br>
        // $text = nl2br($text);

        $local_programs = $text;


        return view('results', ['suggestions' => $suggestions_array, 'local_programs' => $local_programs]);
    }

    private function getSuggestions($data, $showResults = false, $user_city = null)
    {
        $apiKey = env('GEMINI_API_KEY');

        if( $showResults ) {
            $prompt = "Provide information on environmental initiatives and volunteer opportunities available in" . $user_city .  ". Include active links to relevant organizations and resources, also ensure the links works, I dont 404 pages. Highlight local government programs, community organizations, and potential actions residents can take to reduce their environmental impact. Return me the results in html format with link opening in a new tab. Also add in a small paragraph about latest environmental news in my city.";
        } else {
            $prompt = "Analyze the following data to provide personalized recommendations for reducing environmental impact and potential cost savings:

            " . json_encode($data) . "

            Consider factors such as energy efficiency, renewable energy potential, and local climate. Provide specific recommendations for reducing energy consumption and potential cost savings. Calculate the approximate carbon footprint reduction and potential cost savings. Also my location is " . $user_city . " consider averages for my city and provide recommendations based on that.";
        }
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key={$apiKey}", [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        if ($response->failed()) {
            return ['error' => $response->json()];
        }

        return $response->json();
    }


}