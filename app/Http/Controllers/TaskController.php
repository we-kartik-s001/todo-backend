<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return Task::orderBy('created_at','desc')->get();
    }

    public function createTask(Request $request){
        $request->validate([
            'title' => 'required|string|max:50',
            'status'=>  'required|integer'
        ]);

        if(!$request->has('title')){
            return response([
                'status' => 0
            ]);
        }

        $task = new Task();
        $task->task = $request->title;
        $task->status = $request->status;
        $task->created_at = Carbon::now();
        $task->updated_at = Carbon::now();

        $task->save();

        return response([
            'status' => 1,
            'task' => Task::orderBy('created_at','desc')->get()
        ]);
    }

    public function updateTask(Request $request, $id){
        $request->validate([
            'task' => 'required|string|max:50',
        ]);

        if(!$id){
            return response([
                'status' => 0
            ]);
        }
        Task::find($id)->update([
            'task' => $request->input('task')
        ]);
        return response([
            'status' => 1
        ]);
    }

    public function deleteTask($id){
        if(!$id){
            return response([
                'status' => 0
            ]);
        }
        Task::find($id)->delete();
        return response([
            'status' => 1
        ]);
    }

    public function changeTaskStatus(Request $request,$id){
        if(!$request->has('status')){
            return response([
                'status' => 0
            ]);
        }
        Task::find($id)->update([
            'status' => $request->input('status')
        ]);
        return response([
            'status' => 1
        ]);
    }
}
