
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets booking </title>
</head>
<body>
<section>
        <div class="container">
            <div class="text-center ">
            @component('mail::message')
                <h4 class="fontsize30px">Dear Customer,</h4>
                <p class="text-weight">Thank you for your registration!. You will receive a confirmation call from us.
                </p>
            </div>
            <div class="text-center text-success f-s-25px">
                <p>Your Booking Point Information:</p>
            </div>
            <!-- <div class="text-center">
                <img src=" {{ asset('theme/assets/images/dora_cabs1.png') }}" alt="LOG" class="imagessize">
            </div>    -->
Pick-up Point: {{$data['from_place']}}.<br>
Drop Point: {{$data['to_place']}}.<br>
Trip: {{$data['oneway_round']}}.<br>
Depart Date: {{$data['depart_date_time']}}.<br>
@if($data['cust_email'])
Email: {{$data['cust_email']}}<br>
@endif
@if($data['cust_mbl'])
Phone Number: {{$data['cust_mbl']}}<br>
@endif
@if($data['car_id'] == 1)
Type of Vehicle: Sedan<br>
@elseif($data['car_id'] == 2)
Type of Vehicle: MUV<br>
@endif

@if($data['pickup_add'])
Pick Up Address: {{$data['pickup_add']}}<br>
@endif
@if($data['drop_add'])
Drop Address: {{$data['drop_add']}}<br>
@endif
@if($data['days'])
Days: {{$data['days']}}<br>
@endif
Distance Cover: {{$data['distance']}}Km.<br>
Base Fare: ₹ {{$data['actual_amount']}}.<br>
Driver Allowance: ₹ {{$data['driver_bata']}}.<br>
Total Fare: ₹ {{$data['amount']}}.<br>
<br>
<small>* Excludes tolls and parking. Hillstation charges applicable.</small><br>
<small>* Additional km charges are applicable based on the type of vehicle.</small><br>
<small>* Inter state permit charges are applicable.</small><br>

<u>Your Contact Information:</u><br>
Name: {{$data['cust_name']}}<br>
@if($data['cust_mbl'])
Phone Number 1: {{$data['cust_mbl']}}<br>
@endif
@if($data['cust_email'])
Email: {{$data['cust_email']}}<br>
@endif
<!-- <div class="text-center">
                <img src="{{ asset('theme/assets/images/confirm.jpg') }}" alt="con" class="imagessize">
            </div>  -->
If you have any questions, please call <a href="tel:8220174555">8220174555</a>, <a href="tel:8220163555">8220163555</a>.​


Thanks,<br>
<a href="{{ route('home2') }}">www.doracabs.com</a>
</div>
@endcomponent
