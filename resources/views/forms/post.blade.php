<form action="{{isset($route)?$route:route('posts.store')}}" method="POST" >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>
    <div class="form-group">
    <label for="user_id">User Id</label>
    <select class="form-control {{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" id="user_id">
        @if(isset($users))
@foreach ($users as $data)
<option value="{{$data->id}}" {{$data->id==$model->user_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('user_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('user_id') }}</strong>
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
        <label for="slug">Slug</label>
        <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="slug" value="{{old('slug',$model->slug)}}" placeholder="" maxlength="255" >
          @if($errors->has('slug'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('slug') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="status" value="{{old('status',$model->status)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('status'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('status') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <input type="text" class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" id="body" value="{{old('body',$model->body)}}" placeholder="" >
          @if($errors->has('body'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('body') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-group">
    <label for="category_id">Category Id</label>
    <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" id="category_id">
        @if(isset($categories))
@foreach ($categories as $data)
<option value="{{$data->id}}" {{$data->id==$model->category_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('category_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('category_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="photo_id">Photo Id</label>
    <select class="form-control {{ $errors->has('photo_id') ? ' is-invalid' : '' }}" name="photo_id" id="photo_id">
        @if(isset($photos))
@foreach ($photos as $data)
<option value="{{$data->id}}" {{$data->id==$model->photo_id?'selected':''}}>{{$data->id}}</option>
@endforeach
@endif

    </select>
      @if($errors->has('photo_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('photo_id') }}</strong>
    </div>
  @endif
</div>

<div class="form-group">
    <label for="published_at">Published At</label>
    <div class="input-group">
        <input type="datetime" class="form-control {{ $errors->has('published_at') ? ' is-invalid' : '' }}" name="published_at" id="published_at"
               value="{{old('published_at',$model->published_at)}}"
               placeholder="" >
        <div class="input-group-addon">
            <label for="published_at" class="fa fa-calendar">
            </label>
        </div>
    </div>
      @if($errors->has('published_at'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('published_at') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>