<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FaqImage;
use Illuminate\Http\Request;

class FaqImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= FaqImage::first();
        return view('backend.content.faq_image.index',compact('data'));
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
        $data = FaqImage::first();


        if ($data) {
            $data->consult_title = $request->consult_title;
           


            if ($request->has('faq_image')) {
                $sideImg = $request->file('faq_image');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/faq/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->faq_image = $sideImageImgUrl;
            }

            if ($request->has('consult_bg_image')) {
                $sideImg = $request->file('consult_bg_image');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/consult/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->consult_bg_image = $sideImageImgUrl;
            }

            if ($request->has('consult_side_image')) {
                $sideImg = $request->file('consult_side_image');
                $name = time()."_".$sideImg->getClientOriginalName();
                $uploadPath = ('public/images/consult/');
                $sideImg->move($uploadPath, $name);
                $sideImageImgUrl = $uploadPath.$name;
                $data->consult_side_image = $sideImageImgUrl;
            }




            $data->update();

            return redirect()->back()->with('message', 'Faq and Consult Images Updated Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FaqImage  $faqImage
     * @return \Illuminate\Http\Response
     */
    public function show(FaqImage $faqImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FaqImage  $faqImage
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqImage $faqImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FaqImage  $faqImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FaqImage $faqImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FaqImage  $faqImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqImage $faqImage)
    {
        //
    }
}
