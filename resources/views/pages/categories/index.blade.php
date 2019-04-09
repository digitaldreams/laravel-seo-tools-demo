@extends('layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    categories
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
    @foreach($records as $record)
    <div class="col-sm-6">
        @include('cards.category')
    </div>
    @endforeach
</div>
{!! $records->render() !!}
@endSection