@include('common.header')
<section class>
    <div class="form bookingForm">
        <div class="container pt-4">

            <div class="row ">
                <!-- <div class="col-sm-6 col-md-6 mt-lg-3">-->

                <div class="col-md-6">
                    <h3 class="py-3 text-center">Select Your Vehicle</h3>
                    @if (Request::get('trip') == 'Round')
                        <form class="" id="roundtrip" action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            @foreach ($cars as $car)
    @if ($car->trip_type == 'round' || $car->trip_type == 'both')
        <div class="mb-3 d-flex align-items-center">
            <input type="radio" id="car1{{ $car->id }}" name="car1" required style="visibility: hidden;">
            <label for="car1{{ $car->id }}" class="car-radio-label"
                onclick="km_cost({{ $car->id }},{{ $car->oneway_km_cost }},{{ $car->round_km_cost }})">
                <div class="radio-image-container">
                    <img src="{{ URL::asset($car->file_path . '/' . $car->file_name) }}"
                        alt="{{ $car->model_name }}" class="car-logo">
                </div>
                <div class="car-details">
                    <p>
                        <small>{{ $car->model_name }} -
                            ({{ $car->round_km_cost }}/km)
                        </small>
                        <i data-toggle="tooltip" title="{{ $car->model_name }}"
                            class="fa fa-snowflake-o"></i>
                    </p>
                </div>
            </label>
        </div>
    @endif
