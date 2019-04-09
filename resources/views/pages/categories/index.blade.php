@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        categories
    </li>
@endsection
@section('header')
    <i class="fa fa-list text-muted"></i> Categories
@endsection
@section('tools')
    @can('create',App\Models\Category::class)
        <a class="btn btn-secondary" href="{{route('categories.create')}}">
            <span class="fa fa-plus"></span>
        </a>
    @endcan
@endsection

@section('content')
    @include('tables.category')
@endSection