<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Client;
use Illuminate\Http\Request;
use DataTables;

class ClientController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.client.index');
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
        $client =new Client();
        $client->title =$request->title;
        $clientimage = $request->file('image');
        $name = time() . "_" . $clientimage->getClientOriginalName();
        $uploadPath = ('public/images/client/');
        $clientimage->move($uploadPath, $name);
        $clientimageImgUrl = $uploadPath . $name;
        $client->image = $clientimageImgUrl;
        $client->save();
        return response()->json($client, 200);
    }

    public function clientdata()
    {
        $clients = Client::all();
        return Datatables::of($clients)
            ->addColumn('action', function ($clients) {
                return '<a href="#" type="button" id="editClientBtn" data-id="' . $clients->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainClient">Edit</a>
                <a href="#" type="button" id="deleteClientBtn" data-id="' . $clients->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrfail($id);
        return response()->json($client, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $client->title =$request->title;
        if($request->image){
            unlink($client->image);
            $image = $request->file('image');
            $name = time() . "_" . $image->getClientOriginalName();
            $uploadPath = ('public/images/client/');
            $image->move($uploadPath, $name);
            $imageImgUrl = $uploadPath . $name;
            $client->image = $imageImgUrl;
        }
        $client->update();
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrfail($id);
        $client->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $client = Client::where('id',$request->client_id)->first();
        $client->status=$request->status;
        $client->update();
        return response()->json($client, 200);
    }
}
