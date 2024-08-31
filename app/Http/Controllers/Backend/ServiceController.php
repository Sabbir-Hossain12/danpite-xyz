<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.service.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $service                  =  new Service();

        $service->title           = $request->title;
        $service->slug            = Str::slug($request->title);
        $service->category_id     = $request->category_id;
        $service->description     = $request->description;
        $service->status          = 1;

        if( $request->file('main_img') ){
            $main_img = $request->file('main_img');

            $imageName          = microtime('.') . '.' . $main_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $main_img->move($imagePath, $imageName);

            $service->main_img   = $imagePath . $imageName;
        }

        if( $request->file('thumbnail') ){
            $thumbnail = $request->file('thumbnail');

            $imageName          = microtime('.') . '.' . $thumbnail->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $thumbnail->move($imagePath, $imageName);

            $service->thumbnail   = $imagePath . $imageName;
        }

        if( $request->file('icon_img') ){
            $icon_img = $request->file('icon_img');

            $imageName          = microtime('.') . '.' . $icon_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $icon_img->move($imagePath, $imageName);

            $service->icon_img   = $imagePath . $imageName;
        }

        $service->save();

        return response()->json($service, 200);
    }

    public function getData()
    {
        $services = Service::all();
        return Datatables::of($services)
            ->addColumn('category_id', function ($service) {
                return '<span class="badge bg-secondary text-white cursor-pointer">'. $service->category_id .'</span>';
            })
            ->addColumn('main_img', function ($service) {
                return '<img src="'. asset($service->main_img) .'" alt="" style="width: 65px;">';
            })
            ->addColumn('thumbnail', function ($service) {
                return '<img src="'. asset($service->thumbnail) .'" alt="" style="width: 65px;">';
            })
            ->addColumn('icon_img', function ($service) {
                return '<img src="'. asset($service->icon_img) .'" alt="" style="width: 65px;">';
            })
            ->addColumn('status', function ($service) {
                if ($service->status == 1) {
                    return '<span class="badge bg-secondary text-white cursor-pointer" id="status_btn" data-id="'.$service->id.'" data-status="'.$service->status.'">Active</span>';
                } else {
                    return '<span class="badge bg-danger cursor-pointer" id="status_btn" data-id="'.$service->id.'" data-status="'.$service->status.'">Deactive</span>';
                }
            })
            ->addColumn('action', function ($service) {
                return '<a href="#" type="button" id="editButton" data-id="' . $service->id . '" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_modal">Edit</a>
                <a href="#" type="button" id="delete_btn" data-id="' . $service->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->rawColumns(['category_id', 'main_img', 'thumbnail', 'icon_img', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $projectcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrfail($id);
        return response()->json($service, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }

        $service->title           = $request->title;
        $service->slug            = Str::slug($request->title);
        $service->description     = $request->description;
        $service->category_id     = $request->category_id;

        if( $request->file('main_img') ){
            $main_img = $request->file('main_img');

            if( !is_null($service->main_img) && file_exists($service->main_img) ){
                unlink($service->main_img);
            }

            $imageName          = microtime('.') . '.' . $main_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $main_img->move($imagePath, $imageName);

            $service->main_img   = $imagePath . $imageName;
        }

        if( $request->file('thumbnail') ){
            $thumbnail = $request->file('thumbnail');

            if( !is_null($service->thumbnail) && file_exists($service->thumbnail) ){
                unlink($service->thumbnail);
            }

            $imageName          = microtime('.') . '.' . $thumbnail->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $thumbnail->move($imagePath, $imageName);

            $service->thumbnail   = $imagePath . $imageName;
        }

        if( $request->file('icon_img') ){
            $icon_img = $request->file('icon_img');

            if( !is_null($service->icon_img) && file_exists($service->icon_img) ){
                unlink($service->icon_img);
            }

            $imageName          = microtime('.') . '.' . $icon_img->getClientOriginalExtension();
            $imagePath          = 'public/backend/image/service/';
            $icon_img->move($imagePath, $imageName);

            $service->icon_img   = $imagePath . $imageName;
        }

        $service->update();

        return response()->json($service, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projectcategory  $projectcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrfail($id);

        if ( !is_null($service->main_img) ) {
            if (file_exists($service->main_img)) {
                unlink($service->main_img);
            }
        }

        if ( !is_null($service->thumbnail) ) {
            if (file_exists($service->thumbnail)) {
                unlink($service->thumbnail);
            }
        }

        if ( !is_null($service->icon_img) ) {
            if (file_exists($service->icon_img)) {
                unlink($service->icon_img);
            }
        }

        $service->delete();
        return response()->json('success', 200);
    }

    public function statusUpdate(Request $request)
    {
        $service = Service::where('id',$request->id)->first();
        if( $request->status == 1 ){
            $service->status  =  0;
        }
        else if ( $request->status == 0 ){
            $service->status  =  1;
        }

        $service->update();
        return response()->json($service, 200);
    }
}
