@include('common.header')
    <section>
        <div class="container mt-4">

            <section>
                <div class="row">
                    <div class="col-sm-6 tabs_img">
                        <div class="ban_imag pt-5">
                            <div class="img">
                                <!-- <img src="./assets/frontuser/images/bann_img1.png"> -->
                                <img src="./assets/frontuser/images/Toyota1.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 tabs_menu">
                        <div class="row justify-content-center">
                            <div class="tabs_menu_inner">
                                <ul class="nav nav-tabs tab" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link  tablinks active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">One way Trip</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link tablinks " id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Round Trip</button>
                                    </li>
                                </ul>

                                <!---- Start Outer Tabs ----->

                                <div class="tab-content tab_section" id="myTabContent">
                                    <!----- Start first outer tab ----->
                                    <div class="tab-pane tabcontent show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                                        <!---- Start Inner Tabs ----->

                                        <div class="tab-content pt-4" id="pills-tabContent">
                                            <!---- Start First Inner Tab ----->
                                            <div class="tab-pane   inner_tabs show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <form class="row g-3 top_form" action="{{route('book-now')}}" method="get">
                                                    <div class="col-12">    
                                                        <div class='input-group pickLoc'>
                                                            <div class="input-group mb-3 form_clock">
                                                                <span class="input-group-text"><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                                                                <!--<input type="text" name="source" required="" value="" class="form-control oneway" id="onewaysource" placeholder= "Pick-Up Location">   -->
                                                                <input type="text" name="source" required="" value="" class="form-control outcity" id="onewaysource" placeholder="Pick-Up Location" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class='input-group Desti'>
                                                            <div class="input-group mb-3 form_clock">
                                                                <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                                <input type="text" name="destination" value="" required="" class="form-control" id="location" placeholder="Your Destination" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <div class='input-group date'>
                                                            <div class="input-group mb-3 form_clock form_dnt">
                                                                <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                                <input type="text" name="pickupdate" value="01-02-2023" min="01-02-2023" max="31-12-2023" required="" class="form-control datetimepickerON" id="datepicker" placeholder="Select Date" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <div class="input-group mb-3 form_clock form_dnt">
                                                            <span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                                            <!--<input type="text" name="pickuptime" value="08:33 PM" required="" class="form-control timeON" id="airTime id="Time" placeholder= "Select Time">    -->
                                                            <input name="pickuptime" value="08:33 PM" type="text" required="" class="form-control timepicker" id="datetimepickernew" placeholder="Select Time" required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="triptype" value="oneway">
                                                    <input type="hidden" name="tripmode" value="oneway">
                                                    <input type="hidden" name="ptype" value="rent">
                                                    <input type="hidden" name="trip_category" value="budget">
                                                    <div class="col-md-4 form_button pt-4 ">
                                                        <!-- <button class="btn" id="form_btn"> -->
                                                        <button type="submit" id="form_btn">Search Cabs</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>


                                    <!----- Start Third outer tab ----->

                                    <div class="tab-pane tabcontent " id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                        <div class="tab-pane  show inner_tabs active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">


                                            <form class="row g-3 top_form" action= "{{route('book-now')}}" method="get">
                                                <div class="col-12">
                                                    <div class='input-group pickLoc'>
                                                        <div class="input-group mb-3 form_clock">
                                                            <span class="input-group-text"><i class="fa fa-circle-o" aria-hidden="true"></i></span>
                                                            <input type="text" name="source" required="" value="" class="form-control outcity" id="soucemulti" placeholder="Pick-Up Location">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 round_dest">
                                                    <div class='input-group Desti'>
                                                        <div class="input-group mb-3 form_clock">
                                                            <span class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                                            <input type="text" name="destination[]" value="" required="" class="form-control" id="location2" placeholder="Your Destination">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-12 wrappr">
                                                    <div class="col-md-12" id="rt_inners">
                                                    </div>
                                                    <div class="col-md-12" id="rt_inner">
                                                        <a href="#" class="addmore"><b>+</b></a>
                                                    </div>
                                                </div>-->

                                                <div class="col-md-4 col-6 mt0">
                                                    <div class='input-group date'>
                                                        <div class="input-group mb-3 form_clock form_dnt">
                                                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                            <input type="text" name="pickupdate" required="" value="01-02-2023" class="form-control dateOU" id="datepicker3"  placeholder="Select Date">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-6 mt0">    
                                                    <div class="input-group mb-3 form_clock form_dnt">
                                                        <span class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                                        <!--<input type="text" name="pickuptime" value="08:33 PM" required="" class="form-control timepicker" placeholder= "Select Time">    -->
                                                        <input name="pickuptime" value="08:33 PM" type="text" required="" class="form-control timeOU" id="datetimepickernew1" placeholder="Select Time">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-6 mt0">
                                                    <div class='input-group date'>
                                                        <div class="input-group mb-3 form_clock form_dnt">
                                                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                            <input type="text" name="returndate" required="" value="01-02-2023" class="form-control" id="datepicker4" placeholder="Return Date">
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="triptype"value="outstation">
                                                <input type="hidden" name="tripmode" value="multicity">
                                                <input type="hidden" name="ptype" value="rent">
                                                <input type="hidden" name="trip_category" value="budget">
                                                <div class="col-md-4 form_button pt-4 ">
                                                    <!-- <button class="btn" id="form_btn"> -->
                                                    <button type="submit" id="form_btn">Search Cabs</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!---- Section About ----->
            <section>
                <div class="container  about_section">
                    <div class="row about_sec_text">
                        <h2>About Dora Cabs</h2>
                        <p>Dora Cabs &nbsp;provides safe and reliable taxi services from chennai for both local and outstation taxi service. We provide all types of car rental requirements as per the customer choice at the single platform. We are dedicated
                            to delivering comfortable, ereliable and hassle free taxi service rides for you and always endeavor to maintain your convenience at the top most priority.&nbsp; At Dora Cabs, we ensure you the utmost punctuality in our cab
                            services. The whole team of Dora Cabs </p>
                        <button type="submit" class="btn about_btn">
              Know More</button>
                    </div>
                </div>
            </section>

            <section>
                <div class="row p-5 accordion_section">
                    <div class="col-md-3 border accor_part1">
                        <img src="./assets/frontuser/images/ask.png" />
                        <p>Frequently Asked Questions</p>
                    </div>
                    <div class="col-md-9 accor_part2">
                        <div class="accor_toggle">
                            <button class="accordion_btn">Are cabs available in chennai, NCR?</button>
                            <div class="accordion_text">
                                <p>
                                    Yes, there are in fact many cabs available in chennai, NCR. Depending on Where you need a cab for use, there is Doracabsoffering a cab with a driver for local, outstation and airport rentals.
                                </p>
                            </div>
                        </div>
                        <div class="accor_toggle">
                            <button class="accordion_btn">
                How do I know that my booking is confirmed?
              </button>
                            <div class="accordion_text">
                                <p>
                                    Whether a booking is made online or over the phone, a confirmation would be sent to you via e-mail, which would include your reservation number and travel details.
                                </p>
                            </div>
                        </div>
                        <div class="accor_toggle">
                            <button class="accordion_btn">Can I change my booking?</button>
                            <div class="accordion_text">
                                <p>
                                    Yes. You can change the date of booking till 1 days before the booked date free of charge. After that, there will be a cancellation charge as per cancellation policy.
                                </p>
                            </div>
                        </div>
                        <div class="accor_toggle">
                            <button class="accordion_btn">What is the taxi rate from chennai?</button>
                            <div class="accordion_text">
                                <p>
                                    You can rent a car in chennai with a driver for as less as Rs 9/km. or you can search on portal or do Call on 9990965965 for more details.
                                </p>
                            </div>
                        </div>
                        <div class="accor_toggle">
                            <button class="accordion_btn">
                What are the taxi booking options available in chennai?
              </button>
                            <div class="accordion_text">
                                <p>
                                    In chennai, NCR, you can book a taxi for local, outstation or airport rentals. Book your cab by calling on 9990965965 for doorstep pick up or drop or drop a mail at info@doracabs.com
                                </p>
                            </div>
                        </div>
                        <div class="accor_toggle">
                            <button class="accordion_btn">Are cabs available in chennai, NCR?</button>
                            <div class="accordion_text">
                                <p>
                                    Yes, there are in fact many cabs available in chennai, NCR. Depending on Where you need a cab for use, there is Doracabsoffers a cab with a driver for local, outstation, and airport rentals.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="car_detail_section pb-4" id="fleet">
                    <div class="container car_sec_text">
                        <h2>Fleet For Every Occasion</h2>
                        <p>Dedicated team of Dora Cabs feels delighted to provide a fleet for every occasion whether it is your planned holiday trip or business trip. You can pick your demanded car as per your need in just a few clicks.
                        </p>
                    </div>
                </div>
            </section>

            <section>
                <div id="applink" class="container mobSec">
                    <div id="mobile_section" class="row">

                        <div class="col-md-6 mobile_section_1 p-5">
                            <h2>Book an <br> Outstation Cab <br> from the App</h2>
                            <p>Launching our all new Android application with completely redesigned user interface. Now book your cab in just 20 seconds. Book Outstation cabs, pay only for Oneway. Download Dora Cabs app now.</p>
                            <div class="row">
                                <div class="col-md-4 col-6 mobile_sec_text">
                                    <a href="https://play.google.com/store/apps/details?id=com.hiremetaxi">
                                        <img src="./assets/frontuser/images/gpay.png">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mobile_section_2">
                            <img src="./uploads/app interface.png">
                        </div>



                    </div>
                </div>
            </section>
        </div>

        <section id="about_people">
            <div class="row people_cont">
                <h2>What people say about us</h2>
                <p>We are well known for our best taxi hire service provider as we are always ready to offer you to choose a car from our large fleet with experienced drivers on time. Our most valuable earning is our happy clients which are connected with
                    us from their first trip with Hire me Taxi just because of our wonderful management team &amp; excellent car hire services offered to them.</p>
                <div class="row peopple_in owl-theme owl-carousel  pt-4 owl-loaded owl-drag" style="width: 90%; margin: auto;">


                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transition: all 0.25s ease 0s; width: 9196px; transform: translate3d(-3344px, 0px, 0px);">
                            <div class="owl-item cloned" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        Best car rental service in Delhi at affordable rates. I have feel a very safe and secure ride one way taxi from Delhi to Chandigarh with your expert drivers and well maintained cars.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Shreya Srivastava</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        I have hired a round trip car rental service from Delhi to Pune. It was a very memorable experience with your friendly drivers. There are no additional charges, the pricing policy is too transparent and your punctuality was so good.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Aman Tripathi</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        The service is great the driver is really humble and helpful. Last year before the pandemic, I had 3-4 visits to Outstation. Choosing a cab from airport in a big task, specially in Pune and Mumbai. Somehow I found Pravasi Cab and booked a taxi servic
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Om Kumar</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        The best taxi service for Airport pick and drop in Chandigarh. I have booked a taxi service from Chandigarh to Delhi with effortless booking experience. Your drivers are too friendly, that I’ll love the most and had enjoyed my journey as well.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Vishwas Rao</h5>
                                            <p class="card-text">Chandigarh </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item active center" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        Our flight was delayed by two hours, so we arrived at airport at 2am. I emailed the support address, and received a prompt reply saying the agent would update my driver. The driver was awaiting at the arrivals hall for me, then we finally got their.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Ashutosh Mishra</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        Best car rental service in Delhi at affordable rates. I have feel a very safe and secure ride one way taxi from Delhi to Chandigarh with your expert drivers and well maintained cars.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Shreya Srivastava</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        I have hired a round trip car rental service from Delhi to Pune. It was a very memorable experience with your friendly drivers. There are no additional charges, the pricing policy is too transparent and your punctuality was so good.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Aman Tripathi</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        The service is great the driver is really humble and helpful. Last year before the pandemic, I had 3-4 visits to Outstation. Choosing a cab from airport in a big task, specially in Pune and Mumbai. Somehow I found Pravasi Cab and booked a taxi servic
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Om Kumar</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        The best taxi service for Airport pick and drop in Chandigarh. I have booked a taxi service from Chandigarh to Delhi with effortless booking experience. Your drivers are too friendly, that I’ll love the most and had enjoyed my journey as well.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Vishwas Rao</h5>
                                            <p class="card-text">Chandigarh </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        Our flight was delayed by two hours, so we arrived at airport at 2am. I emailed the support address, and received a prompt reply saying the agent would update my driver. The driver was awaiting at the arrivals hall for me, then we finally got their.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Ashutosh Mishra</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 821px; margin-right: 15px;">
                                <div class="card_people">
                                    <div class="card">
                                        Best car rental service in Delhi at affordable rates. I have feel a very safe and secure ride one way taxi from Delhi to Chandigarh with your expert drivers and well maintained cars.
                                        <!--					  <div class="youtube-container">
                                                  <div class="youtube-player" data-id=""></div>
                          </div>-->
                                        <div class="card-body">
                                            <h5>Shreya Srivastava</h5>
                                            <p class="card-text">Delhi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span
                aria-label="Next">›</span></button></div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot">
              <span></span>
            </button>
                        <button role="button" class="owl-dot active">
              <span></span>
            </button>
                        <button role="button" class="owl-dot">
              <span></span>
            </button>
                        <button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                </div>
                <button type="submit" class="btn people_btn mt-5"> View All</button>
            </div>
        </section>
        </div>

    </section>

    <footer>
        <section class="container">
            <div class="row pt-5 pb-5" id="hireService">
                <div class="col-md-12 serviceText px-lg-0 px-4">
                    <h2>India's best online car hire service</h2>
                    <p>
                        Dora Cabs is one of the best car hire service providers in chennai which offers you to book your car/cab online for your desired destinations whether it is local or outstation and confirm your booking by making online payment instantly. We have brought
                        online cab bookings or car hire services for you so that you can enjoy your journey with pleasant mind with our hassle free cab booking services provided by us at Dora Cabs
                    </p>
                </div>

                <div class="col-md-3 col-6">
                    <div class="service_col">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>60,000+</h5>
                        <p>location</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="service_col">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <h5>160</h5>
                        <p>Cities / Distinct</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="service_col">
                        <i class="fa fa-language" aria-hidden="true"></i>
                        <h5>43</h5>
                        <p>language spoken</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="service_col">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <h5>3,500,000</h5>
                        <p>customer reviews</p>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