@endforeach

                </div>
                <div class="col-md-6 ">

                    <h3 class="text-center py-3">Plan Your Trip</h3>
                    <div class="tab-content tab_section" id="myTabContent">

                        <input type="hidden" name="oneway_round1" id="oneway_round" value="Round">
                        <input type="hidden" name="from_place2" id="from_place2" value="{{ Request::get('source') }}">
                        <input type="hidden" name="to_place2" id="to_place2"
                            value="{{ Request::get('destination') }}">
                        <input type="hidden" name="pickupdate" id="depart_date2"
                            value="{{ Request::get('pickupdate') }}">

                        <input type="hidden" name="pickuptime" id=""
                            value="{{ Request::get('pickuptime') }}">
                        <input type="hidden" name="return_date" id="return_date2"
                            value="{{ Request::get('returndate') }}">

                        <input type="hidden" name="car_id2" id="car_id2" value="">
                        <input type="hidden" name="charge_per_km2" id="charge_per_km2" value="">
                        <input type="hidden" name="distance2" id="distance2" value="{{ Request::get('distance') }}">
                        <input type="hidden" name="amount2" id="amount2" value="">
                        <input type="hidden" name="days2" id="days2" value="1">
                        <input type="hidden" name="actualAmount2" id="actualAmount2" value="">
                        <input type="hidden" name="driverBata2" id="driverBata2"
                            value="{{ Request::get('duration') }}">

                        <div class="row py-lg-2">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="pickup">Pick Up Address</label>
                                    <input type="text" class="form-control" name="pickUpAddress" id="pickUpAddress"
                                        placeholder="" value="{{ Request::get('source') }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group ">
                                    <label for="drop">Drop Address</label>
                                    <input type="text" class="form-control" name="dropAddress" id="dropAddress"
                                        placeholder="" required value="{{ Request::get('destination') }}" readonly>
                                </div>
                            </div>

                        </div>

                        <div class="row ">
                            <div class="col-lg-6 col-12">
                                <div class="form-group  mt-1">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="cust_name" id="cust_name"
                                        placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group mt-1">
                                    <label for="email">Email (optional)</label>
                                    <input type="email" name="cust_email" id="cust_email" class="form-control"
                                        placeholder="Enter Email">
                                </div>
                            </div>

                            <div class="col-12 mt-1">
                                <div class="row py-lg-2">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mt-1">
                                            <label for="pickup-location">Depart Date</label>
                                            <input type="date" name="pickupdate" id="fromdate"
                                                class="form-control" placeholder="dd-mm-yyy" required
                                                onchange="calc_amount();">
                                            <!-- <input type="text" class="form-control" name="cust_mbl1" id="pickup-location" aria-describedby="emailHelp" placeholder="Phone Number" required> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mt-1">
                                            <label for="pickup-location">Return Date</label>
                                            <input type="date" name="dropdate" id="todate"
                                                class="form-control" placeholder="dd-mm-yyy" required
                                                onchange="calc_amount();">
                                            <!-- <input type="text" class="form-control" name="cust_mbl1" id="pickup-location" aria-describedby="emailHelp" placeholder="Phone Number" required> -->
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mt-1 ">
                                            <label for="pickup-location"> Phone Number</label>

                                            <input type="text" maxlength="10" class="form-control"
                                                name="cust_mbl1" autocomplete="off" id="pickup-location"
                                                aria-describedby="emailHelp" placeholder="Phone Number"
                                                pattern="[0-9]{10}"
                                                title="Please enter a numeric value with a maximum of 10 digits."
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group mt-1">
                                            <label for="pickup-location"> Depart time</label>
                                            <input type="time" name="pickuptime" required=""
                                                class="form-control timepicker" id="" placeholder="00:00">

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="card  my-3 calculation">
                            <div class="row">
                                <div class="col-md-3 col-6 col-sm-2 ">
                                    <div class="card-body">
                                        <p class="card-title">Total Amount</p>
                                        <h6><span class="text-center" name="actualAmount" id="amountText2"></span>  Rs</h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 col-sm-2">
                                    <div class="card-body">
                                        <p class="card-title"> Trip Covers</p>
                                        <h6 class="text-center" name="pickuptime" id="distanceText2">
                                            {{ Request::get('distance') }} KM
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 col-sm-2">
                                    <div class="card-body">
                                        <p class="card-title">Duration</p>
                                        <h6 class="text-center" name="returndate" id="durationText2">
                                            {{ Request::get('duration') }}
                                        </h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 col-sm-2">
                                    <div class="card-body">
                                        <p class="card-title">No of Days</p>
                                        <h6 class="text-center" name="daysText2" id="daysText2">0</h6>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-12 proceed-btn my-1">
                            <button type="submit" onclick="carSelectround()" class="btn btn-warning text-center"
                                style="border-radius:5px;">PLACE A BOOKING</button>
                        </div>


                        </form>
                        @endif


                        @if (Request::get('trip') == 'Oneway')
                            <form class="" id="onewaytrip" action="{{ route('booking.store') }}"method="POST">
                                @csrf
                                @foreach ($cars as $car)
                                    @if ($car->trip_type == 'oneway' || $car->trip_type == 'both')
                                        <!-- Set the limit to 10 cars -->
                                        <div class="mb-3 d-flex align-items-center">
                                            <input type="radio" id="car1{{ $car->id }}" name="car1"
                                               style="visibility:hidden" required>
                                            <label for="car1{{ $car->id }}" class="car-radio-label"
                                                onclick="km_cost({{ $car->id }},{{ $car->oneway_km_cost }},{{ $car->round_km_cost }})">
                                                <div class="radio-image-container">
                                                    <img src="{{ URL::asset($car->file_path . '/' . $car->file_name) }}"
                                                        alt="{{ $car->model_name }}" class="car-logo">
                                                </div>
                                                <div class="car-details">
                                                    <p>
                                                        <small>{{ $car->model_name }} -
                                                            ({{ $car->oneway_km_cost }}/km)
                                                        </small>
                                                        <i data-toggle="tooltip" title="{{ $car->model_name }}"
                                                            class="fa fa-snowflake-o"></i>
                                                    </p>
                                                </div>
                                            </label>
                                        </div>
                                    @endif
                                @endforeach


                    </div>
                    <div class="col-md-6 ">

                        <h3 class="text-center py-3">Plan Your Trip</h3>
                        <div class="tab-content tab_section" id="myTabContent">

                            <input type="hidden" name="oneway_round" id="oneway_round" value="Oneway">
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
                            <input type="hidden" name="actualAmount1" id="actualAmount1">
                            <input type="hidden" name="driverBata1" id="driverBataOneWay">

                            <div class="row pt-lg-3">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group ">
                                        <label for="pickup">Pick Up Address</label>
                                        <input type="text" class="form-control" name="pickUpAddress"
                                            autocomplete="off" id="pickUpAddress" placeholder=""
                                            value="{{ Request::get('source') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label for="drop">Drop Address</label>
                                        <input type="text" class="form-control" name="dropAddress"
                                            autocomplete="off" id="dropAddress" placeholder="" required
                                            value="{{ Request::get('destination') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-lg-3">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mt-1">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" name="cust_name"
                                            autocomplete="off" id="cust_name" placeholder="Full Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group mt-1">
                                        <label for="email">Email (optional)</label>
                                        <input type="email" name="cust_email" id="cust_email" autocomplete="off"
                                            class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="row pt-lg-3">
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group m-1">
                                                <label for="pickup-location"> Phone Number</label>
                                                <input type="tel" class="form-control" name="cust_mbl1"
                                                    maxlength="10" autocomplete="off" id="pickup-location"
                                                    aria-describedby="emailHelp" placeholder="Phone Number"
                                                    pattern="[0-9]{10}"
                                                    title="Please enter a numeric value with a maximum of 10 digits."
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-12">
                                            <div class="form-group mt-1">
                                                <label for="pickup-location">Depart Date</label>
                                                <input type="date" name="pickupdate" id="fromdate"
                                                    class="form-control" placeholder="dd-mm-yyy" required
                                                    onchange="calc_amount();">

                                                <!-- <input type="text" name="pickupdate" id="datepicker1" autocomplete="off" class="form-control" placeholder="dd-mm-yyy" required onchange="calc_amount();"> -->
                                                <!-- <input type="text" class="form-control" name="cust_mbl1" id="pickup-location" aria-describedby="emailHelp" placeholder="Phone Number" required> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="form-group mt-1">
                                                <label for="pickup-location"> Depart time</label>
                                                <input type="time" name="pickuptime" required=""
                                                    class="form-control timepicker" id=""
                                                    placeholder="00:00">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br />
                            <div class="card  mb-4 calculation">
                                <div class="row">
                                    <div class="col-md-4 col-6">
                                        <div class="card-body">
                                            <p class="card-title">Total Amount</p>
                                            <h6 class="text-center" id="amountText1"></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="card-body">
                                            <p class="card-title"> Trip Covers</p>
                                            <h6 class="text-center" id="distanceText1"></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="card-body">
                                            <p class="card-title"> Duration</p>
                                            <h6 class="text-center" id="durationText1">
                                                {{ Request::get('duration') }}
                                            </h6>

                                        </div>
                                    </div>
                                </div>
                                <!-- <button type="submit" class="booked w-100 border-0 p-2 mt-4">PLACE A BOOKING</button> -->


                            </div>
                            <div class="col-12 proceed-btn">
                                <button type="submit" onclick="carselectone()" class="btn btn-warning text-center"
                                    style="border-radius:5px;">PLACE A BOOKING</button>
                                <!-- <button type="submit" class="booked w-100 border-0 p-2 mt-4"></button>-->
                            </div>


                            </form>
                            <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog"
                                aria-labelledby="bookingModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bookingModalLabel">Booking Details</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Place the booking data here -->
                                            <p><strong>Full Name:</strong> <span id="modalFullName"></span></p>
                                            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                                            <!-- Add other data fields here -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <input type="hidden" name="from_place" id="from_place"
                                value="{{ Request::get('from') }}" placeholder="from_place">
                            <input type="hidden" name="to_place" id="to_place" value="{{ Request::get('to') }}"
                                placeholder="to_place">
                            <input type="hidden" name="oneway_round" id="oneway_round"
                                value="{{ Request::get('trip') }}" placeholder="charge_per_km">
                            <input type="hidden" name="charge_per_km" id="charge_per_km" value="charge_per_km">
                            <input type="hidden" name="distance" id="distance"
                                value="{{ Request::get('distance') }}" placeholder="distance">
                            <input type="hidden" name="duration" id="duration"
                                value="{{ Request::get('duration') }}" placeholder="duration">
                            <input type="hidden" name="latOrg1" id="latOrg1"
                                value="{{ Request::get('latOrg1') }}" placeholder="latOrg1">
                            <input type="hidden" name="lagOrg1" id="lagOrg1"
                                value="{{ Request::get('lagOrg1') }}" placeholder="lagOrg1">
                            <input type="hidden" name="Org2" id="Org2" value="{{ Request::get('Org2') }}"
                                placeholder="Org2">
                            <input type="hidden" name="desA" id="desA" value="{{ Request::get('desA') }}"
                                placeholder="desA">
                            <input type="hidden" name="desBlat" id="desBlat"
                                value="{{ Request::get('desBlat') }}" placeholder="desBlat">
                            <input type="hidden" name="desBlag" id="desBlag"
                                value="{{ Request::get('desBlag') }}" placeholder="desBlag">
                            <input type="hidden" name="car_id" id="car_id" value=""
                                placeholder="car_id">
                            <input type="hidden" name="days2" id="days2" value="">
                            <input type="hidden" name="amount" id="amount" value=""
                                placeholder="amount">
                            <input type="hidden" name="depart_date_time" id="depart_date_time" value=""
                                placeholder="depart_date_time">
                            <input type="hidden" name="cust_name" id="cust_name" value=""
                                placeholder="cust_name">
                            <input type="hidden" name="cust_email" id="cust_email" value=""
                                placeholder="cust_email">
                            <input type="hidden" name="cust_mbl" id="cust_mbl" value=""
                                placeholder="cust_mbl">
                            <input type="hidden" name="max_km_per_day_oneway" id="max_km_per_day_oneway"
                                value="130" placeholder="max_km_per_day_oneway">
                            <input type="hidden" name="max_km_per_day_round" id="max_km_per_day_round"
                                value="250" placeholder="max_km_per_day_round">

                        </div>
                    </div>
                    <div class="p-3">
                        <h6>Tariff Information</h6>
                        <ul>
                            <li>One way minimum of 130 kms per calendar day</li>
                            <li>400 rupees driver bata</li>
                            <li>Toll Permit, Inter State Permit, Parking charges should be pay by customer,
                            </li>
                            <li>Round trip minimum of 250 kms per calendar day</li>
                            <li>Hill station charges</li>
                            <li>Waiting Charges are Applicable</li>

                        </ul>
                    </div>
                </div>
