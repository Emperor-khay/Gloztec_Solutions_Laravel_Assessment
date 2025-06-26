<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;


// ============================================================
// ============================================================

// Fixed BuggyTaskController fully functional for API

// ===========================================================
// ===========================================================


class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();

        if($tasks->count < 1){
            return response()->json([
                'message' => 'No Tasks Available'
            ], 201);
        }
        return response()->json([
            'status' => 'success',
            'data' => TaskResource::collection($tasks)
        ], 201);
    }

    public function show($id){
        $task = Task::find($id);

        if(!$task){
            return response()->json([
                'status' => 'error',
                'message' => 'Task Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => new TaskResource($task)
        ], 201);
    }

    public function create(StoreTaskRequest $request) {

        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = 'pending';
        $task->due_date = $request->due;
        $task->save();

        return response()->json([
            'status' => 'success',
            'data' => new TaskResource($task)
        ], 201);
    }

    public function update(StoreTaskRequest $request, $id) {

        $task = Task::find($id);

        if(!$task){
            return response()->json([
                'status' => 'error',
                'message' => 'Task Not Found!'
            ], 404);
        }

        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due;
        $task->save();

        return response()->json([
            'status' => 'success',
            'data' => new TaskResource($task)
        ], 201);
    }

    public function delete($id){
        $task = Task::find($id);

        if(!$task){
            return response()->json([
                'status' => 'error',
                'message' => 'Task Not Found!'
            ], 404);
        }

        $task->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Task Deleted Successfully!',
        ], 201);
    }

    // Mark Task As Done
    public function done($id) {
        $task = Task::find($id);

        if(!$task){
            return response()->json([
                'status' => 'error',
                'message' => 'Task Not Found!'
            ], 404);
        }

        $task->status = 'completed';
        $task->save();

        return response()->json([
            'status' => 'success',
            'data' => new TaskResource($task)
        ]);
    }
}
