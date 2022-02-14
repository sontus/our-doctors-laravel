<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chamber;
use App\Models\Doctor;
use App\Models\Hospital;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard
    public function index()
    {
        $category   = Category::count();
        $doctor     = Doctor::count();
        $hospital   = Hospital::count();
        $chamber    = Chamber::count();
        return view('backend.dashboard.dashboard',compact('category','doctor','hospital','chamber'));
    }
}
