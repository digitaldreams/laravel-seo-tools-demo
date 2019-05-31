@extends('layouts.frontend')

@section('content')
    <h3 class="p-0 m-0 text-left"><i class="fa fa-shopping-cart"></i> Products</h3>
    <div class="row">
        @foreach($records as $record)
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{$record->image->getThumbnail()}}" class="card-img-top"/>
                    <div class="card-body">
                        <a href="{{route('products.frontend.show',$record->slug)}}">
                            <h3 class="card-title">{{$record->name}}
                                <small class="badge badge-primary">${{$record->price}}</small>
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {!! $records->render() !!}
@endsection