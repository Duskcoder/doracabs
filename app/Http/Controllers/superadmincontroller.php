<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class superadmincontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('adfadf');
        return view('superadmin.home');
    }
}
