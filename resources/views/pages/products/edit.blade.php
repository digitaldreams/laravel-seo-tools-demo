@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('products.index')}}">products</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('products.show',$model->id)}}">{{$model->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection
@section('header')
    <i class="fa fa-plus text-muted"></i> New Product
@endsection

@section('tools')
@can('create',App\Models\Product::class)
<a class="btn btn-secondary" href="{{route('products.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endcan
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('forms.product',[
                'route'=>route('products.update',$model->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection