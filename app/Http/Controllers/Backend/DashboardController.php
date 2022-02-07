<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Dashboard
    public function dashboard()
    {
        // Toastr::success('Success Success SuccessSuccessSuccessSuccess','Success');
        return view('backend.dashboard.dashboard');
    }
}
