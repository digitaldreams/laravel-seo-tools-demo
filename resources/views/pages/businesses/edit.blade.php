@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('businesses.index')}}">businesses</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('businesses.show',$model->id)}}">{{$model->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection

@section('tools')
@can('create',App\Models\Business::class)
<a class="btn btn-secondary" href="{{route('businesses.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endcan
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('forms.business',[
                'route'=>route('businesses.update',$model->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection