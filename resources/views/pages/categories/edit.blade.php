@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('categories.index')}}">categories</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('categories.show',$model->id)}}">{{$model->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection

@section('tools')
@can('create',App\Models\Category::class)
<a class="btn btn-secondary" href="{{route('categories.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endcan
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('forms.category',[
                'route'=>route('categories.update',$model->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection