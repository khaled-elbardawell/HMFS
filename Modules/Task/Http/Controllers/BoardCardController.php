<?php

namespace Modules\Task\Http\Controllers;
use Illuminate\Routing\Controller;
use Modules\Task\Entities\Board;
use Modules\Task\Entities\BoardCard;
use Modules\Task\Http\Requests\BoardCardRequest;

class BoardCardController extends Controller
{
    public function __construct()
    {
       $this->middleware('can:board_card.create', ['only' => ['create','store']]);
       $this->middleware('can:board_card.edit'  , ['only' => ['edit','update']]);
       $this->middleware('can:board_card.delete', ['only' => ['destroy']]);
    }

    public function store(BoardCardRequest $request)
    {
        try {
            $board_card = BoardCard::create([
                'name' => $request->board_card_name,
                'board_id' => $request->board_id,
                'user_id' => auth()->user()->id,
            ]);
            return redirect(route('task.index',['board_id' => $board_card->board_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('task.index',['board_id' => $request->board_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }

    public function update(BoardCardRequest $request, $id)
    {

        $board_card = BoardCard::whereId($id)->first();
        if (!$board_card){
            abort(404);
        }
        try {
            $board_card->update([
                'name' => $request->board_card_name,
                'board_id' => $request->board_id,
                'user_id' => auth()->user()->id,
            ]);

            return redirect(route('task.index',['board_id' => $board_card->board_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Updated successfully']);
        }catch (\Exception $e){
            return redirect(route('task.index',['board_id' => $request->board_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }

    public function delete($id)
    {
        $board_card = BoardCard::whereId($id)->first();
        $board_id = $board_card->board_id;
        try {
            $board_card->delete();
           return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'success', 'message' => 'Deleted successfully']);
       }catch (\Exception $e){
           return redirect(route('task.index',['board_id' => $board_id]))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
       }
    }

}
