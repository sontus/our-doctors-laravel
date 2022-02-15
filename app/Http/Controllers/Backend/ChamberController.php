<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

use App\Models\Chamber;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class ChamberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $chambers   = Chamber::latest()->get();
            $hospitals  = Hospital::where('row_status',true)->get();
            $doctors    = Doctor::where('row_status',true)->get();
            return view('backend.chamber.index',compact('chambers','hospitals','doctors'));

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
        
        $this->validate($request,[
            'hospital_id'   => 'required',
            'doctor_id'     => 'required',
            'mobile'        => 'required',
            'time'          => 'required',
            'visitfees_one' => 'required',
            'visitfees_two' => 'required',
            'address'       => 'required',
        ]);
        
        try{
            $chamber    = new Chamber();
            $chamber->doctor_id         = $request->doctor_id ;
            $chamber->hospital_id       = $request->hospital_id ;
            $chamber->consulting_hrs    = $request->time ;
            $chamber->visitfees_one     = $request->visitfees_one ;
            $chamber->visitfees_two     = $request->visitfees_two ;
            $chamber->mobile            = $request->mobile ;
            $chamber->address           = $request->address ;
            $chamber->save();
    
            Toastr::success('Chamber Successfully Added');
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
     * @param  \App\Models\Chamber  $chamber
     * @return \Illuminate\Http\Response
     */
    public function show(Chamber $chamber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chamber  $chamber
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamber $chamber)
    {
        return response()->json(['row_data' => $chamber],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chamber  $chamber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chamber $chamber_id)
    {
        $this->validate($request,[
            'hospital_id'   => 'required',
            'doctor_id'     => 'required',
            'mobile'        => 'required',
            'time'          => 'required',
            'visitfees_one' => 'required',
            'visitfees_two' => 'required',
            'address'       => 'required',
        ]);
        
        try{
            $chamber    = Chamber::findOrFail($request->old_id);
            $chamber->doctor_id         = $request->doctor_id ;
            $chamber->hospital_id       = $request->hospital_id ;
            $chamber->consulting_hrs    = $request->time ;
            $chamber->visitfees_one     = $request->visitfees_one ;
            $chamber->visitfees_two     = $request->visitfees_two ;
            $chamber->mobile            = $request->mobile ;
            $chamber->address           = $request->address ;
            $chamber->update();
    
            Toastr::success('Chamber Successfully Updated');
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
     * @param  \App\Models\Chamber  $chamber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamber $chamber)
    {
        try{
            $chamber->delete();
            Toastr::success('Chamber Successfully Deleted');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Toastr::warning($e->getMessage());
            return redirect()->back();
        }
    
    }
}
