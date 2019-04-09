@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    businesses
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
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.business')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection