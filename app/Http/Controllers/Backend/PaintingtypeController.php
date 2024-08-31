<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paintingtype;
use Yajra\DataTables\DataTables;

class PaintingtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.paintingtype.index');
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
        $paintingtype =new Paintingtype();
        $paintingtype->title =$request->title;
        $paintingtype->save();
        return response()->json($paintingtype, 200);
    }

    public function paintingtypedata()
    {
        $paintingtypes = Paintingtype::all();
        return Datatables::of($paintingtypes)->addColumn('action', function ($paintingtypes) {
                return '<a href="#" type="button" id="editPaintingtypeBtn" data-id="' . $paintingtypes->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainPaintingtype">Edit</a>
                <a href="#" type="button" id="deletePaintingtypeBtn" data-id="' . $paintingtypes->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paintingtype = Paintingtype::findOrfail($id);
        return response()->json($paintingtype, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paintingtype = Paintingtype::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $paintingtype->title =$request->title;
        $paintingtype->update();
        return response()->json($paintingtype, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paintingtype = Paintingtype::findOrfail($id);
        $paintingtype->delete();
        return response()->json('success', 200);
    }
    public function statusupdate(Request $request)
    {
        $paintingtype = Paintingtype::where('id',$request->paintingtype_id)->first();
        $paintingtype->status=$request->status;
        $paintingtype->update();
        return response()->json($paintingtype, 200);
    }
}
