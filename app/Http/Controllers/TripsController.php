<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use App\Models\Booking;
use App\Models\Payments;
use DataTables;

class TripsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('booked-trips.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookedData = Booking::with('driver')->with('vehicle')->with('payment')->find($id);
        return view('booked-trips.edit',compact('bookedData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bookings = Booking::find($id);
        $bookings->status = $request['status'];
        $bookings->driver->driver_name = $request['driver_name'];
        $bookings->driver->licence_number = $request['licence_number'];
        $bookings->driver->age = $request['age'];
        $bookings->vehicle->vehicle_name = $request['vehicle_name'];
        $bookings->vehicle->vehicle_number = $request['vehicle_number'];
        $bookings->vehicle->vehicle_seats = $request['vehicle_seats'];
        $bookings->payment->initial_payment = $request['initial_payment'];
        $bookings->payment->driver_bata = $request['driver_bata'];
        $bookings->payment->toll = $request['toll'];
        $bookings->payment->parking = $request['parking'];
        $bookings->payment->note = $request['note'];
        $bookings->push();
        return redirect()->route('booked-trips.index')->with('success', 'Booking information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $data = Booking::latest();
        return DataTables::of($data)
        ->editColumn('from_place', function($data) {
            return '<div class="text-wrap width-200">' . $data->from_place . '</div>';
        })
        ->editColumn('to_place', function($data) {
            return '<div class="text-wrap width-200">' . $data->to_place . '</div>';
        })
        ->editColumn('oneway_round', function($data) {
            if($data->oneway_round == 'One way')
            return '<span class="badge rounded-pill badge-soft-purple">' . $data->oneway_round . '</span>';
            else
            return '<span class="badge rounded-pill badge-soft-info">' . $data->oneway_round . '</span>';
        })
        ->addColumn('status', function($row){
            $status = '';
            if($row->status == 0)
                $status = '<span class="badge rounded-pill badge-soft-warning">Pending</span>';
            elseif($row->status == 1)
                $status = '<span class="badge rounded-pill badge-soft-success">Booked</span>';
            elseif($row->status == 2)
                $status = '<span class="badge rounded-pill badge-soft-primary">Boarded</span>';
            elseif($row->status == 3)
                $status = '<span class="badge rounded-pill badge-soft-info">Completed</span>';
            elseif($row->status == 4)
                $status = '<span class="badge rounded-pill badge-soft-danger">Cancelled</span>';
            else
            $status = '';
            return $status;
        })
        ->editColumn('cust_mbl', function($data) {
            $mbl_one = ($data->cust_mbl !="")?'<span class="fa fa-phone"></span>&nbsp&nbsp<a href=tel:'.$data->cust_mbl.'>'.$data->cust_mbl.'</a><br>':"";
            $mbl_two = ($data->cust_mbl2 !="")?'<span class="fa fa-phone"></span>&nbsp&nbsp<a href=tel:'.$data->cust_mbl2.'>'.$data->cust_mbl2.'</a>&nbsp':"";
            return $mbl_one.$mbl_two;
        })
        ->addColumn('action', function($row){
            $actionBtn = '';
                $actionBtn = '<a href="booked-trips/'.$row->id.'/edit" class="edit btn btn-sm btn-outline-warning btn-square"><i
                class="fas fa-edit me-2"></i>Edit</a>';
            return $actionBtn;
        })
        ->filter(function ($instance) use ($request) {
            if (!empty($request->get('search'))) {
                $instance->where(function($w) use($request){
                    $search = $request->get('search');
                    $w->orWhere('from_place', 'LIKE', "%$search%")
                    ->orWhere('to_place', 'LIKE', "%$search%")->orWhere('oneway_round', 'LIKE', "%$search%")
                    ->orWhere('charge_per_km', 'LIKE', "%$search%")->orWhere('distance', 'LIKE', "%$search%")
                    ->orWhere('amount', 'LIKE', "%$search%")->orWhere('depart_date_time', 'LIKE', "%$search%")
                    ->orWhere('cust_name', 'LIKE', "%$search%")->orWhere('cust_mbl', 'LIKE', "%$search%")
                    ->orWhere('cust_email', 'LIKE', "%$search%")
                    ;
                });
            }
        })
        ->rawColumns(['from_place','to_place','cust_mbl','oneway_round','status','action'])
        ->make(true);
    }
}
