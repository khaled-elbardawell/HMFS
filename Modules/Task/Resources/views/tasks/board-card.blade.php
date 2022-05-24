<div class="col-md-3 {{$post_type}}">
    <div class="bg-light p-4">
        <div class="dropdown d-inline-block float-right mt-n2">
            <a class="nav-link dropdown-toggle arrow-none" id="drop16" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fas fa-ellipsis-v font-18 text-muted"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop16">
                @can('board_card.create')
                    <a class="dropdown-item" href="{{route('task.create',['board_card_id'=>$board_card->id])}}">Create Task</a>
                @endcan
                @can('board_card.edit')
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#{{$board_card_modal??'board_card'}}">Edit Board Card</a>
                @endcan
                @can('board_card.destroy')
                    <form class="dropdown-item" name="delete" method="POST" action="{{route('board_card.destroy',$board_card->id)}}" style="display:inline-block;">
                        @csrf
                        <button class="btn" style="box-shadow: none; padding: 0;">Delete Board Card</button>
                    </form>
                @endcan
            </div>
        </div>
        <h4 class="header-title pb-1 mb-3 mt-0">{{$board_card->name}}</h4>

        <div id="project-list-{{$board_card->id}}" data-board-card="{{$board_card->id}}" class="pb-1">
            @foreach ($board_card->tasks as $task)
                @if ($task->board_card_id == $board_card->id)
                    @include('task::tasks/task-card',['task'=>$task])
                @endif
            @endforeach
        </div><!--end project-list-right-->
        @can('task.create')
            <a href="{{route('task.create',['board_card_id'=>$board_card->id])}}" class="btn btn-block btn-gradient-primary">Add Task</a>
        @endcan
    </div><!--end /div-->
</div><!--end col-->
