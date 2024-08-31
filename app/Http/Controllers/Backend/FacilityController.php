<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Facility;
use Illuminate\Http\Request;
use DataTables;

class FacilityController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.facility.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->facility_title)){
            return response()->json('error', 200);
        }
        $facility =new Facility();
        $facility->facility_title =$request->facility_title;
        $facilityimage = $request->file('facility_image');
        $name = time() . "_" . $facilityimage->getClientOriginalName();
        $uploadPath = ('public/images/facility/');
        $facilityimage->move($uploadPath, $name);
        $facilityimageImgUrl = $uploadPath . $name;
        $facility->facility_image = $facilityimageImgUrl;
        $facility->save();
        return response()->json($facility, 200);
    }

    public function facilitydata()
    {
        $facilitys = Facility::all();
        return Datatables::of($facilitys)
            ->addColumn('action', function ($facilitys) {
                return '<a href="#" type="button" id="editFacilityBtn" data-id="' . $facilitys->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainFacility">Edit</a>
                <a href="#" type="button" id="deleteFacilityBtn" data-id="' . $facilitys->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::findOrfail($id);
        return response()->json($facility, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $facility = Facility::findOrfail($id);
        if(empty($request->facility_title)){
            return response()->json('error', 200);
        }
        $facility->facility_title =$request->facility_title;
        if($request->facility_image){
            unlink($facility->facility_image);
            $facility_image = $request->file('facility_image');
            $name = time() . "_" . $facility_image->getClientOriginalName();
            $uploadPath = ('public/images/facility/');
            $facility_image->move($uploadPath, $name);
            $facility_imageImgUrl = $uploadPath . $name;
            $facility->facility_image = $facility_imageImgUrl;
        }
        $facility->update();
        return response()->json($facility, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facility = Facility::findOrfail($id);
        $facility->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $facility = Facility::where('id',$request->facility_id)->first();
        $facility->status=$request->status;
        $facility->update();
        return response()->json($facility, 200);
    }
}
