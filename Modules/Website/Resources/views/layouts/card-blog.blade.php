<div class="card-grid-3 hover-up mb-4">
    <div class="text-center card-grid-3-image">
        <a href="{{route('blogSingle',$blog->id)}}">
            @isset($blog->upload->file)
                <figure><img alt="{{$blog->title}}" src="{{CustomAsset('upload/images/full/'.$blog->upload->file)}}" /></figure>
            @else
                <figure><img alt="HMFS" src="{{CustomAsset('front/assets/imgs/hmfs_logo_1.svg')}}" /></figure>
            @endisset
        </a>
    </div>
    <div class="card-block-info">
        <div class="row">
            <div class="col-lg-6 col-6 text-start">
                <span>{{$blog->user->name}}</span>
            </div>
            <div class="col-lg-6 col-6 text-end">
                <span>{{$blog->post_date}}</span>
            </div>
        </div>
        <h5 class="mt-15 heading-md"><a href="{{route('blogSingle',$blog->id)}}">{{$blog->title}}</a></h5>
        <div class="card-2-bottom mt-50">
            <div class="row">
                <div class="col-lg-9 col-8">
                    <a href="{{route('blogSingle',$blog->id)}}" class="btn btn-border btn-brand-hover">Keep reading</a>
                </div>
            </div>
        </div>
    </div>
</div>
