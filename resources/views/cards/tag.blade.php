<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('tags.show',$record->id)}}"> {{$record->id}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    @can('update',$record)
<a class="btn btn-secondary" href="{{route('tags.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
@endcan
                    @can('delete',$record)
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('tags.destroy',$record->id)}}"
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
			<th>Slug</th>
			<td>{{$record->slug}}</td>
		</tr>
		<tr>
			<th>Name</th>
			<td>{{$record->name}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
