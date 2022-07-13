@extends('website::layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    @include('website::layouts.card-blog')
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    @include('website::layouts.card-blog')
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    @include('website::layouts.card-blog')
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    @include('website::layouts.card-blog')
                </div>
            </div>
        </div>
    </section>
@endsection
