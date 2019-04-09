<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('businesses.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    @can('update',$record)
<a class="btn btn-secondary" href="{{route('businesses.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
@endcan
                    @can('delete',$record)
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('businesses.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-secondary cursor-pointer">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>
@endcan
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>User Id</th>
			<td>{{$record->user_id}}</td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{$record->name}}</td>
		</tr>
		<tr>
			<th>Slug</th>
			<td>{{$record->slug}}</td>
		</tr>
		<tr>
			<th>Logo Id</th>
			<td>{{$record->logo_id}}</td>
		</tr>
		<tr>
			<th>Address Id</th>
			<td>{{$record->address_id}}</td>
		</tr>
		<tr>
			<th>Website</th>
			<td>{{$record->website}}</td>
		</tr>
		<tr>
			<th>Video Link</th>
			<td>{{$record->video_link}}</td>
		</tr>
		<tr>
			<th>General Phone</th>
			<td>{{$record->general_phone}}</td>
		</tr>
		<tr>
			<th>Business Phone</th>
			<td>{{$record->business_phone}}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>{{$record->email}}</td>
		</tr>
		<tr>
			<th>Rating</th>
			<td>{{$record->rating}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
