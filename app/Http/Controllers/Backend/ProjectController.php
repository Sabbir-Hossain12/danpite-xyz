<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Projectcategory;
use DataTables;

class ProjectController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Projectcategory::where('status','Active')->get();
        return view('backend.content.project.index',['categories'=>$categories]);
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
        $project =new Project();
        $project->title =$request->title;
        $project->category_id =$request->category_id;
        $project->description =$request->description;
        $projectimage = $request->file('image');
        $name = time() . "_" . $projectimage->getClientOriginalName();
        $uploadPath = ('public/images/project/');
        $projectimage->move($uploadPath, $name);
        $projectimageImgUrl = $uploadPath . $name;
        $project->image = $projectimageImgUrl;
        $project->save();
        return response()->json($project, 200);
    }

    public function projectdata()
    {
        $projects = Project::with('projectcategories')->get();
        return Datatables::of($projects)
            ->addColumn('action', function ($projects) {
                return '<a href="#" type="button" id="editProjectBtn" data-id="' . $projects->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainProject">Edit</a>
                <a href="#" type="button" id="deleteProjectBtn" data-id="' . $projects->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrfail($id);
        return response()->json($project, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $project->title =$request->title;
        $project->category_id =$request->category_id;
        $project->description =$request->description;
        if($request->image){
            unlink($project->image);
            $image = $request->file('image');
            $name = time() . "_" . $image->getClientOriginalName();
            $uploadPath = ('public/images/project/');
            $image->move($uploadPath, $name);
            $imageImgUrl = $uploadPath . $name;
            $project->image = $imageImgUrl;
        }
        $project->update();
        return response()->json($project, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrfail($id);
        $project->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $project = Project::where('id',$request->project_id)->first();
        $project->status=$request->status;
        $project->update();
        return response()->json($project, 200);
    }
}
