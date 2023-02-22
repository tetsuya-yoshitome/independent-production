<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Carbon;
use public\js\sample;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        $user = Auth::user();
        // $unix = strtotime($user->pre_login_date);
        // $now = strtotime($user->login_date);
        // $diff_sec = $now - $unix;
        $date = new Carbon($user->pre_login_date);
        $date2 = new Carbon($user->login_date);

        if(!(isset($date) ) && !(isset($date2) )){
            $unit = "初めてのログインです";
        } else{
            $date3 = $date->subSeconds()->diffForHumans($date2);
            $unit="再ログインしました。前回ログインは{$date3}です。";

        }

        return view('home',['user'=>$user],['unit'=>$unit]);
}   
    
}