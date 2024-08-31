<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Solution;
use Illuminate\Http\Request;
use DataTables;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.solution.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->solution_title)) {
            return response()->json('error', 200);
        }
        $solution = new Solution();
        $solution->solution_title = $request->solution_title;
        $solution->solution_text = $request->solution_text;
        $solution->solution_btn_name = $request->solution_btn_name;
        $solution->solution_btn_link = $request->solution_btn_link;
//        new
        $solution->desc_title = $request->desc_title;
        $solution->desc_text = $request->desc_text;
        $solution->img_position_type = $request->img_position_type;

        if ($request->hasFile('solution_image')) {
            $solutionimage = $request->file('solution_image');
            $name = time()."_".$solutionimage->getClientOriginalName();
            $uploadPath = ('public/images/solution/');
            $solutionimage->move($uploadPath, $name);
            $solutionimageImgUrl = $uploadPath.$name;
            $solution->solution_image = $solutionimageImgUrl;
        }
        if ($request->hasFile('solution_bg_image')) {
            $solutionBgImage = $request->file('solution_bg_image');
            $solutionBgImageName = time()."_".$solutionBgImage->getClientOriginalName();
            $uploadPath = 'public/images/solution/';
            $solutionBgImage->move($uploadPath, $solutionBgImageName);
            $solutionBgImageUrl = $uploadPath.$solutionBgImageName;
            $solution->solution_bg_image = $solutionBgImageUrl;
        }
        
        if ($request->hasFile('bg_img')) {
            $solutionBgImage = $request->file('bg_img');
            $solutionBgImageName = time()."_".$solutionBgImage->getClientOriginalName();
            $uploadPath = 'public/images/solution/';
            $solutionBgImage->move($uploadPath, $solutionBgImageName);
            $solutionBgImageUrl = $uploadPath.$solutionBgImageName;
            $solution->bg_img = $solutionBgImageUrl;
            
        }

        if ($request->hasFile('desc_image')) {
            $solutionBgImage = $request->file('desc_image');
            $solutionBgImageName = time()."_".$solutionBgImage->getClientOriginalName();
            $uploadPath = 'public/images/solution/';
            $solutionBgImage->move($uploadPath, $solutionBgImageName);
            $solutionBgImageUrl = $uploadPath.$solutionBgImageName;
            $solution->desc_image = $solutionBgImageUrl;

        }
        $solution->save();
        return response()->json($solution, 200);
    }

    public function solutiondata()
    {
        $solutions = Solution::all();
        return Datatables::of($solutions)
            ->addColumn('action', function ($solutions) {
                return '<a href="#" type="button" id="editSolutionBtn" data-id="'.$solutions->id.'"   class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmainSolution">Edit</a>
                <a href="#" type="button" id="deleteSolutionBtn" data-id="'.$solutions->id.'" class="btn btn-danger btn-sm" >Delete</a>';
            })
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $solution = Solution::findOrfail($id);
        return response()->json($solution, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $solution = Solution::findOrfail($id);
        if (empty($request->solution_title)) {
            return response()->json('error', 200);
        }
        $solution->solution_title = $request->solution_title;
        $solution->solution_text = $request->solution_text;
        $solution->solution_btn_name = $request->solution_btn_name;
        $solution->solution_btn_link = $request->solution_btn_link;

        $solution->desc_title = $request->desc_title;
        $solution->desc_text = $request->desc_text;
        $solution->img_position_type = $request->img_position_type;
        
        if ($request->solution_image) {
            if (file_exists($request->solution_image)) {
                unlink($solution->solution_image);
            }
            $solution_image = $request->file('solution_image');
            $name = time()."_".$solution_image->getClientOriginalName();
            $uploadPath = ('public/images/solution/');
            $solution_image->move($uploadPath, $name);
            $solution_imageImgUrl = $uploadPath.$name;
            $solution->solution_image = $solution_imageImgUrl;
        }

        if ($request->solution_bg_image) {
//            if (file_exists($request->solution_bg_image)) {
//                unlink($solution->solution_bg_image);
//            }
            $solutionBgImage = $request->file('solution_bg_image');
            $solutionBgImageName = time()."_".$solutionBgImage->getClientOriginalName();
            $uploadPath = 'public/images/solution/';
            $solutionBgImage->move($uploadPath, $solutionBgImageName);
            $solutionBgImageUrl = $uploadPath.$solutionBgImageName;
            $solution->solution_bg_image = $solutionBgImageUrl;
        }

        if ($request->hasFile('bg_img')) {
            $solutionBgImage = $request->file('bg_img');
            $solutionBgImageName = time()."_".$solutionBgImage->getClientOriginalName();
            $uploadPath = 'public/images/solution/';
            $solutionBgImage->move($uploadPath, $solutionBgImageName);
            $solutionBgImageUrl = $uploadPath.$solutionBgImageName;
            $solution->bg_img = $solutionBgImageUrl;

        }

        if ($request->hasFile('desc_image')) {
            
            $solutionBgImage = $request->file('desc_image');
            $solutionBgImageName = time()."_".$solutionBgImage->getClientOriginalName();
            $uploadPath = 'public/images/solution/';
            $solutionBgImage->move($uploadPath, $solutionBgImageName);
            $solutionBgImageUrl = $uploadPath.$solutionBgImageName;
            $solution->desc_image = $solutionBgImageUrl;

        }
        $solution->update();
        return response()->json($solution, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solution = Solution::findOrfail($id);
        $solution->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $solution = Solution::where('id', $request->solution_id)->first();
        $solution->status = $request->status;
        $solution->update();
        return response()->json($solution, 200);
    }
}
