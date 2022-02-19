<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $categories     = Category::orderBy('name', 'asc')->get();
        $doctors        = Doctor::where('row_status', true)->limit(6)->get();
        $hospitals      = Hospital::latest()->limit(4)->get();

        return view('index', compact('categories', 'doctors', 'hospitals'));
    }

    // doctor
    public function doctor()
    {

        $categories     = Category::orderBy('name', 'asc')->get();
        $dCategory      = Category::where('id', 1)->first();
        $doctors        = Doctor::where('row_status',true)->where('category_id', 1)->get();
        return view('doctor-list', compact('categories', 'dCategory', 'doctors'));
    }

    // doctor register
    public function doctor_register(Request $request)
    {
        $this->validate($request, [
            'doctor_name'       => 'required',
            'doctor_degree'     => 'required',
            'doctor_category'   => 'required',
            'doctor_hospital'   => 'required',
            'doctor_mobile'     => 'required|min:11',
            'doctor_experince'  => 'required',
            // 'doctor_address'    => 'required',
            'doctor_image'      => 'required|mimes:jpg,png,gif,jpeg|max:2048',
        ]);

        try {
            $fileName = imageUploadWithCustomSize($request->doctor_image, "120", "140", "doctors");

            $doctor                   = new Doctor();
            $doctor->name             = $request->doctor_name;
            $doctor->category_id      = $request->doctor_category;
            $doctor->hospital_id      = $request->doctor_hospital;
            $doctor->mobile           = $request->doctor_mobile;
            $doctor->address          = $request->doctor_address;
            $doctor->degree           = $request->doctor_degree;
            $doctor->age              = $request->doctor_experince;
            $doctor->details          = $request->doctor_details;
            $doctor->row_status       = "0";
            $doctor->image            = $fileName;
            $doctor->save();

            Toastr::success('Doctor Successfully Added');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    // category wish doctor
    public function doctorCategory($id)
    {
        $categories     = Category::orderBy('name', 'asc')->get();
        $dCategory      = Category::where('id', $id)->first();
        $doctors        = Doctor::where('category_id', $id)->where('row_status', true)->get();
        return view('doctor-list', compact('categories', 'dCategory', 'doctors'));
    }

    // doctor detail
    public function doctorDetails($id)
    {
        $details = Doctor::where('id', $id)->first();
        $reviews = Review::where('doctor_id', $id)->where('row_status', true)->get();
        $avgStar = Review::where('doctor_id', $id)->where('row_status', true)->avg('rating');
        return view('doctor-details', compact('details', 'reviews','avgStar'));
    }

    // search-doctor
    public function search_doctor(Request $request)
    {

        $search_text = $request->doctor_name;
        $doctors        = Doctor::select(
            'doctors.*',
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
            ->where('doctors.name', 'LIKE', "%{$search_text}%")
            ->where('doctors.row_status', true)
            ->orWhere('categories.name', 'LIKE', "%{$search_text}%")
            ->orWhere('hospitals.name', 'LIKE', "%{$search_text}%")
            ->orWhere('divisions.name', 'LIKE', "%{$search_text}%")
            ->orWhere('divisions.name', 'LIKE', "%{$search_text}%")
            ->get();

        // dd($doctors);

        return view('doctor-result', compact('doctors','search_text'));
    }

    // // doctor_list_by_division
    // public function doctor_list_by_division($id)
    // {
    //     $doctors        = Doctor::select('doctors.*',
    //                         'doctors.name as doctor_name',
    //                         'divisions.id',
    //                         'hospitals.division_id',
    //                         )
    //                     ->leftJoin('divisions', 'hospitals.division_id', '=', 'divisions.id')
    //                     ->where('divisions.name',$id)

    //                     ->get();

    //     dd($doctors);
    //     return view('doctor-by-division.php',compact('doctors'));
    // }
    // member login
    public function member_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Toastr::success('Member Successfully Login');
            return redirect()->intended('member-dashboard');
        }
        else{
            Toastr::warning('Oppes! You have entered invalid credentials');
            return redirect("home");
        }

    }

    // member register
    public function member_register(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        Toastr::success('Member Successfully Register');
        return redirect("home")->withSuccess('Great! You have Successfully loggedin');
    }

    // Dashboard
    public function dashboard()
    {
        // return "Wroking";
        return redirect()->route('home');
    }
    public function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'user_type' => "3",
            'password' => Hash::make($data['password'])
        ]);
    }

    public function storeReview(Request $request)
    {
        $this->validate($request,[
            'rating' => 'required',

        ]);
        // return $request;
        $review = new Review();
        $review->user_id = $request->user_id;
        $review->doctor_id = $request->doctor_id;
        $review->rating = $request->star;
        $review->review = $request->comment;
        $review->save();
        Toastr::success('Review Successfully Added');
        return redirect()->back();
    }
    // hospital
    public function hospital()
    {
        $hospitals   = Hospital::latest()->get();
        return view('hospital-list', compact('hospitals'));
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('home');
    }
}
