@component('mail::message')
# Dear Chennaidroptaxi,

A Booking received!.

<u>Booking Point Information:</u><br>
Pick-up Point: {{$data['from_place']}}.<br>
Drop Point: {{$data['to_place']}}.<br>
Trip: {{$data['oneway_round']}}.<br>
Depart Date: {{$data['depart_date_time']}}.<br>
@if($data['cust_email'])
Email: {{$data['cust_email']}}<br>
@endif
@if($data['cust_mbl'])
Phone Number 1: {{$data['cust_mbl']}}<br>
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

<u>Contact Information:</u><br>
Customer Name: {{$data['cust_name']}}<br>
@if($data['cust_mbl'])
Phone Number 1: <a href="tel:{{$data['cust_mbl']}}">{{$data['cust_mbl']}}</a><br>
@endif


For More Information <a href="{{ url('home') }}">Login To Chennaidroptaxi</a>.<br>
Thanks,<br>
ChennaidroptaxiIn
@endcomponent
