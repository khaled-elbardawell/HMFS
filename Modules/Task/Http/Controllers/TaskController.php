<?php

namespace Modules\Task\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Role\Entities\Permission;
use Modules\Task\Emails\TaskMail;
use Modules\Task\Entities\Board;
use Modules\Task\Entities\BoardCard;
use Modules\Task\Entities\Comment;
use Modules\Task\Entities\Task;
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

        $board = Board::where('id',request()->board_id)->with([
            'boardCards.tasks.comments',
            'boardCards.tasks.user_t',
            'boardCards.tasks.user_f',
        ])->first();

        if (!$board){
            abort(404);
        }

        return view('task::tasks/index',compact('board'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $users = User::all();
        $board_card = BoardCard::where('id',request()->board_card_id)->first();
        return view('task::tasks/create',compact('users','board_card'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(TaskRequest $request)
    {
        $board_card = BoardCard::where('id',$request->board_card_id)->first();
        $board_id = $board_card->board_id;

//        try {
            $task = Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'user_from' => auth()->user()->id,
                'user_to' => $request->user_to,
                'board_card_id' => $request->board_card_id,
                'status' => $request->status,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
            ]);

            $comment = Comment::create([
                'name' => $request->comment,
                'user_id' => auth()->user()->id,
                'task_id' => $task->id,
            ]);

            Mail::to($request->user())->send(new TaskMail($task));

            return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
//        }catch (\Exception $e){
//            // $users = User::all();
//            // return view('task::tasks/create',compact('task','users','board_card'));
//            return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
//        }
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
        $board_card = BoardCard::where('id',request()->board_card_id)->first();
        return view('task::tasks/edit',compact('task','users','board_card'));
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
        $board_card = BoardCard::where('id',$request->board_card_id)->first();
        $board_id = $board_card->board_id;

        if (!$task){
            abort(404);
        }

        try {
            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'user_from' => auth()->user()->id,
                'user_to' => $request->user_to,
                'board_card_id' => $request->board_card_id,
                'status' => $request->status,
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
            ]);

            if(!$request->comment==null){
                $comment = Comment::create([
                    'name' => $request->comment,
                    'user_id' => auth()->user()->id,
                    'task_id' => $task->id,
                ]);
            }

            Mail::to($request->user())->send(new TaskMail($task));

            return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            // $users = User::all();
            // return view('task::tasks/edit',compact('task','users','board_card'));
            return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $task = Task::whereId($id)->first();
        $board_card = BoardCard::whereId($task->board_card_id)->first();
        $board_id = $board_card->board_id;
        try {
            $task->delete();
           return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
       }catch (\Exception $e){
           return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
       }
    }


}
