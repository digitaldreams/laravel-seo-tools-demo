@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
                <div class="px-0">
                    <h1 class="display-4 font-italic">{{$firstPost->title}}</h1>
                    <p class="lead my-3">{!! $firstPost->body !!}</p>
                    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
                </div>
            </div>
        </div>
        @foreach($posts->chunk(2) as $partialPosts)
            <div class="row mb-2">
                @foreach($partialPosts as $post)
                    <div class="col-md-6">
                        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <div class="card">
                                    <img class="card-img-top" src="{{$post->photo->getThumbnail()}}"/>
                                    <div class="card-header">
                                        <h3 class="mb-0">{{$post->title}}
                                        </h3>

                                    </div>
                                    <div class="card-body">
                                        {!! $post->body !!}
                                    </div>
                                    <div class="card-footer">
                                        <strong class=" text-primary">{{$post->category->title}}</strong>
                                        <div class="text-muted">{{$post->created_at->format('M y')}}</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach

    </div>
@endSection