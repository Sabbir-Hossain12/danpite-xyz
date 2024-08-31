<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Administrator;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use DataTables;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();
        return view('backend.content.administrator.administrator',['roles'=>$roles]);
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
        $administrator=new Administrator();
        $administrator->name=$request->name;
        $administrator->email=$request->email;
        $administrator->password=Hash::make($request->password);
        $administrator->phone=$request->phone;
        $administrator->role_id=$request->role;
        $administrator->role=Role::where('id',$request->role)->first()->role_name;
        $administrator->save();
        return response()->json($administrator, 200);
    }

    public function administratordata()
    {
        $administrators = Administrator::all();
        return Datatables::of($administrators)
            ->addColumn('idinfo', function ($administrators) {
                return '#'.$administrators->id;
            })
            ->addColumn('action', function ($administrators) {
                return '<button type="button" id="editAdministrator" data-id="'.$administrators->id.'" class="btn btn-outline-secondary btn-rounded btn-icon" data-toggle="modal" data-target="#AdministratorModel">
                <i class="typcn typcn-edit  text-primary"></i>
                </button>';
            })

            ->make(true);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function statusupdate(Request $request)
    {
        $administrator = Administrator::where('id',$request->administrator_id)->first();
        $administrator->status=$request->status;
        $administrator->update();
        return response()->json($administrator, 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $administrator=Administrator::findOrfail($id);
        return response()->json($administrator, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $administrator=Administrator::findOrfail($id);
        $administrator->name=$request->name;
        $administrator->email=$request->email;
        if($request->password){
            $administrator->password=Hash::make($request->password);
        }
        $administrator->phone=$request->phone;
        $administrator->role_id=$request->role;
        $administrator->role=Role::where('id',$request->role)->first()->role_name;
        $administrator->update();
        return response()->json($administrator, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrator $administrator)
    {
        //
    }
}
