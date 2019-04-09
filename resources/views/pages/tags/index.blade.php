@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        tags
    </li>
@endsection
@section('header')
    <i class="fa fa-tags"></i> Tags
@endsection
@section('tools')
    @can('create',App\Models\Tag::class)
        <a class="btn btn-secondary" href="{{route('tags.create')}}">
            <span class="fa fa-plus"></span>
        </a>
    @endcan
@endsection

@section('content')
    @include('tables.tag')
@endSection