<div class="col-md-3 {{$post_type}}">
    <div class="bg-light p-4">
        <div class="dropdown d-inline-block float-right mt-n2">
            <a class="nav-link dropdown-toggle arrow-none" id="drop16" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fas fa-ellipsis-v font-18 text-muted"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop16">
                <a class="dropdown-item" href="{{route('task.create',['post_type'=>$post_type])}}">Create Task</a>
                <a class="dropdown-item" href="#">Open Task</a>
                <a class="dropdown-item" href="#">Tasks Details</a>
            </div>
        </div>
        <h4 class="header-title pb-1 mb-3 mt-0">{{$board->name}}</h4>

        <div id="project-list-right" class="pb-1">
            @foreach ($board->tasks as $task)
                @if ($task->board_id == $board->id)
                    @include('task::board-card',['task'=>$task])
                @endif
            @endforeach
        </div><!--end project-list-right-->
        @can('task.create')
            <a href="{{route('task.create',['board_id'=>$board->id])}}" class="btn btn-block btn-gradient-primary">Add Task</a>
        @endcan
    </div><!--end /div-->
</div><!--end col-->
