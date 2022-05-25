<?php

namespace Modules\Task\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Board;
use Modules\Task\Http\Requests\BoardRequest;
use Modules\Task\Http\Requests\TaskRequest;

class BoardController extends Controller
{
    public function __construct()
    {
       $this->middleware('can:board.index' , ['only' => ['index']]);
       $this->middleware('can:board.create', ['only' => ['create','store']]);
       $this->middleware('can:board.edit'  , ['only' => ['edit','update']]);
       $this->middleware('can:board.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $boards = Board::select('id','name')->page();
        $start_counter = Board::getStartCounter();
        return view('task::board/index',compact('boards','start_counter'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('task::board/create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BoardRequest $request)
    {
//        try {
            $board = Board::create([
                'name' => $request->name,
                'organization_id' => $request->org_id??null,
                'user_id' => auth()->user()->id,
            ]);

            return redirect(route('board.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
//        }catch (\Exception $e){
//            return redirect(route('board.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
//        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        redirect(route('task.index'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $board = Board::where('id',$id)->with(['boardCards.tasks.comments'])->first();
        return view('task::board/edit',compact('board'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(boardRequest $request, $id)
    {
        $board = Board::whereId($id)->first();

        if (!$board){
            abort(404);
        }

        try {
            $board->update([
                'name' => $request->name,
                'organization_id' => $request->org_id,
                'user_id' => auth()->user()->id,
            ]);

            return redirect(route('board.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('board.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
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
            Board::whereId($id)->delete();
           return redirect(route('board.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
       }catch (\Exception $e){
           return redirect(route('board.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
       }
    }

}
