<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){//
    $committee=Committee::with('members')->get();
    return response()->json([
        'status'=>'success',
        'message'=>"committees retrieved successfully",
        'data'=>$committee
    ]);

    }
    

    


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $committee=Committee::create($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"committee created successfully",
            'data'=>$committee
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Committee $committee,$id)
    {
        $committee=Committee::findOrFail($id);
        $committee->load('members');
        return response()->json([
            'status'=>'success',
            'message'=>"committee retrieved successfully",
            'data'=>$committee
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Committee $committee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Committee $committee,$id)
    {
        $committee=Committee::findOrFail($id);
        $committee->update($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"committee updated successfully",
            'data'=>$committee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Committee $committee,$id)
    {
        $committee=Committee::findOrFail($id);
        $committee->members()->update(['committee_id'=>null]);
        $committee->delete();
        return response()->json([
            'status'=>'success',
            'message'=>"committee deleted successfully",
            'data'=>$committee
        ]);
    }
}

