@extends('website::layouts.master')

@section('content')
    <section>
        <div class="container mt-30">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-4 col-sm-6 col-12">
                        @include('website::layouts.card-blog',['blog'=>$blog])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
