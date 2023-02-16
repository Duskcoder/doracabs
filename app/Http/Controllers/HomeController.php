<?php

namespace App\Http\Controllers;
use App\Models\Cars;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function tariff()
    {
        return view('tariff');
    }
    public function contact()
    {
        return view('contact');
    }
    public function cabsList()
    {
        return view('cabs-list');
    }
}
