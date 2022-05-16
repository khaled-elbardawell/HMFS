<?php

namespace Modules\Task\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Entities\Permission;
use Modules\Task\Entities\Board;
use Modules\Task\Entities\Comment;
use Modules\Task\Entities\Task;
use Modules\Task\Http\Requests\BoardRequest;
use Modules\Task\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:task.index' , ['only' => ['index']]);
        $this->middleware('can:task.create', ['only' => ['create','store']]);
        $this->middleware('can:task.edit'  , ['only' => ['edit','update']]);
        $this->middleware('can:task.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $boards = Board::with(['tasks.comments','tasks.user_t','tasks.user_f'])->page();
        $start_counter = Task::getStartCounter();
        return view('task::index',compact('boards','start_counter'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $permissions = Permission::all();
        $users = User::all();
        $post_type = request()->board_id;
        return view('task::create',compact('permissions','users','post_type'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TaskRequest $request)
    {
        try {
            $task = Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_from' => auth()->user()->id,
                'user_to' => $request->user_to,
                'status' => $request->status,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'board_id' => $request->board_id,
            ]);

            $comment = Comment::create([
                'name' => $request->comment,
                'user_id' => auth()->user()->id,
                'task_id' => $task->id,
            ]);
            return redirect(route('task.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('task.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('task::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $task = Task::where('id',$id)->with(['comments.user','user_t','user_f'])->first();
        $users = User::all();
        $post_type = request()->board_id;
        return view('task::edit',compact('task','users','post_type'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::whereId($id)->first();

        if (!$task){
            abort(404);
        }

        try {
            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'user_from' => auth()->user()->id,
                'user_to' => $request->user_to,
                'status' => $request->status,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'board_id' => $request->board_id,
            ]);

            if(!$request->comment==null){
                $comment = Comment::create([
                    'name' => $request->comment,
                    'user_id' => auth()->user()->id,
                    'task_id' => $task->id,
                ]);
            }

            return redirect(route('task.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('task.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            Task::whereId($id)->delete();
           return redirect(route('task.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
       }catch (\Exception $e){
           return redirect(route('task.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
       }
    }

}
