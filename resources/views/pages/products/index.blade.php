@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        products
    </li>
@endsection
@section('header')
    <i class="fa fa-shopping-basket"></i> Products
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
        @foreach($records as $record)
            <div class="col-sm-6">
                @include('cards.product')
            </div>
        @endforeach
    </div>
    {!! $records->render() !!}
@endSection