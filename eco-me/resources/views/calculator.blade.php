
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Comprehensive Environmental Impact Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Comprehensive Environmental Impact Calculator</h1>
        <div class="progress mb-4">
            <div class="progress-bar bg-success" role="progressbar" style="width: 0%"></div>
        </div>
        
        <form id="environmental-form" class="needs-validation" novalidate action="/results">
            @csrf


            <!-- Location and Housing Section -->
            <div class="form-section active" id="section-1">
                <div class="text-center section-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h3 class="mb-4 title">Location and Housing</h3>
                <div class="mb-3">
                    <label for="zipcode" class="form-label">What's your city?</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="mb-3">
                    <label for="dwelling-type" class="form-label">What type of dwelling do you live in?</label>
                    <select class="form-select" id="dwelling-type" name="dwelling_type" required>
                        <option value="">Choose...</option>
                        <option>Apartment</option>
                        <option>House</option>
                        <option>Townhouse</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="household-size" class="form-label">How many people are in your household?</label>
                    <input type="number" class="form-control" id="household-size" name="household_size" required>
                </div>
                <div class="mb-3">
                    <label for="living-space" class="form-label">What's the size of your living space in square meters?</label>
                    <input type="number" class="form-control" id="living-space" name="living_space_size" required>
                </div>
            </div>


            <!-- Transportation Section -->
            <div class="form-section " id="section-2">
                <div class="text-center section-icon"><i class="fas fa-car"></i></div>
                <h3 class="mb-4 title">Transportation</h3>
                <div class="mb-3">
                    <label for="commute" class="form-label">How do you primarily commute to work/school?</label>
                    <select class="form-select" id="commute" name="commute" required>
                        <option value="">Choose...</option>
                        <option>Car</option>
                        <option>Public Transport</option>
                        <option>Bicycle</option>
                        <option>Walk</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="distance" class="form-label">How many kilometers do you travel daily?</label>
                    <input type="number" class="form-control" id="distance" name="distance" required>
                </div>
                <div class="mb-3">
                    <label for="vehicle-type" class="form-label">What type of vehicle do you own (if any)?</label>
                    <select class="form-select" name="vehicle_type" id="vehicle-type">
                        <option value="">Choose...</option>
                        <option>None</option>
                        <option>Gasoline Car</option>
                        <option>Diesel Car</option>
                        <option>Electric Car</option>
                        <option>Hybrid Car</option>
                        <option>Motorcycle</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="public-transport-frequency" class="form-label">How often do you use public transportation?</label>
                    <select class="form-select" id="public-transport-frequency" name="public_transport_frequency" required>
                        <option value="">Choose...</option>
                        <option>Daily</option>
                        <option>Several times a week</option>
                        <option>Once a week</option>
                        <option>Rarely</option>
                        <option>Never</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="flight-frequency" class="form-label">How often do you fly for work or leisure?</label>
                    <select class="form-select" id="flight-frequency" name="flight_frequency" required>
                        <option value="">Choose...</option>
                        <option>Never</option>
                        <option>Once a year</option>
                        <option>2-3 times a year</option>
                        <option>4-6 times a year</option>
                        <option>Monthly or more</option>
                    </select>
                </div>
            </div>

            <!-- Home Energy Use Section -->
            <div class="form-section" id="section-3">
                <div class="text-center section-icon"><i class="fas fa-home"></i></div>
                <h3 class="mb-4 title">Home Energy Use</h3>
                <div class="mb-3">
                    <label for="heating-source" class="form-label">What's your home's primary heating source?</label>
                    <select class="form-select" id="heating-source" name="heating_source" required>
                        <option value="">Choose...</option>
                        <option>Natural Gas</option>
                        <option>Electricity</option>
                        <option>Oil</option>
                        <option>Renewable Energy</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="heating-hours" class="form-label">How many hours per day do you use heating/cooling?</label>
                    <input type="number" class="form-control" id="heating-hours" name="heating_hours" required>
                </div>
                <div class="mb-3">
                    <label for="electricity-consumption" class="form-label">What's your average monthly electricity consumption (in kWh)?</label>
                    <input type="number" class="form-control" id="electricity-consumption" name="electricity_consumption" required>
                </div>
                <div class="mb-3">
                    <label for="renewable-energy" class="form-label">Do you use any renewable energy sources at home?</label>
                    <select class="form-select" id="renewable-energy" name="renewable_energy" required>
                        <option value="">Choose...</option>
                        <option>No</option>
                        <option>Solar Panels</option>
                        <option>Wind Turbine</option>
                        <option>Geothermal</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lightbulb-type" class="form-label">What type of lightbulbs do you primarily use?</label>
                    <select class="form-select" id="lightbulb-type" name="lightbulb_type" required>
                        <option value="">Choose...</option>
                        <option>Incandescent</option>
                        <option>CFL</option>
                        <option>LED</option>
                        <option>Halogen</option>
                    </select>
                </div>
            </div>

            <!-- Diet and Consumption Section -->
            <div class="form-section" id="section-4">
                <div class="text-center section-icon"><i class="fas fa-utensils"></i></div>
                <h3 class="mb-4 title">Diet and Consumption</h3>
                <div class="mb-3">
                    <label for="diet" class="form-label">How would you describe your diet?</label>
                    <select class="form-select" id="diet" name="diet" required>
                        <option value="">Choose...</option>
                        <option>Omnivore</option>
                        <option>Vegetarian</option>
                        <option>Vegan</option>
                        <option>Pescatarian</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="meat-frequency" class="form-label">How often do you eat meat per week?</label>
                    <input type="number" class="form-control" id="meat-frequency" name="meat_fequency" required>
                </div>
                <div class="mb-3">
                    <label for="local-food" class="form-label">Do you prioritize locally sourced food?</label>
                    <select class="form-select" id="local-food" name="local_food" required>
                        <option value="">Choose...</option>
                        <option>Always</option>
                        <option>Often</option>
                        <option>Sometimes</option>
                        <option>Rarely</option>
                        <option>Never</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="food-waste" class="form-label">How much food waste does your household produce weekly (in kg)?</label>
                    <input type="number" class="form-control" id="food-waste" name="food_waste" required>
                </div>
            </div>

            <!-- Waste and Recycling Section -->
            <div class="form-section" id="section-5">
                <div class="text-center section-icon"><i class="fas fa-recycle"></i></div>
                <h3 class="mb-4 title">Waste and Recycling</h3>
                <div class="mb-3">
                    <label for="recycling" class="form-label">Do you recycle? If so, what materials?</label>
                    <select class="form-select" id="recycling" name="recycling" multiple required>
                        <option value="paper">Paper</option>
                        <option value="plastic">Plastic</option>
                        <option value="glass">Glass</option>
                        <option value="metal">Metal</option>
                        <option value="electronics">Electronics</option>
                        <option value="none">I don't recycle</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="composting" class="form-label">Do you compost organic waste?</label>
                    <select class="form-select" id="composting" name="composting" required>
                        <option value="">Choose...</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="non-recyclable-waste" class="form-label">How much non-recyclable waste does your household produce weekly (in kg)?</label>
                    <input type="number" class="form-control" id="non-recyclable-waste" name="non_recycling_waste" required>
                </div>
            </div>

            <!-- Water Usage Section -->
            <div class="form-section" id="section-6">
                <div class="text-center section-icon"><i class="fas fa-tint"></i></div>
                <h3 class="mb-4 title">Water Usage</h3>
                <div class="mb-3">
                    <label for="shower-length" class="form-label">How long is your average shower (in minutes)?</label>
                    <input type="number" class="form-control" id="shower-length" name="shower_length" required>
                </div>
                <div class="mb-3">
                    <label for="water-saving-fixtures" class="form-label">Do you use water-saving fixtures?</label>
                    <select class="form-select" id="water-saving-fixtures" name="water_saving_fixtures" required>
                        <option value="">Choose...</option>
                        <option>Yes</option>
                        <option>No</option>
                        <option>Some</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="water-collection" class="form-label">Do you collect rainwater or reuse greywater?</label>
                    <select class="form-select" id="water-collection" name="water_collection" required>
                        <option value="">Choose...</option>
                        <option>Yes, both</option>
                        <option>Rainwater only</option>
                        <option>Greywater only</option>
                        <option>No</option>
                    </select>
                </div>
            </div>

            <!-- Consumer Habits Section -->
            <div class="form-section" id="section-7">
                <div class="text-center section-icon"><i class="fas fa-shopping-cart"></i></div>
                <h3 class="mb-4 title">Consumer Habits</h3>
                <div class="mb-3">
                    <label for="clothes-buying" class="form-label">How often do you buy new clothes?</label>
                    <select class="form-select" id="clothes-buying" name="clothes_buying" required>
                        <option value="">Choose...</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>Quarterly</option>
                        <option>Annually</option>
                        <option>Rarely</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="eco-products" class="form-label">Do you prioritize eco-friendly or second-hand products?</label>
                    <select class="form-select" id="eco-products" name="eco_products" required>
                        <option value="">Choose...</option>
                        <option>Always</option>
                        <option>Often</option>
                        <option>Sometimes</option>
                        <option>Rarely</option>
                        <option>Never</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="electronics-replacement" class="form-label">How often do you replace electronic devices?</label>
                    <select class="form-select" id="electronics-replacement" name="electronics_replacement" required>
                        <option value="">Choose...</option>
                        <option>Annually</option>
                        <option>Every 2-3 years</option>
                        <option>Every 4-5 years</option>
                        <option>Only when broken</option>
                    </select>
                </div>
            </div>

            <!-- Lifestyle Section -->
            <div class="form-section" id="section-8">
                <div class="text-center section-icon"><i class="fas fa-heart"></i></div>
                <h3 class="mb-4 title">Lifestyle</h3>
                <div class="mb-3">
                    <label for="work-from-home" class="form-label">Do you work from home? If so, how many days per week?</label>
                    <input type="number" class="form-control" id="work-from-home" name="work_from_home" min="0" max="7" required>
                </div>
                <div class="mb-3">
                    <label for="environmental-initiatives" class="form-label">Do you participate in any environmental initiatives?</label>
                    <select class="form-select" id="environmental-initiatives" name="environmental_initiatives" required>
                        <option value="">Choose...</option>
                        <option>Yes, regularly</option>
                        <option>Yes, occasionally</option>
                        <option>No, but interested</option>
                        <option>No, not interested</option>
                    </select>
                </div>
            </div>

            <!-- Energy Efficiency Section -->
            <div class="form-section" id="section-9">
                <div class="text-center section-icon"><i class="fas fa-bolt"></i></div>
                <h3 class="mb-4 title">Energy Efficiency</h3>
                <div class="mb-3">
                    <label for="appliance-rating" class="form-label">What's the average energy rating of your major appliances?</label>
                    <select class="form-select" id="appliance-rating" name="applicance_rating" required>
                        <option value="">Choose...</option>
                        <option>A+++ (Most efficient)</option>
                        <option>A++</option>
                        <option>A+</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C or below</option>
                        <option>I don't know</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="smart-home" class="form-label">Do you use smart home devices to manage energy consumption?</label>
                    <select class="form-select" id="smart-home" name="smart_home" required>
                        <option value="">Choose...</option>
                        <option>Yes, extensively</option>
                        <option>Yes, a few devices</option>
                        <option>No, but interested</option>
                        <option>No, not interested</option>
                    </select>
                </div>
            </div>

            <!-- Green Spaces Section -->
            <div class="form-section" id="section-10">
                <div class="text-center section-icon"><i class="fas fa-tree"></i></div>
                <h3 class="mb-4 title">Green Spaces</h3>
                <div class="mb-3">
                    <label for="home-plants" class="form-label">Do you have a garden or plants at home?</label>
                    <select class="form-select" id="home-plants" name="home_plants" required>
                        <option value="">Choose...</option>
                        <option>Yes, a garden</option>
                        <option>Yes, indoor plants</option>
                        <option>Yes, both</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="park-visits" class="form-label">How often do you visit parks or natural areas?</label>
                    <select class="form-select" id="park-visits" name="park_visits" required>
                        <option value="">Choose...</option>
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>Rarely</option>
                        <option>Never</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary btn-nav" id="prevBtn" onclick="navigate(-1)" disabled>Previous</button>
                <button type="button" class="btn btn-primary btn-nav" id="nextBtn" onclick="navigate(1, this)">Next</button>
                <button type="submit" class="btn btn-success btn-nav" id="submitBtn" style="display: none" >Show Results</button>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentSection = 1;
        const totalSections = 10;

        function showResults(){
            fetch('/results', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.getElementsByName('_token')[0].value
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Form data submitted successfully', data);
                })
                .catch(error => {
                    console.error('Error submitting form data:', error);
                });
        }
        function navigate(direction, section = null) {
            
            const form = document.getElementById('environmental-form');
            // if (form.checkValidity() === false) {
            //     event.preventDefault();
            //     event.stopPropagation();
            //     form.classList.add('was-validated');
            //     console.log('Navigating', direction);
            //     return;
            // }
            // console.log('Hear', direction);


            
            document.getElementById(`section-${currentSection}`).classList.remove('active');
            currentSection += direction;
            document.getElementById(`section-${currentSection}`).classList.add('active');
            
            updateButtons();
            updateProgressBar();

            if(direction == 1){

                let section = document.getElementById('section-' + (currentSection - 1) );
                let inputs = section.querySelectorAll('input, select');

                let formData = {};

                inputs.forEach(input => {
                    // Handle radio buttons: only store the value if the radio is checked
                    if (input.type === 'radio') {
                        if (input.checked) {
                            formData[input.name] = input.value;
                        }
                    } else {
                        // Store other input types (text, number, etc.)
                        formData[input.name] = input.value;
                    }
                });

                formData['title'] = section.querySelector('.title').innerHTML;
                formData = JSON.stringify(formData);

                fetch('/handle-submit', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':  document.getElementsByName('_token')[0].value
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Form data submitted successfully', data);

                })
                .catch(error => {
                    console.error('Error submitting form data:', error);
                });
            }


        }

        function updateButtons() {
            document.getElementById('prevBtn').disabled = (currentSection === 1);
            if (currentSection === totalSections) {
                document.getElementById('nextBtn').style.display = 'none';
            } else {
                document.getElementById('nextBtn').style.display = 'block';
            }

            if (currentSection == 3 ){
                document.getElementById('submitBtn').style.display = 'block';
            }
        }

        function updateProgressBar() {
            const progress = ((currentSection - 1) / (totalSections - 1)) * 100;
            document.querySelector('.progress-bar').style.width = `${progress}%`;
        }

        document.getElementById('environmental-form').addEventListener('submit', function(event) {
            event.preventDefault();
            // if (this.checkValidity()) {
                this.submit();
            // }
            this.classList.add('was-validated');
        });
    </script>
</body>
</html>