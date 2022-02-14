<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories     = Category::orderBy('name','asc')->get();
        $doctors        = Doctor::get();
        $hospitals      = Hospital::latest()->limit(8)->get();
        return view('index',compact('categories','doctors','hospitals'));
    }

    // doctor
    public function doctor()
    {

        $categories     = Category::orderBy('name','asc')->get();
        $dCategory      = Category::where('id',1)->first();
        $doctors        = Doctor::where('category_id',1)->get();
        return view('doctor-list',compact('categories','dCategory','doctors'));

    }

    // category wish doctor
    public function doctorCategory($id)
    {
        $categories     = Category::orderBy('name','asc')->get();
        $dCategory      = Category::where('id',$id)->first();
        $doctors        = Doctor::where('category_id',$id)->get();
        return view('doctor-list',compact('categories','dCategory','doctors'));
    }

    // doctor detail
    public function doctorDetails($id)
    {
        $details = Doctor::where('id',$id)->first();
        $reviews = Review::where('doctor_id',$id)->get();
        return view('doctor-details',compact('details','reviews'));
    }

    // search-doctor
    public function search_doctor(Request $request)
    {
       
        $doctors        = Doctor::where('name', 'LIKE', "%{$request->doctor_name}%")->get();

        // dd($doctors);
        return view('doctor-result',compact('doctors'));

    }
    // review store
    public function storeReview(Request $request)
    {
        $review = new Review();
        $review->user_id = $request->user_id;
        $review->doctor_id = $request->doctor_id;
        $review->rating = $request->rating;
        $review->review = $request->comment;
        $review->save();
        return redirect()->back();
    }
    // hospital
    public function hospital()
    {
        $hospitals   = Hospital::latest()->get();
        return view('hospital-list',compact('hospitals'));
    }
}
