@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        photos
    </li>
@endsection

@section('tools')
    @can('create',App\Models\Photo::class)
        <a class="btn btn-secondary" href="{{route('photos.create')}}">
            <span class="fa fa-plus"></span>
        </a>
    @endcan
@endsection

@section('content')
    <div class="row">
        @foreach($records as $record)
            <div class="col-sm-6">
                @include('cards.photo')
            </div>
        @endforeach
    </div>
    {!! $records->render() !!}
@endSection