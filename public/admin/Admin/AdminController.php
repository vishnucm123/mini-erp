<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index(Request $request){
dd(322222);

       return view ('admin.dashboard');
    }
}
