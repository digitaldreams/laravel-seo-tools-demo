<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>User Id </th>
		<th>Category Id </th>
		<th>Sub Category Id </th>
		<th>Name </th>
		<th>Slug </th>
		<th>Model </th>
		<th>Sku </th>
		<th>Price </th>
		<th>Brand </th>
		<th>Image Id </th>
		<th>Status </th>
		<th>Review </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->user_id }} </td>
	 	<td> {{$record->category_id }} </td>
	 	<td> {{$record->sub_category_id }} </td>
	 	<td> {{$record->name }} </td>
	 	<td> {{$record->slug }} </td>
	 	<td> {{$record->model }} </td>
	 	<td> {{$record->sku }} </td>
	 	<td> {{$record->price }} </td>
	 	<td> {{$record->brand }} </td>
	 	<td> {{$record->image_id }} </td>
	 	<td> {{$record->status }} </td>
	 	<td> {{$record->review }} </td>
	<td>@can('view',$record)
<a class="btn btn-secondary" href="{{route('products.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a>
@endcan@can('update',$record)
<a class="btn btn-secondary" href="{{route('products.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
@endcan
@can('delete',$record)
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('products.destroy',$record->id)}}"
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