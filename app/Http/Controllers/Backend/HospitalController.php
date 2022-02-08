<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Hospital;
use App\Models\Upazilla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $divisions = Division::latest()->get();
            $hospitals = Hospital::latest()->get();
            return view('backend.hospital.index',compact('divisions','hospitals'));

        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'hospital_name'     => 'required',
            'division_id'       => 'required',
            'district_id'       => 'required',
            'upazilla_id'       => 'required',
            'hospital_mobile'   => 'required',
            'hospital_address'  => 'required',
            'hospital_logo'     => 'required|mimes:jpg,png,gif,jpeg|max:2048',
        ]);
        
        try{
            $fileName = imageUploadWithCustomSize($request->hospital_logo,"200","75","hospitals");

            $hospital                   = new Hospital();
            $hospital->name             = $request->hospital_name;
            $hospital->division_id      = $request->division_id;
            $hospital->district_id      = $request->district_id;
            $hospital->upazila_id       = $request->upazilla_id;
            $hospital->phone            = $request->hospital_mobile;
            $hospital->address          = $request->hospital_address;
            $hospital->logo             = $fileName;
            $hospital->save();
    
            Toastr::success('Hospital Successfully Added');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    public function getDistrictByDivision($id = 0){
        $list= District::where('division_id',$id)->orderBy('name', 'asc')->get();
        return response()->json(['rows' => $list],200);
    }

    public function getUpazillaByDistrict($id = 0){
        $list= Upazilla::where('district_id',$id)->orderBy('name', 'asc')->get();
        return response()->json(['rows' => $list],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        try{
            // Delete old image
            if (Storage::disk('public')->exists('hospitals/'.$hospital->logo))
            {
                Storage::disk('public')->delete('hospitals/'.$hospital->logo);
            }
            $hospital->delete();
            Toastr::success('Hospital Successfully Deleted');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
