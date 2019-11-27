<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function myorder()
    {
        return view('myorder');
    }
    public function task()
    {
        return view('order');
    }
    public function myorderdetails()
    {
        return view('myorderdetails');
    }
    public function terms()
    {
        return view('terms');
    }
}
