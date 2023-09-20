<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cars;
use App\Models\Contact;
use App\Models\Driver;
use App\Models\Payment;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Mail\ContactusMailTo;
use App\Mail\BookingNotificationMail;
use App\Mail\BookingNotificationToAdminMail;
use Illuminate\Support\Facades\Validator;

use Mail;
use DB;
use Session;
use Carbon\Carbon;


class BookingController extends Controller
{


    public function index(Request $request)
    {
        $cars=Cars::orderBy('created_at', 'asc')->get();
        return view('booking.create')->with(compact('cars'));

    }

    //
    public function bookNowStep2()

    {
        $cars = Cars::orderBy('created_at', 'asc')->get();
        // dd($cars);
        return view('booking.bookingstep2')->with(compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // echo '<pre>';
        // print_r($request);
        if ($request['oneway_round']) {
            $request->validate([
                'car_id'=>'required'
                ]);
            $date=$request['pickupdate'];
            $time=$request['pickuptime'];
            $data = array(
                'from_place' => $request['from_place1'],
                'to_place' => $request['to_place1'],
                'car_id' => $request['car_id'],
                'oneway_round' => 'One way',
                'charge_per_km' => $request['charge_per_km'],
                'distance' => $request['distance'],
                'amount' => $request['amount'],
                'depart_date_time' => $date . ' ' . $time,
                'cust_name' => $request['cust_name'],
                'cust_email' => $request['cust_email'],
                'cust_mbl' => $request['cust_mbl1'],
                'pickup_add' => $request['pickUpAddress'],
                'drop_add' => $request['dropAddress'],
                'days' => $request['days2'],
                'actual_amount' => $request['actualAmount1'],
                'driver_bata' => $request['driverBata1']

            );
        }

        if ($request['oneway_round1']) {
                 $request->validate([
                    'car_id2'=>'required'
                ]);
            $date=$request['pickupdate'];
            $time=$request['pickuptime'];
            $returndate=$request['dropdate'];
            $data = array(
                'from_place' => $request['from_place2'],
                'to_place' => $request['to_place2'],
                'car_id' => $request['car_id2'],
                'oneway_round' => 'Round',
                'charge_per_km' => $request['charge_per_km2'],
                'distance' => $request['distance2'],
                'amount' => $request['amount2'],
                'cust_name' => $request['cust_name'],
                'depart_date_time' => $date . ' ' . $time,
                'cust_email' => $request['cust_email'],
                'cust_mbl' => $request['cust_mbl1'],
                'pickup_add' => $request['pickUpAddress'],
                'drop_add' => $request['dropAddress'],
                'return_date_time' => $returndate,
                'days' => $request['days2'],
                'actual_amount' => $request['actualAmount2'],
                'driver_bata' => $request['driverBata2']

            );

            // print_r($data); die;
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

        // if (!empty($request['cust_email'])) {
        //     // print_r($request['cust_email']); die;
        //     Mail::to($request['cust_email'])->send(new BookingNotificationMail($data));
        // }
        // // Notifying Admin
        // $adminMailAddress = env('MAIL_FROM_ADDRESS');
        // // print_r($adminMailAddress); die;
        // Mail::to($adminMailAddress)->send(new BookingNotificationToAdminMail($data));
        // // Mail::to('dhivyashree.duskcoder@gmail.com', 'Admin')->send(new BookingNotificationToAdminMail($data));

        return redirect()->route('booking-result', [$bookings->id]);
    }



    public function bookingResult($id)
    {
        //  $bookedData = Booking::with('driver')->with('vehicle')->find($id);
        $bookedData = Booking::find($id);
        // dd($bookedData);
        return view('booking.success', compact('bookedData'));
    }
}
