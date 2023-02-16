@include('common.header')
  <!--- End of Navbar----><!---- Section About Us ----->
  <div class="bred_crumb">
    <img src="./uploads/cab_banner.webp" alt="" sizes="100vw">
    <div class="brdcmb_txt">
      <h1>Tariff</h1>
      <h4> <a href="#"> Home </a> <i class="fa fa-angle-right"></i>Tariff </h4>
    </div>
  </div>

  <section  id="tariff" class="py-5">
    <div  class="container">

      <div  class="row pt-3">
        <div  class="col-md-6">
          <p  class="title">Terms and conditions</p>
          <ul >
            <li >Toll fees, Inter-State Permit charges (if any) are extra. Driver bata is Rs. 300/-
              per day for Round Trip.</li>
            <li >Drop Trips - Driver Bata Rs. 300. [Rs. 500 for above 400 kms]</li>
            <li >Hill station charges - Rs. 300, Waiting charge - Rs. 150/hour</li>
            <li >Night Charge for KMs more than 250 and between 11 PM To 4 AM - Rs. 200</li>
            <li >Round Trips - Minimum running must be 250 Kms per day. For Bengaluru it is minimum
              300 Kms per day.</li>
            <li >Drop Trips - Minimum running must be 130 Kms per day.</li>
            <li >Tempo Traveller is available for Round trip alone. Driver bata is Rs. 500.</li>
            <li >1 day = (from midnight 12 to Next Midnight 12)</li>
          </ul>
        </div>
              <div  class="col-md-6">
                <h1 >Tariff Chart</h1>
                <table  class="table table-bordered">
                  <thead  class="thead-dark">
                    <tr >
                      <th  scope="col">Vehicle Type</th>
                      <th  scope="col">OneWay Trip <br > Rate / Km</th>
                      <th  scope="col">Round Trip <br > Rate / Km</th>
                    </tr>
                  </thead>
                  <tbody >
                    <tr >
                      <td >Hatchback (Indica)</td>
                      <td >Rs. 13/km</td>
                      <td >Rs. 10/km</td>
                    </tr>
                    <tr >
                      <td >Sedan (Indigo / Etios / Dzire)</td>
                      <td >Rs. 13/km</td>
                      <td >Rs. 12/km</td>
                    </tr>
                    <tr >
                      <td >MUV (Innova / Xylo / Enjoy)</td>
                      <td >Rs. 18/km</td>
                      <td >Rs. 15/km</td>
                    </tr>
                    <tr >
                      <td >Tempo Traveller</td>
                      <td >Not Available</td>
                      <td >Rs. 18/km</td>
                    </tr>
                  </tbody>
                </table>
              </div>
      </div>
    </div>
  </section>


  <footer>
    <section class="container">
      <div class="row pt-5 pb-5" id="hireService">
        <div class="col-md-12 serviceText">
          <h2>India's best online car hire service</h2>
          <p>
            Dora Cabs is one of the best car hire service providers in chennai which
            offers you to book your car/cab online for your desired destinations
            whether it is local or outstation and confirm your booking by making
            online payment instantly. We have brought online cab bookings or car hire
            services for you so that you can enjoy your journey with pleasant mind
            with our hassle free cab booking services provided by us at Dora Cabs
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
    @include('common.footer')