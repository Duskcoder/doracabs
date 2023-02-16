<?php

namespace App\Http\Controllers;
use App\Models\Car;
use DB;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function cabs()
    {
        $cars = DB::select('select * from cars');
        return view('cabs-list',['cars'=>$cars]);
        // return DB::select('select * from cars');
  
        // return view('cabs-list',['cars'=>$cars]);
    }
 
}