@include('common.footer')
<!-- Google API -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzLgce3y8jzRe5GdXksOdAqn30aFx-qv8&libraries=places,geometry&callback=initAutocomplete&v=weekly&channel=2" async></script>
<script type="text/javascript">
    var placeSearch, autocomplete, autocomplete2;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    var cityBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(12.97232, 77.59480),
        new google.maps.LatLng(12.89201, 77.58905));   

    function initAutocomplete() {
// Create the autocomplete object, restricting the search to geographical
// location types.
autocomplete = new google.maps.places.Autocomplete((document.getElementById('fromLocation1')), {
types: ['geocode'],componentRestrictions: {country: "in"}
});
autocomplete2 = new google.maps.places.Autocomplete(document.getElementById('toLocation1'), {
types: ['geocode'],componentRestrictions: {country: "in"}
});
autocomplete3 = new google.maps.places.Autocomplete((document.getElementById('fromLocation2')), {
types: ['geocode'],componentRestrictions: {country: "in"}
});
autocomplete4 = new google.maps.places.Autocomplete(document.getElementById('toLocation2'), {
types: ['geocode'],componentRestrictions: {country: "in"}
});
google.maps.event.addListener(autocomplete2, 'place_changed', function() {
fillInAddress();
});
google.maps.event.addListener(autocomplete3, 'place_changed', function() {
fillInAddress();
});
google.maps.event.addListener(autocomplete4, 'place_changed', function() {
fillInAddress();
});
// When the user selects an address from the dropdown, populate the address
// fields in the form.
autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
// Get the place details from the autocomplete object.
var oneway_round = document.getElementById('oneway_round').value;
var trip = $('#tripo').val(oneway_round);
var fromLocation1 = document.getElementById('fromLocation1').value;
var toLocation1 = document.getElementById('toLocation1').value;
//var fromLocation2 = document.getElementById('fromLocation2').value;
//var toLocation2 = document.getElementById('toLocation2').value;
if (oneway_round == 'Oneway' && fromLocation1 != '' && toLocation1 != '') {
var place = autocomplete.getPlace();
var place2 = autocomplete2.getPlace();
document.getElementById('latOrg1o').value = place.geometry.location.lat();
document.getElementById('lagOrg1o').value = place.geometry.location.lng();
document.getElementById('desBlato').value = place2.geometry.location.lat();
document.getElementById('desBlago').value = place2.geometry.location.lng();
document.getElementById('Org2o').value = place.formatted_address;
document.getElementById('desAo').value = place2.formatted_address;
initMap();

}

if (oneway_round == 'Round' && fromLocation1 != '' && toLocation1 != '') {
var place = autocomplete.getPlace();
var place2 = autocomplete2.getPlace();
document.getElementById('latOrg1o').value = place.geometry.location.lat();
document.getElementById('lagOrg1o').value = place.geometry.location.lng();
document.getElementById('desBlato').value = place2.geometry.location.lat();
document.getElementById('desBlago').value = place2.geometry.location.lng();
document.getElementById('Org2o').value = place.formatted_address;
document.getElementById('desAo').value = place2.formatted_address;
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

jQuery(function($) {
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
const bounds = new google.maps.LatLngBounds();
const markersArray = [];
//console.log("func init map");
// initialize services
const geocoder = new google.maps.Geocoder();
const service = new google.maps.DistanceMatrixService();
// build request
var oneway_round = document.getElementById('oneway_round').value;
var latOrg1 = "";
var lagOrg1 = "";
var Org2 = "";
var desA = "";
var desBlat = "";
var desBlag = "";
if(oneway_round == "Oneway"){
latOrg1 = Number(document.getElementById('latOrg1o').value);
lagOrg1 = Number(document.getElementById('lagOrg1o').value);
Org2 = document.getElementById('Org2o').value;
desA = document.getElementById('desAo').value;
desBlat = Number(document.getElementById('desBlato').value);
desBlag = Number(document.getElementById('desBlago').value);
}
if(oneway_round == "Round"){
latOrg1 = Number(document.getElementById('latOrg1o').value);
lagOrg1 = Number(document.getElementById('lagOrg1o').value);
Org2 = document.getElementById('Org2o').value;
desA = document.getElementById('desAo').value;
desBlat = Number(document.getElementById('desBlato').value);
desBlag = Number(document.getElementById('desBlago').value);
}
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
var distance = response.rows[0].elements[0].distance.value;
var distanceText = response.rows[0].elements[0].distance.text;
var durationText = response.rows[0].elements[0].duration.text;
var distanceInKm = (distance / 1000);
var oneway_round = document.getElementById('oneway_round').value;
var fromLocation1 = document.getElementById('fromLocation1').value;
var toLocation1 = document.getElementById('toLocation1').value;
//var fromLocation2 = document.getElementById('fromLocation2').value;
//var toLocation2 = document.getElementById('toLocation2').value;
if (oneway_round == 'Oneway' && fromLocation1 != '' && toLocation1 != '') {
document.getElementById('distance1o').value = Math.round(distanceInKm);
document.getElementById('duration1o').value = durationText;
}
if (oneway_round == 'Round' && fromLocation1 != '' && toLocation1 != '') {
document.getElementById('distance1o').value = Math.round(distanceInKm);
document.getElementById('duration1o').value = durationText;
}

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
//document.getElementById('oneway_round').value = type;
if( type == 'Oneway'){
$('#oneway').addClass('active').css("background", "#FFBF00").css("color","black");
$ ('#round').addClass('active').css("background", "black").css("color","#FFBF00");
}else{
$ ('#round').addClass('active').css("background", "#FFBF00").css("color","black");
$ ('#oneway').addClass('active').css("background", "black").css("color","#FFBF00");
}Oneway
}
</script>
<script>
jQuery(document).ready(function($) {
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
setTimeout(function() {
$('.forms').addClass('ss-fast');
}, 1000);
document.getElementById('oneway_round').value = "Oneway";
/*document.getElementById('distance1o').value = 0;
document.getElementById('duration1o').value = 0;
document.getElementById('fromLocation1').value = "";
document.getElementById('toLocation1').value = "";*/
</script>