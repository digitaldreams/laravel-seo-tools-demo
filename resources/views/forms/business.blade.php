<form action="{{isset($route)?$route:route('businesses.store')}}" method="POST" >
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
        <label for="name">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{old('name',$model->name)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="slug" value="{{old('slug',$model->slug)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('slug'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('slug') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="logo_id">Logo Id</label>
        <input type="number" class="form-control {{ $errors->has('logo_id') ? ' is-invalid' : '' }}" name="logo_id" id="logo_id" value="{{old('logo_id',$model->logo_id)}}" placeholder="" >
          @if($errors->has('logo_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('logo_id') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="address_id">Address Id</label>
        <input type="number" class="form-control {{ $errors->has('address_id') ? ' is-invalid' : '' }}" name="address_id" id="address_id" value="{{old('address_id',$model->address_id)}}" placeholder="" >
          @if($errors->has('address_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('address_id') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" id="website" value="{{old('website',$model->website)}}" placeholder="" maxlength="255" >
          @if($errors->has('website'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('website') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="video_link">Video Link</label>
        <input type="text" class="form-control {{ $errors->has('video_link') ? ' is-invalid' : '' }}" name="video_link" id="video_link" value="{{old('video_link',$model->video_link)}}" placeholder="" maxlength="255" >
          @if($errors->has('video_link'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('video_link') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" value="{{old('description',$model->description)}}" placeholder="" >
          @if($errors->has('description'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('description') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="general_phone">General Phone</label>
        <input type="text" class="form-control {{ $errors->has('general_phone') ? ' is-invalid' : '' }}" name="general_phone" id="general_phone" value="{{old('general_phone',$model->general_phone)}}" placeholder="" maxlength="20" >
          @if($errors->has('general_phone'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('general_phone') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="business_phone">Business Phone</label>
        <input type="text" class="form-control {{ $errors->has('business_phone') ? ' is-invalid' : '' }}" name="business_phone" id="business_phone" value="{{old('business_phone',$model->business_phone)}}" placeholder="" maxlength="20" >
          @if($errors->has('business_phone'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('business_phone') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{old('email',$model->email)}}" placeholder="" maxlength="255" >
          @if($errors->has('email'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </div>
  @endif 
    </div>

<div class="form-check">
    <input class="form-check-input {{ $errors->has('rating') ? ' is-invalid' : '' }}" type="checkbox" value="1"  name="rating"
           id="rating">
    <label class="form-check-label" for="rating">
        Rating
    </label>
      @if($errors->has('rating'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('rating') }}</strong>
    </div>
  @endif
</div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>