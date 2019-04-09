@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('tags.index')}}">tags</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('tags.show',$model->id)}}">{{$model->id}}</a>
    </li>
    <li class="breadcrumb-item">
        Edit
    </li>
@endsection

@section('tools')
    @can('create',App\Models\Tag::class)
        <a class="btn btn-secondary" href="{{route('tags.create')}}">
            <span class="fa fa-plus"></span>
        </a>
    @endcan
@endsection

@section('content')
    <div class="row">
        <div class='col-md-12'>
            <div class='card'>
                <div class="card-body">
                    @include('forms.tag',[
                    'route'=>route('tags.update',$model->id),
                    'method'=>'PUT'
                    ])
                </div>
            </div>
        </div>
    </div>
@endSection