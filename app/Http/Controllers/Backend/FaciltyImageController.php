<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FaciltyImage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaciltyImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= FaciltyImage::first();
        return view('backend.content.facility_image.index',compact('data'));
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
//        dd($request->all());
        $data = FaciltyImage::first();


        if ($data) {
            $data->facility_title = $request->facility_title;
            $data->facilty_btn_text = $request->facilty_btn_text;
            $data->facilty_btn_link = $request->facilty_btn_link;
            

            if ($request->has('facilty_bg_img')) {
                $sideImg = $request->file('facilty_bg_img');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/facility_image/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->facilty_bg_img = $sideImageImgUrl;
            }

            if ($request->has('facilty_side_img1')) {
                $sideImg = $request->file('facilty_side_img1');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/facility_image/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->facilty_side_img1 = $sideImageImgUrl;
            }

            if ($request->has('facilty_side_img2')) {
                $sideImg = $request->file('facilty_side_img2');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/facility_image/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->facilty_side_img2 = $sideImageImgUrl;
            }
            
            


            $data->update();

            return redirect()->back()->with('message', 'FAQ and Consult Images Updated Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FaciltyImage  $faciltyImage
     * @return \Illuminate\Http\Response
     */
    public function show(FaciltyImage $faciltyImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FaciltyImage  $faciltyImage
     * @return \Illuminate\Http\Response
     */
    public function edit(FaciltyImage $faciltyImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FaciltyImage  $faciltyImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaciltyImage $faciltyImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FaciltyImage  $faciltyImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaciltyImage $faciltyImage)
    {
        //
    }
}
