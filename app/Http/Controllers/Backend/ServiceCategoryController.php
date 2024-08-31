<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class ServiceCategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.serviceCategory.index');
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
        $serviceCategory          =  new ServiceCategory();

        $serviceCategory->title      = $request->title;
        $serviceCategory->slug       = Str::slug($request->title);
        $serviceCategory->status     = 1;
        $serviceCategory->save();

        return response()->json($serviceCategory, 200);
    }

    public function getData()
    {
        $ServiceCategories = ServiceCategory::all();
        return Datatables::of($ServiceCategories)
            ->addColumn('action', function ($ServiceCategory) {
                return '<a href="#" type="button" id="editButton" data-id="' . $ServiceCategory->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_modal">Edit</a>
                <a href="#" type="button" id="delete_btn" data-id="' . $ServiceCategory->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            // ->rawColumns(['action'])
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
        $serviceCategory = ServiceCategory::findOrfail($id);
        return response()->json($serviceCategory, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCategory  $projectcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serviceCategory = ServiceCategory::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }

        $serviceCategory->title      = $request->title;
        $serviceCategory->slug       = Str::slug($request->title);
        $serviceCategory->status     = 1;

        $serviceCategory->update();

        return response()->json($serviceCategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projectcategory  $projectcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceCategory = ServiceCategory::findOrfail($id);
        $serviceCategory->delete();
        return response()->json('success', 200);
    }

    public function statusUpdate(Request $request)
    {
        $serviceCategory = ServiceCategory::where('id',$request->id)->first();
        if( $request->status == 1 ){
            $serviceCategory->status  =  0;
        }
        else if ( $request->status == 0 ){
            $serviceCategory->status  =  1;
        }

        $serviceCategory->update();
        return response()->json($serviceCategory, 200);
    }
}
