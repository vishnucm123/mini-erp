<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request){

        return view('front.index');
    }

    public function faq()
    {
        return view('front.faq');
    }

    public function rulesRegulations(){

        return view('front.rules_regulations');
    }

    public function privateLessons(){

        return view('front.private_lessons');
    }

    public function skatingProgram(){

        return view('front.skating_program');
    }

    public function summerWinterCamps(){

        return view('front.summer_winter_camps');
    }

    public function coachProfile(){

        return view('front.coach_profile');
    }

    public function competitions(){
        return view('front.competitions');
    }

    public function packages(){

        return view('front.packages');
    }

    public function gallery(){

        return view('front.gallery');
    }

    public function requestForm(){

        return view('front.request_form');
    }

    public function about(){

        return view('front.about');
    }

    public function groupBookings(){

        return view('front.group_booking');
    }

    public function bookingDetails(){
        return view('front.booking_details');
    }



}
