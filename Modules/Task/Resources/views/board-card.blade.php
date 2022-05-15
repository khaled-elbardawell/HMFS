<a href="{{route('task.edit',[$task->id,'post_type'=>$post_type])}}">
    <div class="card board-card">
        <div class="card-body">
            <div class="dropdown d-inline-block float-right">
                <a class="nav-link dropdown-toggle mr-n2 mt-n2" id="drop2" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fas fa-ellipsis-v text-muted"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop2">
                    <a class="dropdown-item" href="{{route('task.edit',[$task->id,'post_type'=>$post_type])}}">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div><!--end dropdown-->
            <i class="mdi mdi-circle-outline d-block mt-n2 font-18 text-warning"></i>
            <h5 class="my-1">{{$task->name}}</h5>
            @if (auth()->user()->id == $task->user_from)
                <p class="text-muted mb-2">To: {{$task->user_t->name}}</p>
            @else
                <p class="text-muted mb-2">From: {{$task->user_f->name}}</p>
            @endif
            <p class="date"><small>Date From: {{$task->date_from}}</small></p>
            <p class="date"><small>Date To: {{$task->date_to}}</small></p>
            <div class="row justify-content-center">
                <div class="col-6 align-self-center">
                    <ul class="list-inline mb-0">
                        <li class="list-item d-inline-block">
                            <a>
                                <i class="mdi mdi-comment-outline text-muted"></i>
                                <span class="text-muted font-weight-bold">{{$task->comments->count()}}</span>
                            </a>
                        </li>
                    </ul>
                </div><!--end col-->
                <div class="col-6 align-self-center">
                    <a class="float-right">
                        <img src="{{customAsset('admin/assets/images/users/user-1.jpg')}}" alt="user" class="thumb-xs rounded-circle">
                    </a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end card-body-->
    </div><!--end card-->
</a>

