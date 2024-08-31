<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Workstep;
use Illuminate\Http\Request;
use DataTables;

class WorkstepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.workstep.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->workstep_title)) {
            return response()->json('error', 200);
        }
        $workstep = new Workstep();
        $workstep->workstep_title = $request->workstep_title;
        $workstepimage = $request->file('workstep_image');
        $name = time()."_".$workstepimage->getClientOriginalName();
        $uploadPath = ('public/images/workstep/');
        $workstepimage->move($uploadPath, $name);
        $workstepimageImgUrl = $uploadPath.$name;
        $workstep->workstep_image = $workstepimageImgUrl;
        $workstep->save();
        return response()->json($workstep, 200);
    }

    public function workstepdata()
    {
        $worksteps = Workstep::all();
        return Datatables::of($worksteps)
            ->addColumn('action', function ($worksteps) {
                return '<a href="#" type="button" id="editWorkstepBtn" data-id="'.$worksteps->id.'"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainWorkstep">Edit</a>
                <a href="#" type="button" id="deleteWorkstepBtn" data-id="'.$worksteps->id.'" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workstep  $workstep
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workstep = Workstep::findOrfail($id);
        return response()->json($workstep, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workstep  $workstep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $workstep = Workstep::findOrfail($id);
        if (empty($request->workstep_title)) {
            return response()->json('error', 200);
        }
        $workstep->workstep_title = $request->workstep_title;
        if ($request->workstep_image) {
            if (file_exists($request->workstep_image)) {
                unlink($workstep->workstep_image);
            }
            $workstep_image = $request->file('workstep_image');
            $name = time()."_".$workstep_image->getClientOriginalName();
            $uploadPath = ('public/images/workstep/');
            $workstep_image->move($uploadPath, $name);
            $workstep_imageImgUrl = $uploadPath.$name;
            $workstep->workstep_image = $workstep_imageImgUrl;
        }
        $workstep->update();
        return response()->json($workstep, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workstep  $workstep
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workstep = Workstep::findOrfail($id);
        $workstep->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $workstep = Workstep::where('id', $request->workstep_id)->first();
        $workstep->status = $request->status;
        $workstep->update();
        return response()->json($workstep, 200);
    }
}
