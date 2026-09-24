<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task=Task::with('member')->get();
        return response()->json([
            'status'=>'success',
            'message'=>"tasks retrieved successfully",
            'data'=>$task
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
        $task=Task::create($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"task created successfully",
            'data'=>$task
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task,$id)
    {
        $task=Task::findOrFail($id);
        $task->load('member');
        return response()->json([
            'status'=>'success',
            'message'=>"task retrieved successfully",
            'data'=>$task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task,$id)
    {
        $task=Task::findOrFail($id);

        $task->update($request->all());
        return response()->json([
            'status'=>'success',
            'message'=>"task updated successfully",
            'data'=>$task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task,$id)
    {
        $task=Task::findOrFail($id);
        $task->delete();
        return response()->json([
            'status'=>'success',
            'message'=>"task deleted successfully",
            'data'=>$task
        ]);
    }

    public function updateStatus(Request $request,Task $task){
        $task->update(['status'=>$request->status,
        'member_id'=>$request->member_id]);
        return response()->json([
            'status'=>'success',
            'message'=>"task status updated successfully",
            'data'=>$task
        ]);

    }
}
