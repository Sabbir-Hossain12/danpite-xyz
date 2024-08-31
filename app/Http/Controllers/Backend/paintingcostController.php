<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Paintingcost;
use App\Models\Paintingtype;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class paintingcostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paintingtypes = Paintingtype::where('status','Active')->get();
        return view('backend.content.paintingcost.index',['paintingtypes'=>$paintingtypes]);
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
        $paintingcost = new Paintingcost();
        $paintingcost->title =$request->title;
        $paintingcost->title_2 =$request->title_2;
        
        $paintingcost->paintingtype_id =$request->paintingtype_id;
        $paintingcost->description =$request->description;
        $paintingcost->longdescription =$request->longdescription;
        $paintingcost->price =$request->price;
        
        if ($request->hasFile('image')) {
            $paintingcostimage = $request->file('image');
            $name = time()."_".$paintingcostimage->getClientOriginalName();
            $uploadPath = ('public/images/paintingcost/');
            $paintingcostimage->move($uploadPath, $name);
            $paintingcostImgUrl = $uploadPath.$name;
            $paintingcost->image = $paintingcostImgUrl;
        }

        $paintingcost->save();
        return response()->json($paintingcost, 200);
    }

    public function paintingcostdata()
    {
        $paintingcosts = Paintingcost::with('paintingtypes')->get();
        return Datatables::of($paintingcosts)->addColumn('action', function ($paintingcosts) {
                return '<a href="#" type="button" id="editPaintingcostBtn" data-id="' . $paintingcosts->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainPaintingcost">Edit</a>
                <a href="#" type="button" id="deletePaintingcostBtn" data-id="' . $paintingcosts->id . '" class="btn btn-danger btn-sm" >Delete</a>';
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
        $paintingcost = Paintingcost::findOrfail($id);
        return response()->json($paintingcost, 200);
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
        $paintingcost = Paintingcost::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $paintingcost->title =$request->title;
        $paintingcost->title_2 =$request->title_2;
        $paintingcost->paintingtype_id =$request->paintingtype_id;
        $paintingcost->description =$request->description;
        $paintingcost->longdescription =$request->longdescription;
        $paintingcost->price =$request->price;
        
        if($request->hasFile('image')) {
           
            $image = $request->file('image');
            $name = time() . "_" . $image->getClientOriginalName();
            $uploadPath = ('public/images/paintingcost/');
            $image->move($uploadPath, $name);
            $imageImgUrl = $uploadPath . $name;
            $paintingcost->image = $imageImgUrl;
        }
        $paintingcost->update();
        return response()->json($paintingcost, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paintingcost = Paintingcost::findOrfail($id);
        $paintingcost->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $paintingcost = Paintingcost::where('id',$request->paintingcost_id)->first();
        $paintingcost->status=$request->status;
        $paintingcost->update();
        return response()->json($paintingcost, 200);
    }
}
