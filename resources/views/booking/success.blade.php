@include('common.header')
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<link rel="stylesheet" href="{{ asset('frontuser/success.css') }}">
<section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
                <div class="icon">
                    <i class="fas fa-check "></i>

                </div>
                <!-- /.icon -->

                <h1>Success!</h1>
                <p>We've sent a confirmation to your e-mail
                    <br>for verification.
                </p>

                <div class="ss-success-dtl">
                    <div class="ss-location-cnt">
                        <div class="ss-location">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <strong>{{$bookedData->from_place}}</strong> to
                            <strong>{{$bookedData->to_place}}</strong>
                        </div>
                        <div class="ss-time-date">
                            <p>on <strong>{{$bookedData->depart_date_time}}</strong></p>
                        </div>
                    </div>

                    <div class="ss-location-cnt">
                        <div class="ss-trip-cnt">
                            {{$bookedData->oneway_round}} trip of about {{$bookedData->distance}} KM
                        </div>
                        <div class="ss-trip-dtl">
                            <div class="ss-price-list text-center">
                                <p>₹<strong>{{$bookedData->actual_amount    }}</strong><br/><span>Total Fare</span></p>
                                <div class="ss-price-msg">
                                    <p>Lowest fare in the market</p>
                                </div>
                            </div>
                        </div>

                        <div class="ss-tab-container">
                            <label for="title-1" class="title">See fare details <span><i class="fa fa-angle-down"
                                        aria-hidden="true"></i></span></label>
                            <input type="checkbox" id="title-1" class="title">
                            <div class="contentbox">
                                <div class="ss-tb-cnt">
                                    <div class="ss-base-fare">
                                        <p>Base Fare</p>
                                        <p>₹ {{$bookedData->actual_amount}}</p>
                                    </div>
                                    <div class="ss-driver-allowance">
                                        <p>Driver Allowance</p>
                                        <p>₹ {{$bookedData->driver_bata}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ss-note">* Excludes tolls and parking. Hillstation charges applicable for Ooty,
                            Kodaikanal and Yercaud</div>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="btn">Ok</a>
            </div>
            <!--/.success-->
        </div>
        <!--/.row-->
        <div class="row">
            <div class="modalbox error col-sm-8 col-md-6 col-lg-5 center animate" style="display: none;">
                <div class="icon">
                    <span class="glyphicon glyphicon-thumbs-down"></span>
                </div>
                <!--/.icon-->
                <h1>Oh no!</h1>
                <p>Oops! Something went wrong,
                    <br> you should try again.
                </p>
                <button type="button" class="btn">Try again</button>
                <span class="change"></span>
            </div>
        </div>
    </div>
</section>





<br /><br />
@include('common.footer')
<script src="{{ asset('user-theme/assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function() {
            $('.title').on('click', function() {
                $('.contentbox').toggle(); // or use .slideToggle() for a smoother animation
            });
        });
    </script>
        <script>
        const checkbox = document.getElementById('title-1');
        const contentbox = document.querySelector('.contentbox');

        checkbox.addEventListener('click', function() {
            contentbox.style.display = checkbox.checked ? 'block' : 'none';
        });
    </script>

