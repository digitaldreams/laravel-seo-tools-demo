<form action="{{isset($route)?$route:route('photos.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
        <div class="form-group">
        <label for="user_id">User Id</label>
        <input type="number" class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id" value="{{old('user_id',$model->user_id)}}" placeholder="" >
          @if($errors->has('user_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('user_id') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text" class="form-control {{ $errors->has('caption') ? ' is-invalid' : '' }}" name="caption" id="caption" value="{{old('caption',$model->caption)}}" placeholder="" maxlength="255" >
          @if($errors->has('caption'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('caption') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" value="{{old('title',$model->title)}}" placeholder="" maxlength="255" >
          @if($errors->has('title'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('title') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="mime_type">Mime Type</label>
        <input type="text" class="form-control {{ $errors->has('mime_type') ? ' is-invalid' : '' }}" name="mime_type" id="mime_type" value="{{old('mime_type',$model->mime_type)}}" placeholder="" maxlength="100" >
          @if($errors->has('mime_type'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('mime_type') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="src">Src</label>
        <input type="text" class="form-control {{ $errors->has('src') ? ' is-invalid' : '' }}" name="src" id="src" value="{{old('src',$model->src)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('src'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('src') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="location_id">Location Id</label>
    <select class="form-control {{ $errors->has('location_id') ? ' is-invalid' : '' }}" name="location_id" id="location_id">
        @if(isset($locations))
@foreach ($locations as $data)
<option value="{{$data->id}}" {{$data->id==$model->location_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('location_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('location_id') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>