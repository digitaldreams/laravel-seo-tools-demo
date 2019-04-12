@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('businesses.index')}}">businesses</a>
    </li>
    <li class="breadcrumb-item">
        Create
    </li>
@endsection
@section('header')
    <i class="fa fa-plus"></i> New Business
@endsection
@section('content')
    <div class="row">
        <div class='col-md-12'>
            <div class='card bg-white'>
                <div class="card-body">
                    @include('forms.business')
                </div>
            </div>
        </div>
    </div>
@endSection