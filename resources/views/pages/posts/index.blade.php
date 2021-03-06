@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        posts
    </li>
@endsection
@section('header')
    <i class="fa fa-th-list text-muted"></i> Posts
@endsection
@section('tools')
    @can('create',App\Models\Post::class)
        <a class="btn btn-secondary" href="{{route('posts.create')}}">
            <span class="fa fa-plus"></span>
        </a>
    @endcan
@endsection

@section('content')
    <div class="row">
        @foreach($records as $record)
            <div class="col-sm-4">
                @include('cards.post')
            </div>
        @endforeach
    </div>
    {!! $records->render() !!}
@endSection