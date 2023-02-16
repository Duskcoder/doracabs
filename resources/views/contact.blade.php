@include('common.header')
<section>
    <div class="bred_crumb">
        <img src="#" alt="" sizes="100vw">
        <div class="brdcmb_txt">
          <h1>Contact Us</h1>
          <h4> <a href="{{ route('home') }}"> Home </a> <i class="fa fa-angle-right"></i>Contact Us </h4>
        </div> 
    </div>


    <div class="container pt-5">
        <div class="row about_section">
        
            <div class="container about_sec_text">
                <p>Dora cabs is the best car rental service provider company in Chennai. We have our dedicated team of experienced &amp; well-trained drivers with a large well-cleaned fleet of cars to fulfil all of your travel needs.
        </p>
        
                <div class="row contact_thing">
                    <div class="col-md-4 contact_items cont_item_1">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h6> You can call our team</h6><p>+91-9990965965 </p>
                    </div>
                    <div class="col-md-4 contact_items cont_item_2">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h6>Visit my address</h6><p>Head office: No.10 V.O.C street, Meenambakkam, Chennai – 27.</p>
                    </div>
                    <div class="col-md-4 contact_items cont_item_3">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h6>Email us a</h6><p>info@doracabs.com</p>
                    </div>
                </div>
        
            </div>
        </div>
        
        <!----- Contact Form ------> 
        <div class="container">
            <div class="row p-5 contact_form1">
                <!--<form action="/Contact/sendmail" method="post">-->
                @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                <form  method="post" action ="{{route('contact.store')}}">
                            {{ csrf_field() }}
                    <div class="row">
                        <div class="col-6 cont_field1">
                            <label for="name" class="form-label">Name*:</label>
                           <!-- <input type="hidden" name="pagename" value="contact-us">
                            <input type="hidden" name="url" value="/contact-us"> -->
                            <input type="text" class="form-control lettersOnly" maxlength="100" placeholder="Enter Your Name" name="name" required>
                        </div>
                        <div class="col-6 cont_field2">
                            <label for="mobile_number" class="form-label">Mobile:</label>
                            <input type="number" class="form-control" maxlength="12" placeholder="Enter Your contact Number" name="mobile_number" required>
                        </div>
                    </div>
                    <div class="mb-3 mt-3  cont_field3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your email id" name="email" required>
                    </div>
                    <div class="mb-3  cont_field4">
                        <label for="message" class="form-label">Delivery Location:</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Enter Full Address" rows="5"></textarea>
                    </div>
                    <div class="col-md-2 cont_button">
                        <button type="submit" class="btn contact_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        
</section>

@include('common.footer')