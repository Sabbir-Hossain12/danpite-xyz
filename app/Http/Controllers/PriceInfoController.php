<?php

namespace App\Http\Controllers;

use App\Models\PriceInfo;
use Illuminate\Http\Request;

class PriceInfoController extends Controller
{
    public function index()
    {
        $data = PriceInfo::first();
        
            return view('backend.content.pricing_info.index',compact('data'));
        
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
        $data = PriceInfo::first();


        if ($data) {
            $data->banner_title = $request->banner_title;
            $data->pricing_info_title = $request->pricing_info_title;
            $data->pricing_info_description = $request->pricing_info_description;

       


            if ($request->has('pricing_info_img')) {

                $sideImg = $request->file('pricing_info_img');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/pricing/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->pricing_info_img = $sideImageImgUrl;
            }


            $data->update();

            return redirect()->back()->with('message', 'Price-Info Updated Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }

    public function aboutData()
    {
        $data = AboutUs::first();


        return response()->json(['data' => $data], 200);
    }
    
}
