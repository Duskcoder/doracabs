@include('common.header')
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<section>
    <div class="form my-5">
        <div class="container">
            <div class="row ">
                <!-- <div class="col-sm-6 col-md-6 mt-lg-3">-->
                <div class="col-md-6">
                    @if (Request::get('trip') == 'Round')
                        @foreach ($cars as $car)
                            <div class="mb-3">
                                <li>
                                    <input type="radio" id="car1{{ $car->id }}" name="car1"
                                        onclick="km_cost({{ $car->id }},{{ $car->oneway_km_cost }},{{ $car->round_km_cost }})">
                                    <label for="car1{{ $car->id }}">

                                        <img src="{{ URL::asset($car->file_path . '/' . $car->file_name) }}"
                                            alt="{{ $car->model_name }}" class="w-100 p-lg-3 car-logo p-1"
                                            style="width:25% !important">

                                        <div class="col-5 col-md-5">
                                            <p style="float:right">
                                                <small>{{ $car->model_name }}<br>({{ $car->round_km_cost }}/km)</small>
                                                <i data-toggle="tooltip" title="{{ $car->model_name }}"
                                                    class="fa fa-snowflake-o"></i>
                                            </p>
                                        </div>
                                    </label>
                                </li>
                            </div>
                        @endforeach
                    @endif
                    @if (Request::get('trip') == 'Oneway')
                        @foreach ($cars as $car)
                            @if ($loop->index < 3)
                                <!-- Set the limit to 10 cars -->
                                <div class="mb-3">
                                    <input type="radio" id="car1{{ $car->id }}" name="car1"
                                        onclick="km_cost({{ $car->id }},{{ $car->oneway_km_cost }},{{ $car->round_km_cost }})">
                                    <label for="car1{{ $car->id }}">

                                        <img src="{{ URL::asset($car->file_path . '/' . $car->file_name) }}"
                                            alt="{{ $car->model_name }}" class="w-100 p-lg-3 car-logo p-1"
                                            style="width:25% !important">

                                        <div class="col-5 col-md-5">
                                            <p style="float:right">
                                                <small>{{ $car->model_name }}<br>({{ $car->oneway_km_cost }}/km)</small>
                                                <i data-toggle="tooltip" title="{{ $car->model_name }}"
                                                    class="fa fa-snowflake-o"></i>
                                            </p>
                                        </div>
                                    </label>
                                </div>
                            @else
                            @break

                            <!-- Exit the loop after the specified limit is reached -->
                        @endif
                    @endforeach
                @endif
                <!-- <h2>Select Your Vehicle</h2>
