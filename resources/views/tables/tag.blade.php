<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Slug</th>
        <th>Name</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
        <tr>
            <td> {{$record->slug }} </td>
            <td> {{$record->name }} </td>
            <td>
                @can('view',$record)
                    <a class="btn btn-secondary" href="{{route('tags.show',$record->id)}}">
                        <span class="fa fa-eye"></span>
                    </a>
                @endcan
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
            </td>
        </tr>

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