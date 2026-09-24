<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event=Event::with('members')->get();
        return response()->json([
            'status'=>'success',
            'message'=>"events retrieved successfully",
            'data'=>$event
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
        $event=Event::create($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"event created successfully",
            'data'=>$event
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event,$id)
    {
        $event=Event::findOrFail($id);
        $event->load('members');
        return response()->json([
            'status'=>'success',
            'message'=>"event retrieved successfully",
            'data'=>$event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event,$id)
    {
        $event=Event::findOrFail($id);
        $event->update($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"event updated successfully",
            'data'=>$event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event,$id)
    {
        $event=Event::findOrFail($id);
        $event->members()->detach();
        $event->delete();
        return response()->json([
            'status'=>'success',
            'message'=>"event deleted successfully",
            'data'=>$event
        ]);
    }

    public function addMember(Request $request,$event_id,$member_id){
        $event=Event::findOrFail($event_id);
    
        $event->members()->attach($member_id);
        return response()->json([
            'status'=>'success',
            'message'=>"members added to event successfully",
            'data'=>$event->load('members')
        ]);

    }
    public function updateMember(Request $request,$event_id,$member_id){
        $event=Event::findOrFail($event_id);
        $event->members()->updateExistingPivot($member_id,[
            'attendance'=>$request->status
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>"member updated successfully",
            'data'=>$event->load('members')
        ]);
    }
    public function removeMember(Request $request,$event_id,$member_id){
        $event=Event::findOrFail($event_id);
        $event->members()->detach($member_id);
        return response()->json([
            'status'=>'success',
            'message'=>"member removed from event successfully",
            'data'=>$event->load('members')
        ]);
    }
        
    
}
