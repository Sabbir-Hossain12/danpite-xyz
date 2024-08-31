<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use DataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.blog.index');
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
        $blog                   =    new Blog();
        $blog->title            =    $request->title;
        $blog->description      =    $request->description;
        $blog->status           =    1;

        if( $request->hasFile('image') ){

            $blogimage = $request->file('image');
            $name                     = time() . "_" . $blogimage->getClientOriginalName();
            $uploadPath               = ('public/images/blog/');
            $blogimage->move($uploadPath, $name);
            $blogimageImgUrl          = $uploadPath . $name;
            $blog->image            = $blogimageImgUrl;
        }

        $blog->save();
        return response()->json($blog, 200);
    }

    public function blogsData()
    {
        $blogs = Blog::all();
        return Datatables::of($blogs)
            ->addColumn('action', function ($blog) {
                return '<a href="#" type="button" id="editBlogBtn" data-id="' . $blog->id . '"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainSlider">Edit</a>
                <a href="#" type="button" id="deleteBlogBtn" data-id="' . $blog->id . '" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrfail($id);
        return response()->json($blog, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrfail($id);
        if(empty($request->title)){
            return response()->json('error', 200);
        }

        $blog->title           =    $request->title;
        $blog->description     =    $request->description;

        if( $request->hasFile('image') ){

            if ( !is_null($blog->image) && file_exists($blog->image))  {
                unlink($blog->image); // Delete the existing category_img
            }

            $blogimage = $request->file('image');
            $name                     = time() . "_" . $blogimage->getClientOriginalName();
            $uploadPath               = ('public/images/blog/');
            $blogimage->move($uploadPath, $name);
            $blogimageImgUrl          = $uploadPath . $name;
            $blog->image            = $blogimageImgUrl;
        }

        $blog->save();
        return response()->json($blog, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrfail($id);
        $blog->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $blog->status = $status;
        $blog->save();
        return response()->json(["blog" => $blog, "status" => $status], 200);
    }
}
