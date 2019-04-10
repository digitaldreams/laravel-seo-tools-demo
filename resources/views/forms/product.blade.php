<form action="{{isset($route)?$route:route('products.store')}}" method="POST" enctype="multipart/form-data">
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
        <textarea id="summernote" name="description"
                  class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                  rows="3">{{old('description',$model->description)}}</textarea>
        @if($errors->has('description'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('description') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" id="price"
               value="{{old('price',$model->price)}}" placeholder="">
        @if($errors->has('price'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('price') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="image_id">Image </label>
        <input type="file" name="file" class="form-control-file" accept="image/*" required>

        @if($errors->has('file'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('file') }}</strong>
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
        <label for="model">Model</label>
        <input type="text" class="form-control {{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" id="model"
               value="{{old('model',$model->model)}}" placeholder="" maxlength="30">
        @if($errors->has('model'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('model') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="sku">Sku</label>
        <input type="text" class="form-control {{ $errors->has('sku') ? ' is-invalid' : '' }}" name="sku" id="sku"
               value="{{old('sku',$model->sku)}}" placeholder="" maxlength="100" required="required">
        @if($errors->has('sku'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('sku') }}</strong>
            </div>
        @endif
    </div>


    <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control {{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" id="brand"
               value="{{old('brand',$model->brand)}}" placeholder="" maxlength="100">
        @if($errors->has('brand'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('brand') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>