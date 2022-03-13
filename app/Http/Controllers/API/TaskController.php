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

    public function update($id, Request $request){
        $update = Task::find($id);
        $update->title = $request->title;
        $update->title_description = $request->title_description;
        $update->assign_to = $request->assign_to;
        $update->update();
        return response()->json([
            'status' => 'success',
            'data' => $update
        ]);
    }

    public function edit_id($id){
        $id = Task::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $id
        ]);
    }
    public function count_task(){

        $count = DB::table('tasks')->count();
        return response()->json([
            'status' => 'success',
            'data' => $count
        ]);
    }

    public function getaskinfo(Request $request){
        $getinfo = DB::table('tasks')->whereIn('id', [$request->id])->get();
        return response()->json([
            'status' => 'success',
            'data' => $getinfo
        ]);
    }
}
