<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Projectcategory;
use Illuminate\Http\Request;
use DataTables;

class ProjectcategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.projectcategory.index');
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
        $projectcategory =new Projectcategory();
        $projectcategory->title =$request->title;
        $projectcategory->save();
        return response()->json($projectcategory, 200);
    }

    public function projectcategorydata()
    {
        $projectcategorys = Projectcategory::all();
        return Datatables::of($projectcategorys)
            ->addColumn('action', function ($projectcategorys) {
                return '<a href="#" type="button" id="editProjectcategoryBtn" data-id="' . $projectcategorys->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainProjectcategory">Edit</a>
                <a href="#" type="button" id="deleteProjectcategoryBtn" data-id="' . $projectcategorys->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projectcategory  $projectcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectcategory = Projectcategory::findOrfail($id);
        return response()->json($projectcategory, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projectcategory  $projectcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projectcategory = Projectcategory::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $projectcategory->title =$request->title;
        $projectcategory->update();
        return response()->json($projectcategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projectcategory  $projectcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectcategory = Projectcategory::findOrfail($id);
        $projectcategory->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $projectcategory = Projectcategory::where('id',$request->projectcategory_id)->first();
        $projectcategory->status=$request->status;
        $projectcategory->update();
        return response()->json($projectcategory, 200);
    }
}
