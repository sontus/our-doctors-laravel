<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Review;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

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
        // Toastr::success('Doctor Successfully Added');
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

    // doctor register
    public function doctor_register(Request $request)
    {
        $this->validate($request,[
            'doctor_name'       => 'required',
            'doctor_degree'     => 'required',
            'doctor_category'   => 'required',
            'doctor_hospital'   => 'required',
            'doctor_mobile'     => 'required',
            'doctor_experince'  => 'required',
            'doctor_address'    => 'required',
            'doctor_details'    => 'required',
            'doctor_image'      => 'required|mimes:jpg,png,gif,jpeg|max:2048',
        ]);

        try{
            $fileName = imageUploadWithCustomSize($request->doctor_image,"120","140","doctors");

            $doctor                   = new Doctor();
            $doctor->name             = $request->doctor_name;
            $doctor->category_id      = $request->doctor_category;
            $doctor->hospital_id      = $request->doctor_hospital;
            $doctor->mobile           = $request->doctor_mobile;
            $doctor->address          = $request->doctor_address;
            $doctor->degree           = $request->doctor_degree;
            $doctor->age              = $request->doctor_experince;
            $doctor->details          = $request->doctor_details;
            $doctor->image            = $fileName;
            $doctor->save();

            Toastr::success('Doctor Successfully Added');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
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

        $doctors        = Doctor::select('doctors.*',
                            'doctors.name as doctor_name',
                            'categories.name',
                            'hospitals.name',
                            'hospitals.division_id',
                            'hospitals.district_id',
                            'divisions.name as division',
                            'districts.name'
                            )
                        // ->leftJoin('')
                        ->leftJoin('categories', 'doctors.category_id', '=', 'categories.id')
                        ->leftJoin('hospitals', 'doctors.hospital_id', '=', 'hospitals.id')
                        ->leftJoin('divisions', 'hospitals.division_id', '=', 'divisions.id')
                        ->leftJoin('districts', 'hospitals.district_id', '=', 'districts.id')
                        ->where('doctors.name', 'LIKE', "%{$request->doctor_name}%")
                        ->orWhere('categories.name', 'LIKE', "%{$request->doctor_name}%")
                        ->orWhere('hospitals.name', 'LIKE', "%{$request->doctor_name}%")
                        ->orWhere('divisions.name', 'LIKE', "%{$request->doctor_name}%")
                        ->orWhere('divisions.name', 'LIKE', "%{$request->doctor_name}%")
                        ->get();

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