@foreach ($cars as $car)
<div class="card mb-3 border-0 mt-5 donate-now">
<div class="row no-gutters">
<div class="col-3 col-md-3 carbodr{{ $car->id }} carhide">
<input type="radio" id="car1{{ $car->id }}"  name="car1" onclick="km_cost({{ $car->id }},{{ $car->oneway_km_cost }},{{ $car->round_km_cost }})">
<label>
<img src="{{ URL::asset($car->file_path . '/' . $car->file_name) }}" alt="car image" class="w-100 p-lg-3 car-logo p-1" style="width:25% !important">
</label>
</div>
<div class="col-5 col-md-5">
<div class="card-body">
<h5 class="card-title mb-0">{{ $car->model_name }}</h5>
<p class="card-text"><small class="text-muted">({{ $car->round_km_cost }}/km)</small></p>
</div>
</div>
</div>
</div>
@endforeach -->
            </div>
            <div class="col-md-6 ">

                <h2>PLAN YOUR TRIP</h2>
                <div class="tab-content tab_section" id="myTabContent">
                    <!----- Start first outer tab ----->
                    <!-- <div class="one_way_trip" id="home" role="tabpanel" aria-labelledby="home-tab"  id="oneway" ><b>One-Way Trip</b> -->
                    @if (Request::get('trip') == 'Oneway')
                        <form class="mt-4" id="onewaytrip" action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <input type="text" name="oneway_round" id="oneway_round" value="Oneway">
                            <input type="hidden" name="from_place1" id="from_place1"
                                value="{{ Request::get('source') }}">
                            <input type="hidden" name="to_place1" id="to_place1"
                                value="{{ Request::get('destination') }}">
                            <input type="hidden" name="pickupdate" id="depart_date1"
                                value="{{ Request::get('pickupdate') }}">
                            <input type="hidden" name="pickuptime" id=""
                                value="{{ Request::get('pickuptime') }}">
                            <input type="hidden" name="car_id" id="car_id1" value="">
                            <input type="hidden" name="charge_per_km" id="charge_per_km1" value="">
                            <input type="hidden" name="distance" id="distance1"
                                value="{{ Request::get('distance') }}">
                            <input type="hidden" name="amount" id="amount1" value="">
                            <input type="hidden" name="days" id="days1" value="1">
                            <input type="hidden" name="actualAmount" id="actualAmount1" value="">
                            <input type="hidden" name="driverBata" id="durationone"
                                value="{{ Request::get('duration') }}">

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="name"><b>Full Name</b></label>
                                        <input type="text" class="form-control" name="cust_name"
                                            id="cust_name" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="email"><b>Email (optional)</b></label>
                                        <input type="email" name="cust_email" id="cust_email"
                                            class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="pickup"><b>Pick Up Address</b></label>
                                        <input type="text" class="form-control" name="pickUpAddress"
                                            id="pickUpAddress" placeholder=""
                                            value="{{ Request::get('source') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="drop"><b>Drop Address</b></label>
                                        <input type="text" class="form-control" name="dropAddress"
                                            id="dropAddress" placeholder="" required
                                            value="{{ Request::get('destination') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 pt-3">
                                    <div class='input-group date'>
                                        <div class="input-group mb-3 form_clock form_dnt">
                                            <span class="input-group-text"><i class="fa fa-calendar"
                                                    aria-hidden="true"></i></span>
                                            <input type="text" name="pickupdate" id="datepicker3"
                                                class="form-control datetimepickerON" placeholder="Depart Date"
                                                required onchange="calc_amount('Oneway');">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 pt-3">
                                    <div class="input-group mb-3 form_clock form_dnt">
                                        <input type="time" name="pickuptime" required=""
                                            class="form-control timepicker" id=""
                                            placeholder="Select Time">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="card mb-3 calculation">
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <div class="card-body">
                                            <p class="card-title">Total Estimate Amount</p>
                                            <h6 class="text-center" id="amountText1"></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="card-body">
                                            <p class="card-title">This Trip Covers</p>
                                            <h6 class="text-center" id="distanceText1">
                                                {{ Request::get('distance') }} KM</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="card-body">
                                            <p class="card-title">Journey Duration</p>
                                            <h6 class="text-center" id="durationText1">
                                                {{ Request::get('duration') }} KM</h6>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" class="booked w-100 border-0 p-2 mt-4">PLACE A BOOKING</button> -->
                                <div class="col-12 row mt-4">
                                    <div class="col-lg-8 col-12">
                                        <div class="form-group mt-3">
                                            <label for="pickup-location"><b>Enter Your Phone Number</b></label>
                                            <input type="text" class="form-control" name="cust_mbl1"
                                                id="pickup-location" aria-describedby="emailHelp"
                                                placeholder="Phone Number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 my-lg-5 mb-4 proceed-btn">
                                    <button type="submit" class="btn btn-warning"
                                        style="border-radius:50px;">PLACE A BOOKING</button>
                                    <!-- <button type="submit" class="booked w-100 border-0 p-2 mt-4"></button>-->
                                </div>
                            </div>
                        </form>
                    @endif

                    <!-- </div> -->
                    <!-- </div> -->
                    @if (Request::get('trip') == 'Round')
                        <form class="mt-4" id="roundtrip" action="{{ route('booking.store') }}"
                            method="POST">
                            @csrf
                            <input type="text" name="oneway_round" id="oneway_round" value="Round">
                            <input type="hidden" name="from_place2" id="from_place2"
                                value="{{ Request::get('source') }}">
                            <input type="hidden" name="to_place2" id="to_place2"
                                value="{{ Request::get('destination') }}">
                            <input type="hidden" name="pickupdate" id="depart_date2"
                                value="{{ Request::get('pickupdate') }}">
                            <input type="hidden" name="pickuptime" id=""
                                value="{{ Request::get('pickuptime') }}">
                            <input type="hidden" name="return_date2" id="return_date2"
                                value="{{ Request::get('returndate') }}">
                            <input type="hidden" name="car_id2" id="car_id2" value="">
                            <input type="hidden" name="charge_per_km2" id="charge_per_km2" value="">
                            <input type="hidden" name="distance2" id="distance2"
                                value="{{ Request::get('distance') }}">
                            <input type="hidden" name="amount2" id="amount2" value="">
                            <input type="hidden" name="days2" id="days2" value="1">
                            <input type="hidden" name="actualAmount2" id="actualAmount2" value="">
                            <input type="hidden" name="driverBata2" id="driverBata2" value="">
                            <div class="row">
                                <br>
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="name"><b>Full Name</b></label>
                                        <input type="text" class="form-control" name="cust_name"
                                            id="cust_name" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="email"><b>Email (optional)</b></label>
                                        <input type="email" name="cust_email" id="cust_email"
                                            class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="pickup"><b>Pick Up Address</b></label>
                                        <input type="text" class="form-control" name="pickUpAddress"
                                            id="pickUpAddress" placeholder="" required
                                            value="{{ Request::get('source') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mt-4">
                                        <label for="drop"><b>Drop Address</b></label>
                                        <input type="text" class="form-control" name="dropAddress"
                                            id="dropAddress" placeholder="" required
                                            value="{{ Request::get('destination') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 pt-3">
                                    <div class='input-group date'>
                                        <div class="input-group mb-3 form_clock form_dnt">
                                            <span class="input-group-text"><i class="fa fa-calendar"
                                                    aria-hidden="true"></i></span>
                                            <input type="text" name="pickupdate" id="datepicker3"
                                                class="form-control datetimepickerON" placeholder="Depart Date"
                                                required onchange="calc_amount('Round');">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 pt-3">
                                    <div class="input-group mb-3 form_clock form_dnt">
                                        <input type="time" name="pickuptime" required=""
                                            class="form-control timepicker" id=""
                                            placeholder="Select Time">
                                    </div>
                                </div>
                                <div class="col-md-4 col-6 mt0">
                                    <div class='input-group date'>
                                        <div class="input-group mb-3 form_clock form_dnt">
                                            <span class="input-group-text"><i class="fa fa-calendar"
                                                    aria-hidden="true"></i></span>
                                            <input type="text" name="returndate" value=""
                                                class="form-control" id="datepicker1" placeholder="Return Date"
                                                onchange="calc_amount('Round');">
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 calculation">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <div class="card-body">
                                                <p class="card-title">Total Estimate Amount</p>
                                                <h6 class="text-center" id="amountText2">0</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="card-body">
                                                <p class="card-title">This Trip Covers</p>
                                                <h6 class="text-center" id="distanceText2">
                                                    {{ Request::get('distance') }} KM
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="card-body">
                                                <p class="card-title">Journey Duration</p>
                                                <h6 class="text-center" id="durationText2">
                                                    {{ Request::get('duration') }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="card-body">
                                                <p class="card-title">No of Days</p>
                                                <h6 class="text-center" name="daysText2" id="daysText2">0</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <button type="submit" class="booked w-100 border-0 p-2 mt-4">PLACE A BOOKING</button> -->
                            <div class="col-12 row mt-4">
                                <div class="col-lg-8 col-12">
                                    <div class="form-group mt-3">
                                        <label for="pickup-location"><b>Enter Your Phone Number</b></label>
                                        <input type="text" class="form-control" name="cust_mbl1"
                                            id="pickup-location" aria-describedby="emailHelp"
                                            placeholder="Phone Number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 my-lg-5 mb-4 proceed-btn">
                                <button type="submit" class="btn btn-warning" style="border-radius:50px;">PLACE
                                    A
                                    BOOKING</button>
                                <!-- <button type="submit" class="booked w-100 border-0 p-2 mt-4"></button>-->
                            </div>
                </div>

                </form>
                @endif
            </div>
            <input type="hidden" name="from_place" id="from_place" value="{{ Request::get('from') }}"
                placeholder="from_place">
            <input type="hidden" name="to_place" id="to_place" value="{{ Request::get('to') }}"
                placeholder="to_place">
            <input type="hidden" name="oneway_round" id="oneway_round" value="{{ Request::get('trip') }}"
                placeholder="charge_per_km">
            <input type="hidden" name="charge_per_km" id="charge_per_km" value="charge_per_km">
            <input type="hidden" name="distance" id="distance" value="{{ Request::get('distance') }}"
                placeholder="distance">
            <input type="hidden" name="duration" id="duration" value="{{ Request::get('duration') }}"
                placeholder="duration">
            <input type="hidden" name="latOrg1" id="latOrg1" value="{{ Request::get('latOrg1') }}"
                placeholder="latOrg1">
            <input type="hidden" name="lagOrg1" id="lagOrg1" value="{{ Request::get('lagOrg1') }}"
                placeholder="lagOrg1">
            <input type="hidden" name="Org2" id="Org2" value="{{ Request::get('Org2') }}"
                placeholder="Org2">
            <input type="hidden" name="desA" id="desA" value="{{ Request::get('desA') }}"
                placeholder="desA">
            <input type="hidden" name="desBlat" id="desBlat" value="{{ Request::get('desBlat') }}"
                placeholder="desBlat">
            <input type="hidden" name="desBlag" id="desBlag" value="{{ Request::get('desBlag') }}"
                placeholder="desBlag">
            <input type="hidden" name="car_id" id="car_id" value="" placeholder="car_id">
            <input type="hidden" name="days2" id="days2" value="">
            <input type="hidden" name="amount" id="amount" value="" placeholder="amount">
            <input type="hidden" name="depart_date_time" id="depart_date_time" value=""
                placeholder="depart_date_time">
            <input type="hidden" name="cust_name" id="cust_name" value="" placeholder="cust_name">
            <input type="hidden" name="cust_email" id="cust_email" value="" placeholder="cust_email">
            <input type="hidden" name="cust_mbl" id="cust_mbl" value="" placeholder="cust_mbl">
            <input type="hidden" name="max_km_per_day_oneway" id="max_km_per_day_oneway" value="130"
                placeholder="max_km_per_day_oneway">
            <input type="hidden" name="max_km_per_day_round" id="max_km_per_day_round"
                value="{{ Request::get('distance') }}" placeholder="max_km_per_day_round">

        </div>
    </div>
</div>
</section>
@include('common.footer')
<!-- Google API -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzLgce3y8jzRe5GdXksOdAqn30aFx-qv8&libraries=places,geometry&callback=initAutocomplete&v=weekly&channel=2"
    async></script>
<script type="text/javascript">
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    var placeSearch, autocomplete, autocomplete2;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };


    var newRDistance = document.getElementById('distance2').value;
    var cityBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(12.97232, 77.59480),
        new google.maps.LatLng(12.89201, 77.58905));


    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete((document.getElementById('fromLocation1')), {
            types: ['geocode'],
            componentRestrictions: {
                country: "in"
            }
        });
        autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('toLocation1'), {
            types: ['geocode'],
            componentRestrictions: {
                country: "in"
            }
        });
        autocomplete3 = new google.maps.places.Autocomplete((document.getElementById('fromLocation2')), {
            types: ['geocode'],
            componentRestrictions: {
                country: "in"
            }
        });
        autocomplete4 = new google.maps.places.Autocomplete(document.getElementById('toLocation2'), {
            types: ['geocode'],
            componentRestrictions: {
                country: "in"
            }
        });
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            fillInAddress(1); //console.log("place_changed");
        });
        google.maps.event.addListener(autocomplete2, 'place_changed', function() {
            fillInAddress(2); //console.log("place_changed2");
        });
        google.maps.event.addListener(autocomplete3, 'place_changed', function() {
            fillInAddress(3); //console.log("place_changed3");
        });
        google.maps.event.addListener(autocomplete4, 'place_changed', function() {
            fillInAddress(4); //console.log("place_changed4");
        });

    }

    function fillInAddress(el) {
        var oneway_round = document.getElementById('oneway_round').value;
        var fromLocation1 = document.getElementById('fromLocation1').value;
        var toLocation1 = document.getElementById('toLocation1').value;
        var fromLocation2 = document.getElementById('fromLocation2').value;
        var toLocation2 = document.getElementById('toLocation2').value;
        var from_place1 = document.getElementById('from_place1').value;
        var to_place1 = document.getElementById('to_place1').value;
        var from_place2 = document.getElementById('from_place2').value;
        var to_place2 = document.getElementById('to_place2').value;

        if (oneway_round == 'Oneway' && el == 1) {
            //console.log("1");
            var place = autocomplete.getPlace();
            document.getElementById('latOrg1').value = place.geometry.location.lat();
            document.getElementById('lagOrg1').value = place.geometry.location.lng();
            document.getElementById('from_place1').value = place.formatted_address;
            document.getElementById('Org2').value = place.formatted_address;
            initMap();
        }

        if (oneway_round == 'Oneway' && el == 2) {
            //console.log("2");
            var place2 = autocomplete2.getPlace();
            document.getElementById('desBlat').value = place2.geometry.location.lat();
            document.getElementById('desBlag').value = place2.geometry.location.lng();
            document.getElementById('to_place1').value = place2.formatted_address;
            document.getElementById('desA').value = place2.formatted_address;
            initMap();
        }


        if (oneway_round == 'Round' && el == 3) {
            //console.log("3");
            var place = autocomplete3.getPlace();
            document.getElementById('latOrg1').value = place.geometry.location.lat();
            document.getElementById('lagOrg1').value = place.geometry.location.lng();
            document.getElementById('from_place1').value = place.formatted_address;
            document.getElementById('Org2').value = place.formatted_address;
            initMap();
        }

        if (oneway_round == 'Round' && el == 4) {
            //console.log("4");
            var place2 = autocomplete4.getPlace();
            document.getElementById('desBlat').value = place2.geometry.location.lat();
            document.getElementById('desBlag').value = place2.geometry.location.lng();
            document.getElementById('to_place1').value = place2.formatted_address;
            document.getElementById('desA').value = place2.formatted_address;
            initMap();
        }

    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

    $(function($) {
        function tog(v) {
            return v ? 'addClass' : 'removeClass';
        }
        $(document).on('input', '.clearable', function() {
            $(this)[tog(this.value)]('x');
        }).on('mousemove', '.x', function(e) {
            $(this)[tog(this.offsetWidth - 38 < e.clientX - this.getBoundingClientRect().left)]('onX');
        }).on('click', '.onX', function() {
            $(this).removeClass('x onX').val('');
        });
    });


    // Distance
    function initMap() {
        oneway_round
        const bounds = new google.maps.LatLngBounds();
        const markersArray = [];
        //console.log("func init map");
        // initialize services
        const geocoder = new google.maps.Geocoder();
        const service = new google.maps.DistanceMatrixService();
        // build request
        var latOrg1 = Number(document.getElementById('latOrg1').value);
        var lagOrg1 = Number(document.getElementById('lagOrg1').value);
        var Org2 = document.getElementById('Org2').value;
        var desA = document.getElementById('desA').value;
        var desBlat = Number(document.getElementById('desBlat').value);
        var desBlag = Number(document.getElementById('desBlag').value);
        const origin1 = {
            lat: latOrg1,
            lng: lagOrg1
        };
        const origin2 = Org2;
        const destinationA = desA;
        const destinationB = {
            lat: desBlat,
            lng: desBlag
        };
        const request = {
            origins: [origin1, origin2],
            destinations: [destinationA, destinationB],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false,
        };
        // get distance matrix response
        service.getDistanceMatrix(request).then((response) => {
            // put response
            var distance = response.rows[0].elements[0].distance.value;
            var distanceText = response.rows[0].elements[0].distance.text;
            var durationText = response.rows[0].elements[0].duration.text;
            var distanceInKm = (distance / 1000);
            var oneway_round = document.getElementById('oneway_round').value;
            var fromLocation1 = document.getElementById('fromLocation1').value;
            var toLocation1 = document.getElementById('toLocation1').value;
            var fromLocation2 = document.getElementById('fromLocation2').value;
            var toLocation2 = document.getElementById('toLocation2').value;

            document.getElementById('distance').value = Math.round(distanceInKm);
            document.getElementById('duration').value = durationText;
            calc_amount(id);

            // show on map
            const originList = response.originAddresses;
            const destinationList = response.destinationAddresses;
            deleteMarkers(markersArray);
        });
    }

    function deleteMarkers(markersArray) {
        for (let i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(null);
        }
        markersArray = [];
    }
</script>

<script>
    function oneway_round(type) {
        document.getElementById('oneway_round').value = type;
        console.log("ikfgbadjfdn");
        calc_amount(id);
    }

    function km_cost(car_id, oneway_cost, round_cost) {
        $('.carhide').css('border', '0px');
        $('.carbodr' + car_id).css('border', '2px solid #FFBF00');
        var oneway_round = document.getElementById('oneway_round').value;
        if (oneway_round == 'Oneway') {
            console.log("thi is one way trip");
            var newODistance = document.getElementById('distance1').value;
            document.getElementById('car_id1').value = car_id;
            document.getElementById('charge_per_km1').value = oneway_cost;
            calc_amount(id);
        }
        if (oneway_round == 'Round') {
            console.log("this is round");
            document.getElementById('car_id2').value = car_id;
            document.getElementById('charge_per_km2').value = round_cost;
            calc_amount(id);
        }
    }

    function calc_amount(id) {
        alert(id);
        // console.log("calc_amount ");
        // console.log(" ----------------------------- ");
        var driverBata = 400;
        var amount = 0;

        // var oneway_round = document.getElementById('oneway_round').value;
        // var oneway_round = <?php echo Request::get('trip'); ?>;

        //   var oneway_round2 = document.getElementById('oneway_round').value;
        // console.log(oneway_round);
        // var duration = document.getElementById('durationone').value;
        // console.log(duration);
        // alert(oneway_round);
        if (id == "oneway") {
            alert("this is oneway dfhk");
            console.log(document.getElementById('amountText1'))
            document.getElementById('amountText1').innerHTML = ;
            // var totalAmount = document.getElementById('amountText1');
            // totalAmount.innerHTML = "sadkfjbasdklfj";
            // var distance = document.getElementById('distance1').value;
            // document.getElementById('distanceText1').innerHTML = distance + "km";
            // document.getElementById('durationText1').innerHTML = duration;
            // var charge_per_km = document.getElementById('charge_per_km1').value;
            // var max_km_per_day = document.getElementById('max_km_per_day_oneway').value;
            // max_km_per_day = (max_km_per_day == "") ? 0 : parseInt(max_km_per_day);
            // charge_per_km = (charge_per_km == "") ? 0 : parseInt(charge_per_km);

            // var newDistance = distance;
            // document.getElementById('days1').value = 1;
            // console.log(charge_per_km + "sadlfkjb");
            if (distance < max_km_per_day) {
                // console.log("#Distance limit crossed #oneway");
                // console.log("distance " + distance);
                newDistance = max_km_per_day;
                // console.log("newDistance " + newDistance);
            }
            // console.log(newDistance);
            // document.getElementById('amountText1').innerHTML = amount + " Rs";
            document.getElementById('distance1').value = newDistance;
            if (charge_per_km > 0) {
                amount = (charge_per_km * newDistance) + driverBata;
                console.log(amount);
            }
            // document.getElementById('actualAmount1').value = charge_per_km * newDistance;
            // document.getElementById('driverBata1').value = driverBata;
            var totalAmount = document.getElementById('amountText1');
            totalAmount.innerHTML = amount;
            // var date = document.getElementById('depart_date2').value;
            // var time = document.getElementById('depart_time').value;
            // var datetime = document.getElementById('return_date2').value = date.time;
            // var datetime = document.getElementById('depart_date2').value = date.time;
            // alert('return_date2');
            // console.log(newDistance);
            // document.getElementById('distanceText1').innerHTML = newDistance + " km";

        }


        if (id == "Round") {

            //   console.log("hariharan");
            alert("hi ths is round")
            var distance = document.getElementById('distance2').value;
            var firstDate = document.getElementById('depart_date2').value;
            var secondDate = document.getElementById('return_date2').value;
            var max_km_per_day = document.getElementById('max_km_per_day_round').value;
            var charge_per_km = document.getElementById('charge_per_km2').value;
            console.log(distance, firstDate, secondDate, max_km_per_day, charge_per_km);
            var startDay = "";
            var endDay = "";
            var millisBetween = 0;
            var extraDays = 0;
            var added_distance_per_day = 0;
            var newDistance = 0;
            max_km_per_day = (max_km_per_day == "") ? 0 : parseInt(max_km_per_day);
            charge_per_km = (charge_per_km == "") ? 0 : parseInt(charge_per_km);
            if (firstDate != "" && secondDate != "") {
                // const myArray = firstDate.split("-");
                // let d = myArray[0];
                // let m = myArray[1];
                // let y = myArray[2];
                // var startDay = y + "/" + m + "/" + d;
                // const myArray1 = secondDate.split("-");
                // let d1 = myArray1[0];
                // let m1 = myArray1[1];
                // let y1 = myArray1[2];
                // var endDay = y1 + "/" + m1 + "/" + d1;
                // var startDay1 = new Date(startDay);
                // var endDay1 = new Date(endDay);
                // millisBetween = endDay1.getTime() - startDay1.getTime();
                // extraDays = millisBetween / (1000 * 3600 * 24);
                startDay = new Date(firstDate);
                endDay = new Date(secondDate);
                millisBetween = startDay.getTime() - endDay.getTime();
                extraDays = millisBetween / (1000 * 3600 * 24);

            }
            //   console.log("distance " + distance);
            if (distance > (max_km_per_day * extraDays)) {
                // console.log("#Distance limit crossed ");
                // console.log("distance " + distance);
                newDistance = distance;
                // console.log("newDistance " + newDistance);
            }
            if (distance <= (max_km_per_day * extraDays)) {
                // console.log("#Days limit crossed ");
                // console.log("distance " + distance);
                newDistance = max_km_per_day * extraDays;
                // console.log("newDistance " + newDistance);
            }
            newDistance = (newDistance == 0) ? distance : newDistance;
            driverBata = driverBata * extraDays;
            if (charge_per_km > 0) {
                var amount = (charge_per_km * newDistance) + driverBata;
            }
            document.getElementById('distance2').value = newDistance;
            document.getElementById('distanceText2').innerHTML = newDistance + " km";
            document.getElementById('durationText2').innerHTML = duration;
            document.getElementById('actualAmount2').value = charge_per_km * newDistance;
            document.getElementById('driverBata2').value = driverBata;
            document.getElementById('amount2').value = amount;
            document.getElementById('amountText2').innerHTML = amount + " Rs";
            document.getElementById('days2').value = extraDays;
            document.getElementById('daysText2').innerHTML = extraDays;
            //   console.log("oneway_round " + oneway_round);
            //   console.log("distance " + distance);
            //   console.log("firstDate " + firstDate);
            //   console.log("secondDate " + secondDate);
            //   console.log("millisBetween " + millisBetween);
            //   console.log("extraDays " + extraDays);
            //   console.log("max_km_per_day " + max_km_per_day);
            //   console.log("charge_per_km " + charge_per_km);
            //   console.log("newDistance " + newDistance);
            //   console.log("amount " + amount);
            //   console.log("actualAmount " + (charge_per_km * newDistance));
            //   console.log("driverBata " + driverBata);
        }
    }

    // //console.log("initMap");
    function depart_time1(id) {
        var input = document.getElementById(id);
        var depart_time1 = document.createElement('div');
        depart_time1.classList.add('time-picker');
        input.value = '08:30';

        //open depart_time1
        input.onclick = function() {
            depart_time1.classList.toggle('open');

            this.setAttribute('disabled', 'disabled');
            depart_time1.innerHTML += `
<div class="set-time">
<div class="label">
<a id="plusH" >+</a>
<input class="set" type="text" id="hour" value="08">
<a id="minusH">-</a>
</div>
<div class="label">
<a id="plusM">+</a>
<input class="set" type="text" id="minute" value="30">
<a id="minusM">-</a>
</div>
</div>
<div id="submitTime">Set time</div>`;
            this.after(depart_time1);
            var plusH = document.getElementById('plusH');
            var minusH = document.getElementById('minusH');
            var plusM = document.getElementById('plusM');
            var minusM = document.getElementById('minusM');
            var h = parseInt(document.getElementById('hour').value);
            var m = parseInt(document.getElementById('minute').value);
            //increment hour
            plusH.onclick = function() {
                h = isNaN(h) ? 0 : h;
                if (h === 23) {
                    h = -1;
                }
                h++;
                document.getElementById('hour').value = (h < 10 ? '0' : 0) + h;
            }
            //decrement hour
            minusH.onclick = function() {
                h = isNaN(h) ? 0 : h;
                if (h === 0) {
                    h = 24;
                }
                h--;
                document.getElementById('hour').value = (h < 10 ? '0' : 0) + h;
            }
            //increment hour
            plusM.onclick = function() {
                m = isNaN(m) ? 0 : m;
                if (m === 60) {
                    m = -1;
                }
                m++;
                document.getElementById('minute').value = (m < 10 ? '0' : 0) + m;
            }
            //decrement hour
            minusM.onclick = function() {
                m = isNaN(m) ? 0 : m;
                if (m === 0) {
                    m = 60;
                }
                m--;
                document.getElementById('minute').value = (m < 10 ? '0' : 0) + m;
            }

            //submit depart_time1
            var submit = document.getElementById("submitTime");
            submit.onclick = function() {
                input.value = document.getElementById('hour').value + ':' + document.getElementById('minute')
                    .value;
                input.removeAttribute('disabled');
                depart_time1.classList.toggle('open');
                depart_time1.innerHTML = '';
            }
        }
    }


    function depart_time2(id) {
        var input = document.getElementById(id);
        var depart_time2 = document.createElement('div');
        depart_time2.classList.add('time-picker');
        input.value = '10:30';

        //open depart_time1
        input.onclick = function() {
            depart_time2.classList.toggle('open');
            //   console.log("depart_time2 onclick");
            this.setAttribute('disabled', 'disabled');
            depart_time2.innerHTML += `
<div class="set-time">
<div class="label">
<a id="plusH" >+</a>
<input class="set" type="text" id="hour2" value="08">
<a id="minusH">-</a>
</div>
<div class="label">
<a id="plusM">+</a>
<input class="set" type="text" id="minute2" value="30">
<a id="minusM">-</a>
</div>
</div>
<div id="submitTime">Set time</div>`;
            this.after(depart_time2);
            var plusH = document.getElementById('plusH');
            var minusH = document.getElementById('minusH');
            var plusM = document.getElementById('plusM');
            var minusM = document.getElementById('minusM');
            var h = parseInt(document.getElementById('hour2').value);
            var m = parseInt(document.getElementById('minute2').value);
            //increment hour
            plusH.onclick = function() {
                h = isNaN(h) ? 0 : h;
                if (h === 23) {
                    h = -1;
                }
                h++;
                document.getElementById('hour2').value = (h < 10 ? '0' : 0) + h;
            }
            //decrement hour
            minusH.onclick = function() {
                h = isNaN(h) ? 0 : h;
                if (h === 0) {
                    h = 24;
                }
                h--;
                document.getElementById('hour2').value = (h < 10 ? '0' : 0) + h;
            }
            //increment hour
            plusM.onclick = function() {
                m = isNaN(m) ? 0 : m;
                if (m === 60) {
                    m = -1;
                }
                m++;
                document.getElementById('minute2').value = (m < 10 ? '0' : 0) + m;
            }
            //decrement hour
            minusM.onclick = function() {
                m = isNaN(m) ? 0 : m;
                if (m === 0) {
                    m = 60;
                }
                m--;
                document.getElementById('minute2').value = (m < 10 ? '0' : 0) + m;
            }

            //submit depart_time1
            var submit = document.getElementById("submitTime");
            submit.onclick = function() {
                input.value = document.getElementById('hour2').value + ':' + document.getElementById('minute2')
                    .value;
                input.removeAttribute('disabled');
                depart_time2.classList.toggle('open');
                depart_time2.innerHTML = '';
            }
        }
    }

    depart_time1('depart_time1');
    depart_time2('depart_time2');
</script>
<script>
    function openCity(evt, cityName) {
        /* var queries = {};
        $.each(document.location.search.substr(1).split('&'), function(c,q){
        var i = q.split('=');
        queries[i[0].toString()] = unescape(i[1].toString()); // change escaped characters in actual format
        });

        // modify your parameter value and reload page using below two lines
        queries['trip']='Oneway';

        document.location.href="?"+$.param(queries); // it reload page*/
        URL = document.URL;

        if (URL.indexOf('trip=Oneway') != -1)
            URL = URL.replace('trip=Oneway', 'trip=Round');
        else
            URL = URL.replace('trip=Round', 'trip=Oneway');

        window.location = URL;

        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        oneway_round(cityName);
    }

    function openCity1(evt, cityName) {
        URL = document.URL;

        if (URL.indexOf('trip=Oneway') != -1)
            URL = URL.replace('trip=Oneway', 'trip=Round');
        else
            URL = URL.replace('trip=Round', 'trip=Oneway');

        window.location = URL;

        document.location.href = "?" + $.param(queries); // it reload page
        //OR
        //history.pushState({}, '', "?"+$.param(queries)); // it change url but not reload page
        /* const url = new URL(window.location);
        url.searchParams.set('trip', 'Round');
        window.history.pushState(null, '', url.toString());*/
        var i, tabcontent, tablinks;;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        oneway_round(cityName);
    }
</script>
@if (Request::get('trip') == 'Round')
<script>
    window.onload = function() {
        document.getElementById('oneway_round').value = "Round";
        /*document.getElementById('Oneway').style.display = "none";
        document.getElementById('Round').style.display = "block";*/
        $("#onewayTripBtn").removeClass("active");
        $("#roundTripBtn").addClass("active");
        $("#onewaytrip").remove();



        calc_amount("Round");
    };
</script>
@endif
@if (Request::get('trip') == 'Oneway')
<script>
    window.onload = function() {
        document.getElementById('oneway_round').value = "Oneway";
        $("#roundTripBtn").removeClass("active");
        $("#onewayTripBtn").addClass("active");
        $("#roundtrip").remove();
        calc_amount("oneway");
    };
</script>
@endif

<script>
    function oneway_round(type) {
        document.getElementById('oneway_round').value = type;
        //document.getElementById('oneway_round').value = type;
        if (type == 'Oneway') {
            $('#oneway').addClass('active').css("background", "#FFBF00").css("color", "black");
            $('#round').addClass('active').css("background", "black").css("color", "#FFBF00");
        } else {
            $('#round').addClass('active').css("background", "#FFBF00").css("color", "black");
            $('#oneway').addClass('active').css("background", "black").css("color", "#FFBF00");
        }
        Oneway
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function($) {
    var currentUrl = window.location.href;
    var urlParams = new URLSearchParams(currentUrl);
    console.log(urlParams)
    tab = $('.tabs h3 a');

    tab.on('click', function(event) {
        event.preventDefault();
        tab.removeClass('active');
        $(this).addClass('active');

        tab_content = $(this).attr('href');
        $('div[id$="tab-content"]').removeClass('active');
        $(tab_content).addClass('active');
    });
});