</section>
@include('common.footer')
<!-- Google API -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        function carSelectround(){

            let noofdays = document.getElementById("daysText2").innerHTML;
            let totalAmount = document.getElementById("amountText2").innerHTML;
            console.log(totalAmount);
            console.log(noofdays*400);
            if(totalAmount==noofdays*400){

                         Swal.fire({
    title: 'Please select a vehicle',

    confirmButtonColor: '#fbb53c',
    confirmButtonText: 'OK'
  });

            }

        }
        function carselectone(){
            let totalAmountoneway = document.getElementById("amountText1").innerHTML;
            if(totalAmountoneway==0){
                Swal.fire({
    title: 'Please select a vehicle',

    confirmButtonColor: '#fbb53c',
    confirmButtonText: 'OK'
  });
            }
        }
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
            calc_amount();

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
    function showBookingModal() {
        var fullName = document.getElementById('cust_name').value;
        var email = document.getElementById('cust_email').value;
        // Get other data fields similarly

        document.getElementById('modalFullName').textContent = fullName;
        document.getElementById('modalEmail').textContent = email;
        // Set other modal content here
    }
</script>


<script>
    function oneway_round(type) {
        document.getElementById('oneway_round').value = type;
        console.log("ikfgbadjfdn");
        calc_amount();
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
            calc_amount();
        }
        if (oneway_round == 'Round') {
            console.log("this is round");
            document.getElementById('car_id2').value = car_id;
            document.getElementById('charge_per_km2').value = round_cost;
            calc_amount();
        }
    }

    function calc_amount() {
        // console.log(" ----------------------------- ");

        var driverBata = 400;
        var amount = 0;
        var oneway_round = document.getElementById('oneway_round').value;
        console.log(oneway_round);
        // var duration = document.getElementById('durationone').value;
        // console.log(duration);

        if (oneway_round == 'Oneway') {
            var distance = document.getElementById('distance1').value;
            document.getElementById('distanceText1').innerHTML = distance + "km";
            // document.getElementById('durationText1').innerHTML = duration;
            var charge_per_km = document.getElementById('charge_per_km1').value;
            var max_km_per_day = document.getElementById('max_km_per_day_oneway').value;
            max_km_per_day = (max_km_per_day == "") ? 0 : (max_km_per_day);
            charge_per_km = (charge_per_km == "") ? 0 : (charge_per_km);

            var newDistance = distance;
            document.getElementById('days1').value = 1;
            // console.log(charge_per_km + "sadlfkjb");
            if (distance < max_km_per_day) {
                // console.log("#Distance limit crossed #oneway");
                // console.log("distance " + distance);
                newDistance = max_km_per_day;
                // console.log("newDistance " + newDistance);
            }

            // console.log(newDistance);
            document.getElementById('distance1').value = newDistance;
            var backTotal = document.getElementById('actualAmount1').value = amount + " Rs";

            document.getElementById('driverBataOneWay').value = driverBata;
            if (charge_per_km > 0) {
                document.getElementById('actualAmount1').value = charge_per_km * newDistance;
                var amount = (charge_per_km * newDistance) + driverBata;
                console.log(amount);
            }

            // document.getElementById('actu    alAmount1').value = charge_per_km * newDistance;
            // document.getElementById('driverBata1').value = driverBata;
            var totalAmount = document.getElementById('amountText1');
            totalAmount.innerHTML = amount + "";
            var TotalAmountBack = document.getElementById('amountText1').innerHTML;
            // console.log(TotalAmountBack);
            // document.getElementById("actualAmount1").value = TotalAmountBack;
            // var date = document.getElementById('depart_date2').value;
            // var time = document.getElementById('depart_time').value;
            // var datetime = document.getElementById('return_date2').value = date.time;
            // var datetime = document.getElementById('depart_date2').value = date.time;
            // alert('return_date2');
            // console.log(newDistance);
            document.getElementById('distanceText1').innerHTML = newDistance + " km";
            console.log(amount, 'amountamountamountamountamount');
            if (charge_per_km) {
                document.getElementById('amount1').value = amount;
                document.getElementById('amountText1').innerHTML = amount +" Rs";
            }

        }

        if (oneway_round == 'Round') {
            var distance = (document.getElementById('distance2').value);
            console.log(distance, 'distance');
            var firstDate = document.getElementById('fromdate').value;
            var secondDate = document.getElementById('todate').value;
            var max_km_per_day = (document.getElementById('max_km_per_day_round').value);
            console.log(max_km_per_day, 'max_km_per_day');
            // max_km_per_day > 250 ? max_km_per_day : 250;
            document.getElementById('distanceText2').innerHTML = distance * 2 + " km";
            var charge_per_km = document.getElementById('charge_per_km2').value;
            var startDay = "";
            var endDay = "";
            var millisBetween = 0;
            var extraDays = 0;
            var added_distance_per_day = 0;
            var newDistance = 0;
            // max_km_per_day = (max_km_per_day == "") ? 0 : parseInt(max_km_per_day);
            // charge_per_km = (charge_per_km == "") ? 0 : parseInt(charge_per_km);
            if (firstDate != "" && secondDate != "") {
                // alert(firstDate);
                // alert(secondDate);
                const myArray = firstDate.split("-");
                let y = myArray[0];
                let m = myArray[1];
                let d = myArray[2];
                var startDay = y + "/" + m + "/" + d;
                // alert(startDay);
                const myArray1 = secondDate.split("-");
                let y1 = myArray1[0];
                let m1 = myArray1[1];
                let d1 = myArray1[2];
                var endDay = y1 + "/" + m1 + "/" + d1;
                // alert(endDay);
                var startDay1 = new Date(startDay);
                // alert(startDay1);
                // Do your operations
                var endDay1 = new Date(endDay);
                // alert(endDay1);
                //
                //   alert(startDay);
                //
                // alert(endDay);
                millisBetween = endDay1.getTime() - startDay1.getTime();
                // alert(millisBetween);
                extraDays = millisBetween / (1000 * 3600 * 24);
                extraDays += 1;
                // alert(extraDays);
            }
            var originalAmount = distance * 2;
            var convertedAmount = max_km_per_day;
            if (extraDays != 0) {
                convertedAmount = max_km_per_day * extraDays;
            }
            if (convertedAmount > originalAmount) {
                newDistance = convertedAmount;
            } else {
                newDistance = originalAmount;
            }
            console.log(newDistance)
            amount = (newDistance * charge_per_km) + (driverBata * extraDays);
            // document.getElementById('distance2').value = newDistance;
            // document.getElementById('distanceText2').innerHTML = newDistance + " km";
            // document.getElementById('durationText2').innerHTML = duration;
            var driverbata2 = driverBata * extraDays;

            document.getElementById('actualAmount2').value = charge_per_km * newDistance;
            document.getElementById('driverBata2').value = driverbata2;
            document.getElementById('amount2').value = amount;
            document.getElementById('amountText2').innerHTML = amount;

            document.getElementById('days2').value = extraDays;
            document.getElementById('daysText2').innerHTML = extraDays;
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
            var h = (document.getElementById('hour').value);
            var m = (document.getElementById('minute').value);
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
                input.value = document.getElementById('hour').value + ':' + document.getElementById(
                        'minute')
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
            var h = (document.getElementById('hour2').value);
            var m = (document.getElementById('minute2').value);
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
                input.value = document.getElementById('hour2').value + ':' + document.getElementById(
                        'minute2')
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
            calc_amount();
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
            calc_amount();
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
