<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    public function store(Request $request)
    {
        $postArray = $request->all();

        $task = Task::create($postArray);

        $success['title'] =  $task->title;
        $success['title_description'] = $task->title_description;
        $success['user_id'] = $task->user_id;
        $success['assign_by'] = $task->assign_by;
        $success['assign_to'] = $task->assign_to;

        // send output data to vue3
        return response()->json([
            'status' => 'success',
            'data' => $success,
        ]);
    }

    public function list_task(){

        $count = DB::table('tasks')->distinct()->get();
        return response()->json([
            'status' => 'success',
            'data' => $count
        ]);
    }

    public function delete($id){
        $delete = Task::find($id);
        $delete->delete();
        return response()->json([
            'status' => 'success',
            'data' => $delete
            ]);
    }
}