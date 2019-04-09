<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>User Id </th>
		<th>Name </th>
		<th>Slug </th>
		<th>Logo Id </th>
		<th>Address Id </th>
		<th>Website </th>
		<th>Video Link </th>
		<th>General Phone </th>
		<th>Business Phone </th>
		<th>Email </th>
		<th>Rating </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->user_id }} </td>
	 	<td> {{$record->name }} </td>
	 	<td> {{$record->slug }} </td>
	 	<td> {{$record->logo_id }} </td>
	 	<td> {{$record->address_id }} </td>
	 	<td> {{$record->website }} </td>
	 	<td> {{$record->video_link }} </td>
	 	<td> {{$record->general_phone }} </td>
	 	<td> {{$record->business_phone }} </td>
	 	<td> {{$record->email }} </td>
	 	<td> {{$record->rating }} </td>
	<td>@can('view',$record)
<a class="btn btn-secondary" href="{{route('businesses.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a>
@endcan@can('update',$record)
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
@endcan</td></tr>

    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">
            {{{$records->render()}}}
        </td>
    </tr>
    </tfoot>
</table>