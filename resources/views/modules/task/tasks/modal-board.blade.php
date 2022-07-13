@php
    $name = '';
    $action = route('board_card.store');
@endphp
@isset($board_card)
    @php
        $name = $board_card->name;
        $action = route('board_card.update',$board_card->id);
    @endphp
@endisset
<div class="modal fade" id="{{$board_card_modal??'board_card'}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{$action}}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Board Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="board_id" value="{{$board->id}}">
                    <div class="form-group">
                        <label for="board_card_name-input" class="text-right">{{__('task::admin.Name')}}</label>
                        <div>
                            <input name="board_card_name" class="form-control" type="text" placeholder="{{__('task::admin.Name')}}" id="board_card_name-input" value="{{$name}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
