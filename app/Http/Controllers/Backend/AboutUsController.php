<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $data = AboutUs::first();
        if ($data) {
            return view('backend.content.about-us.index',compact('data'));
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
//        dd($request->all());
        $data = AboutUs::first();
        

        if ($data) {
            $data->aboutUs_title1 = $request->aboutUs_title1;
            $data->aboutUs_title2 = $request->aboutUs_title2;
            $data->aboutUs_desc = $request->aboutUs_desc;

            $data->aboutUs_projectCompleted_title = $request->aboutUs_projectCompleted_title;
            $data->aboutUs_projectCompleted_count = $request->aboutUs_projectCompleted_count;

            $data->aboutUs_happyClients_title = $request->aboutUs_happyClients_title;
            $data->aboutUs_happyClients_count = $request->aboutUs_happyClients_count;

            $data->aboutUs_teamMembers_title = $request->aboutUs_teamMembers_title;
            $data->aboutUs_teamMembers_count = $request->aboutUs_teamMembers_count;

            $data->aboutUs_yearsService_title = $request->aboutUs_yearsService_title;
            $data->aboutUs_yearsService_count = $request->aboutUs_yearsService_count;
            

            if ($request->has('aboutUs_sideImg')) {

                $sideImg = $request->file('aboutUs_sideImg');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/about/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->aboutUs_sideImg = $sideImageImgUrl;
            }

            if ($request->has('aboutUs_projectCompleted_img')) {
                $projectCompletedImg = $request->file('aboutUs_projectCompleted_img');
                $name = time()."_".$projectCompletedImg->getClientOriginalName();
                $uploadPath = ('public/images/about/');
                $projectCompletedImg->move($uploadPath, $name);
                $projectCompletedImageImgUrl = $uploadPath.$name;
                $data->aboutUs_projectCompleted_img = $projectCompletedImageImgUrl;
            }

            if ($request->has('aboutUs_happyClients_img')) {
                $happyClientImg = $request->file('aboutUs_happyClients_img');
                $name = time()."_".$happyClientImg->getClientOriginalName();
                $uploadPath = ('public/images/about/');
                $happyClientImg->move($uploadPath, $name);
                $projectCompletedImageImgUrl = $uploadPath.$name;
                $data->aboutUs_happyClients_img = $projectCompletedImageImgUrl;
            }

            if ($request->has('aboutUs_teamMembers_img')) {

                $projectCompletedImg = $request->file('aboutUs_teamMembers_img');
                $name = time()."_".$projectCompletedImg->getClientOriginalName();
                $uploadPath = ('public/images/about/');
                $projectCompletedImg->move($uploadPath, $name);
                $projectCompletedImageImgUrl = $uploadPath.$name;
                $data->aboutUs_teamMembers_img = $projectCompletedImageImgUrl;
            }


            if ($request->has('aboutUs_yearsService_img')) {

                $projectCompletedImg = $request->file('aboutUs_yearsService_img');
                $name = time()."_".$projectCompletedImg->getClientOriginalName();
                $uploadPath = ('public/images/about/');
                $projectCompletedImg->move($uploadPath, $name);
                $projectCompletedImageImgUrl = $uploadPath.$name;
                $data->aboutUs_yearsService_img = $projectCompletedImageImgUrl;
            }


            $data->update();
            
            return redirect()->back()->with('message', 'About Us Updated Successfully');
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
