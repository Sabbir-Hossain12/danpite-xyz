<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('backend.content.banner.index');
    }

    public function bannerdata()
    {
        $banners = Banner::all();

        return datatables()->of($banners)
            ->addColumn('action', function ($banner) {
                return '<a href="#" type="button" id="editBannerBtn" data-id="'.$banner->id.'"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editBanner">Edit</a>
                <a href="#" type="button" id="deleteBannerBtn" data-id="'.$banner->id.'" data-status="'.$banner->status.'" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
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
        $banner = new Banner();
        $banner->banner_title = $request->banner_title;
        $banner->banner_btn_text = $request->banner_btn_text;
        $banner->banner_btn_link = $request->banner_btn_link;

        if ($request->hasFile('banner_image')) {
            $bannerimage = $request->file('banner_image');
            $name = time()."_".$bannerimage->getClientOriginalName();
            $uploadPath = ('public/images/banner/');
            $bannerimage->move($uploadPath, $name);
            $bannerimageImgUrl = $uploadPath.$name;
            $banner->banner_image = $bannerimageImgUrl;
        }

        $banner->save();
        return response()->json($banner, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return response()->json($banner, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        
        $banner->banner_title = $request->banner_title;
        $banner->banner_btn_text = $request->banner_btn_text;
        $banner->banner_btn_link = $request->banner_btn_link;
        
        if ($request->hasFile('banner_image')) {
            
            $bannerimage = $request->file('banner_image');
            $name = time()."_".$bannerimage->getClientOriginalName();
            $uploadPath = ('public/images/banner/');
            $bannerimage->move($uploadPath, $name);
            $bannerimageImgUrl = $uploadPath.$name;
            $banner->banner_image = $bannerimageImgUrl;
        }
        $banner->update();
        return response()->json($banner, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        
        if ($banner->banner_image) {
            
            if (file_exists($banner->banner_image))
            {
                unlink($banner->banner_image);
            }
            
        }
        
        return response()->json($banner, 200);
    }

    public function statusupdate(Request $request)
    {
        $banner= Banner::where('id',$request->banner_id)->first();

        $banner->status= $request->status;
        $banner->update();
        return response()->json($banner, 200);
    }
}
