<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Faq;
use Illuminate\Http\Request;
use DataTables;

class FaqController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.faq.index');
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
        $faq =new Faq();
        $faq->title =$request->title;
        $faq->description =$request->description;
        $faq->save();
        return response()->json($faq, 200);
    }

    public function faqdata()
    {
        $faqs = Faq::all();
        return Datatables::of($faqs)
            ->addColumn('action', function ($faqs) {
                return '<a href="#" type="button" id="editFaqBtn" data-id="' . $faqs->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainFaq">Edit</a>
                <a href="#" type="button" id="deleteFaqBtn" data-id="' . $faqs->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrfail($id);
        return response()->json($faq, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }
        $faq->title =$request->title;
        $faq->description =$request->description;
        $faq->update();
        return response()->json($faq, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrfail($id);
        $faq->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $faq = Faq::where('id',$request->faq_id)->first();
        $faq->status=$request->status;
        $faq->update();
        return response()->json($faq, 200);
    }
}
