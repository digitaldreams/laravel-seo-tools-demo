<form action="{{isset($route)?$route:route('posts.store')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{isset($method)?$method:'POST'}}"/>


    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title"
               value="{{old('title',$model->title)}}" placeholder="" maxlength="255">
        @if($errors->has('title'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status"
               id="status" value="{{old('status',$model->status)}}" placeholder="" maxlength="255" required="required">
        @if($errors->has('status'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('status') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" name="body"
                  id="body">{!! old('body',$model->body) !!}</textarea>

        @if($errors->has('body'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('body') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id"
                id="category_id">
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
        <label for="photo">Photo </label>
        <input type="file" name="photo" accept="image/*" required>

        @if($errors->has('photo'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('photo') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>