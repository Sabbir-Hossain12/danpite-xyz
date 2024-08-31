<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blogpage;
use App\Models\FrontBlog;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogComments = DB::table('front_blogs')
                       ->join('users', 'users.id', '=', 'front_blogs.user_id')
                       ->join('blogpages', 'blogpages.id', '=', 'front_blogs.blog_id')
                       ->select('users.name', 'front_blogs.status' , 'front_blogs.comment', 'front_blogs.id', 'front_blogs.created_at', 'blogpages.id as blog_ids')
                       ->where('front_blogs.status', 1)
                       ->orderBy('front_blogs.id','desc')
                       ->get();
        return view('frontend.pages.static_pages.blog', compact('blogComments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function blogComments(Request $request)
    {
        // dd($request->all());
        if( Auth::check() ){
            $frontBlog = new FrontBlog();

            $frontBlog->user_id = Auth::user()->id;
            $frontBlog->blog_id = $request->blog_id;
            $frontBlog->comment = $request->comment;
            $frontBlog->status  = 1;

            $frontBlog->save();

            return response()->json(['status'=> true, 'data' => $frontBlog], 200);
        }
        else{
            return response()->json(['status'=> false]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function blogCommentShow()
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function blogDetails(string $slug)
    {
        $singleBlog = Blogpage::where('slug', $slug)->first();
        return view('frontend.pages.static_pages.singleBlog', compact('singleBlog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
