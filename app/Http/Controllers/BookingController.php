<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Contact;
use App\Models\Driver;
use App\Models\Payment;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Mail\ContactMailTo;
use App\Mail\BookingNotificationMail;
use App\Mail\BookingNofiticationToAdminMail;
use Mail;
use DB;


class BookingController extends Controller
{
    //
    public function bookNowStep2()
    {
        $cars=Car::orderBy('created_at', 'asc')->get();
        return view('booking.bookingstep2')->with(compact('cars'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['oneway_round']){
        $data = array(
            'from_place' => $request['from_place1'],
            'to_place' => $request['to_place1'],
            'car_id' => $request['car_id1'],
            'oneway_round' => 'One way',
            'charge_per_km' => $request['charge_per_km1'],
            'distance' => $request['distance1'],
            'amount' => $request['amount1'],
            'depart_date_time' => date("Y-m-d H:i:s", strtotime($request['depart_date1']." ".$request['depart_time1'])),
            'cust_name' => $request['cust_name'],
            'cust_email' => $request['cust_email'],
            'cust_mbl' => $request['cust_mbl1'],
            'pickup_add' => $request['from_place1'],
            'drop_add' => $request['to_place1'],
            'days' => $request['days1'],
            'actual_amount' => $request['actualAmount1'],
            'driver_bata' => $request['driverBata1']
        );
    }
        
    if($request['oneway_round1']){
        $data = array(
            'from_place' => $request['from_place2'],
            'to_place' => $request['to_place2'],
            'car_id' => $request['car_id2'],
            'oneway_round' => 'Round',
            'charge_per_km' => $request['charge_per_km2'],
            'distance' => $request['distance2'],
            'amount' => $request['amount2'],
            'depart_date_time' => date("Y-m-d H:i:s", strtotime($request['depart_date2']." ".$request['depart_time2'])),
            'cust_name' => $request['cust_name'],
            'cust_email' => $request['cust_email'],
            'cust_mbl' => $request['cust_mbl1'],
            'pickup_add' => $request['pickUpAddress'],
            'drop_add' => $request['dropAddress'],
            'return_date_time' => $request['return_date'],
            'days' => $request['days2'],
            'actual_amount' => $request['actualAmount2'],
            'driver_bata' => $request['driverBata2']
        );

    }
        $bookings = new Booking($data);
        $bookings->save();

        // Driver
        $drivers = new Driver;
        $drivers->booking_id = $bookings->id;
        $bookings->driver()->save($drivers);

        // Vehicle
        $vehicles = new Vehicle;
        $vehicles->booking_id = $bookings->id;
        $bookings->vehicle()->save($vehicles);

        // Payment
        $payments = new Payment;
        $payments->booking_id = $bookings->id;
        $bookings->payment()->save($payments);

        // Notifying Users
       if(!empty($request['cust_email'])){
           Mail::to($request['cust_email'])->send(new BookingNotificationMail($data));
        }
        // Notifying Admin
        $adminMailAddress = env('mail_admin_address');
        Mail::to($adminMailAddress)->send(new BookingNofiticationToAdminMail($data));
        
        return redirect()->route('booking-result',[$bookings->id]);
    }
    public function bookingResult($id)
    {
        $bookedData = Booking::with('driver')->with('vehicle')->find($id);
        return view('booking.success',compact('bookedData'));
    }
}
