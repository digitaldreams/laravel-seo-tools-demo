@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h1>{{$record->name}}</h1>

        {!! $record->description !!}
        <div class="row">

            <div class="col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{$record->image->getThumbnail()}}" class="card-img-top"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <table class="table table-bordered">
                    <tr>
                        <th>Category</th>
                        <td>{{$record->category->title??'n/a'}}</td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td>{{$record->brand}}</td>
                    </tr>
                    <tr>
                        <th>Model</th>
                        <td>{{$record->model}}</td>
                    </tr>
                    <tr>
                        <th>SKU</th>
                        <td>{{$record->sku}}</td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>{{$record->price}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection