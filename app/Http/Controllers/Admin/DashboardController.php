<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request){

        $invoices = Invoice::count();
        $customers = Customer::count();
       return view('panel.dashboard',compact('invoices','customers'));
    }
}
