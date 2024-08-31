<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportService;
use Yajra\DataTables\Facades\DataTables;
use Exception;


class SupportServiceController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        return view('backend.pages.supportService.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function SupportService(Request $request)
    {
        // dd($request->all());
        try
        {
            $supportService = new SupportService();

        $supportService->name     =  $request->name;
        $supportService->email    =  $request->email;
        $supportService->phone    =  $request->phone;
        $supportService->status   =  1;

        $supportService->save();

        return response()->json(['message' => 'Thank you for supporting us', 'status' => true], 200);

        }
        catch(Exception $e)
        {
            return response()->json(['message' => $e->getMessage(), 'status' => false], 500);
        }

    }



    public function getData(){
        $supportServices = SupportService::orderBY('id', 'asc')->get();

        return DataTables::of($supportServices)
                ->addIndexColumn()
                ->addColumn('status', function ($supportService) {
                    if ($supportService->status == 1) {
                        return '<span class="badge bg-label-primary cursor-pointer" id="status" data-id="'.$supportService->id.'" data-status="'.$supportService->status.'">Active</span>';
                    } else {
                        return '<span class="badge bg-label-danger cursor-pointer" id="status" data-id="'.$supportService->id.'" data-status="'.$supportService->status.'">Deactive</span>';
                    }
               })
                ->addColumn('action', function ($supportService) {
                    return '
                    <div class="">
                        <button type="button" id="deleteBtn" data-id="' . $supportService->id . '" class="btn_delete">
                            <i class="bx bx-trash"></i>
                        </button>
                    </div>';
                })

            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function adminSupportServiceStatus(Request $request)
    {
        $id = $request->id;
        $Current_status = $request->status;

        if ($Current_status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $page = SupportService::find($id);
        $page->status = $status;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $status, ]);
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
        $supportService = SupportService::find($id);

        $supportService->delete();

        return response()->json(['message' => 'Support Service has been deleted.'], 200);
    }
}
