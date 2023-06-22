<?php

namespace App\Http\Controllers;

use App\Events\PusherTest;
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
        $this->middleware('auth');
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

    public function test()
    {
        return view('pusher_test');
    }
    public function send()
    {
        return view('pusher-send');
    }
    public function sendDetails(Request $request)
    {
        $text = $request->text;
        event(new PusherTest(['text' => $text])); // Pass an array with 'text' key and the value of $text
       
    }
}
