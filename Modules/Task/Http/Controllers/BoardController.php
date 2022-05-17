<?php

namespace Modules\Task\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Board;
use Modules\Task\Http\Requests\BoardRequest;

class BoardController extends Controller
{
    public function store(BoardRequest $request)
    {
        try {
            $board = Board::create([
                'name' => $request->board_name,
                'user_id' => auth()->user()->id,
            ]);
            return redirect(route('task.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('task.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }

    public function update(BoardRequest $request, $id){

        $board = Board::whereId($id)->first();
        if (!$board){
            abort(404);
        }
        try {
            $board->update([
                'name' => $request->board_name,
                'user_id' => auth()->user()->id,
            ]);

            return redirect(route('task.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('task.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }
    public function delete($id){
        try {
            Board::whereId($id)->delete();
           return redirect(route('task.index'))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
       }catch (\Exception $e){
           return redirect(route('task.index'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
       }
    }

}
