<form action="{{isset($route)?$route:route('businesses.store')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name"
               value="{{old('name',$model->name)}}" placeholder="" maxlength="255" required="required">
        @if($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
               name="description" id="description" value="{{old('description',$model->description)}}" placeholder="">
        @if($errors->has('description'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="business_logo">Logo </label>
        <input type="file" class="form-control {{ $errors->has('logo') ? ' is-invalid' : '' }}" name="logo"
               id="business_logo" placeholder="">
        @if($errors->has('logo'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('logo') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="address_id">Address</label>
        <input type="search" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
               name="address" id="address_id" value="{{old('address',$model->address)}}" placeholder="e.g. House 10, Road 10">
        @if($errors->has('address'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('address') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="url" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}" name="website"
               id="website" value="{{old('website',$model->website)}}" placeholder="" maxlength="255">
        @if($errors->has('website'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('website') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="video_link">Video Link</label>
        <input type="text" class="form-control {{ $errors->has('video_link') ? ' is-invalid' : '' }}" name="video_link"
               id="video_link" value="{{old('video_link',$model->video_link)}}" placeholder="" maxlength="255">
        @if($errors->has('video_link'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('video_link') }}</strong>
            </div>
        @endif
    </div>



    <div class="form-group">
        <label for="general_phone">General Phone</label>
        <input type="text" class="form-control {{ $errors->has('general_phone') ? ' is-invalid' : '' }}"
               name="general_phone" id="general_phone" value="{{old('general_phone',$model->general_phone)}}"
               placeholder="" maxlength="20">
        @if($errors->has('general_phone'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('general_phone') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="business_phone">Business Phone</label>
        <input type="text" class="form-control {{ $errors->has('business_phone') ? ' is-invalid' : '' }}"
               name="business_phone" id="business_phone" value="{{old('business_phone',$model->business_phone)}}"
               placeholder="" maxlength="20">
        @if($errors->has('business_phone'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('business_phone') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email"
               value="{{old('email',$model->email)}}" placeholder="" maxlength="255">
        @if($errors->has('email'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>