<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
        .progress {
            height: 5px;
        }
        .btn-nav {
            width: 100px;
        }
        .section-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-5 rounded-lg shadow-lg">
            <h2>Some resources to help you reduce your environmental impact:</h2>
            <h2 class="text-2xl font-bold mb-4 text-center">Environmental Impact Suggestions</h2>
            @if(isset($suggestions['error']))
                <div class="text-red-500">
                    <p>Error: {{ $suggestions['error']['message'] }}</p>
                </div>
            @else
            @if(isset($local_programs))
            <div class="p-5">

                {!! $local_programs !!}
            </div>
            @endif
                @if(isset($suggestions))
                {{-- @dd($suggestions) --}}
                @php
                    $counter = 1;
                @endphp
                <h3>Suggesstions for each Section you answered</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach($suggestions as $key => $suggestion)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading{{$counter}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$counter}}" aria-expanded="false" aria-controls="flush-collapse{{$counter}}">
                                {{$key}}
                            </button>
                            </h2>
                            <div id="flush-collapse{{$counter}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$counter}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    {!! $suggestion[0] !!}
                                </div>
                            </div>
                        </div>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                </div>
                   
                @endif

                @if(isset($suggestions['metrics']))
                    <div class="mt-4 text-gray-700">
                        <h3 class="text-xl font-bold mb-2">City Usage Metrics:</h3>
                        <p><strong>Average Energy Usage:</strong> {{ $suggestions['metrics']['average_energy_usage'] }}</p>
                        <p><strong>Average Water Usage:</strong> {{ $suggestions['metrics']['average_water_usage'] }}</p>
                    </div>
                @endif
             @endif
            <div class="mt-4 text-center">
                <a href="{{ route('calculator') }}" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Go Back</a>
            </div>
        </div>
    </div>
</body>

</html>    

