<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member=Member::with('events')->get();
        return response()->json([
            'status'=>'success',
            'message'=>"member retrieved successfully",
            'data'=>$member
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
        $member=Member::create($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"member created successfully",
            'data'=>$member
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member,$id)
    {
        $member=Member::findOrFail($id);
        $member->load('events');
        return response()->json([
            'status'=>'success',
            'message'=>"member retrieved successfully",
            'data'=>$member
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member,$id)
    {
        $member=Member::findOrFail($id);
        $member->update($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"member updated successfully",
            'data'=>$member
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member,$id)
    {
        $member=Member::findOrFail($id);
        $member->events()->detach();
        $member->delete();
        return response()->json([
            'status'=>'success',
            'message'=>"member deleted successfully",
            'data'=>$member
        ]);
    }
}
