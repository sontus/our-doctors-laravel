<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $doctors    = Doctor::latest()->get();
            $categories = Category::where('row_status',true)->latest()->get();
            $hospitals  = Hospital::where('row_status',true)->latest()->get();
            return view('backend.doctor.index',compact('doctors','categories','hospitals'));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return response()->json(['row_data' => $doctor],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor_id)
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
            
        ]);
        
        try{
            $doctor = Doctor::findOrFail($request->old_id);

            if(isset($request->doctor_image))
            {
                $this->validate($request,[
                    'doctor_image'          => 'required|mimes:jpg,png,gif,jpeg|max:2048',
                ]);

                // Delete old image
                if (Storage::disk('public')->exists('doctors/'.$doctor->image))
                {
                    Storage::disk('public')->delete('doctors/'.$doctor->image);
                }

                $fileName = imageUploadWithCustomSize($request->doctor_image,"120","140","doctors");;  // fileName, width, height, folderName 
            }
            else{
                $fileName = $doctor->image;
            }

            $doctor->name             = $request->doctor_name;
            $doctor->category_id      = $request->doctor_category;
            $doctor->hospital_id      = $request->doctor_hospital;
            $doctor->mobile           = $request->doctor_mobile;
            $doctor->address          = $request->doctor_address;
            $doctor->degree           = $request->doctor_degree;
            $doctor->age              = $request->doctor_experince;
            $doctor->details          = $request->doctor_details;
            $doctor->image            = $fileName;
            $doctor->update();
    
            Toastr::success('Doctor Successfully Added');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        try{
            // Delete old image
            if (Storage::disk('public')->exists('doctors/'.$doctor->image))
            {
                Storage::disk('public')->delete('doctors/'.$doctor->image);
            }
            $doctor->delete();
            Toastr::success('Doctor Successfully Deleted');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    }
}
