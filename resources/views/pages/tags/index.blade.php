@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        tags
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
        @foreach($records as $record)
            <div class="col-sm-6">
                @include('cards.tag')
            </div>
        @endforeach
    </div>
    {!! $records->render() !!}
@endSection