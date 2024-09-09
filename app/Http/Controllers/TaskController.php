<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return 'Testing';
    }

    public function createTask(Request $request){
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:100',
//            'status'=>'required'
        ]);

        $task = new Task();
        $task->task = $request->title;
        $task->description = $request->description;
        $task->status = 1;
        $task->created_at = Carbon::now();
        $task->updated_at = Carbon::now();

        $task->save();

        return response([
            'message' => 'Task Created Successfully',
            'task' => Task::all()
        ]);
    }
}
