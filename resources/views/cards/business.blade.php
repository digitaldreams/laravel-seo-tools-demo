<div class="card card-default">
    <img class="card-img-top img-fluid" src="{{$record->logo->getThumbnail()}}">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                <a href="{{route('businesses.show',$record->slug)}}"> {{$record->name}}</a>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    @can('update',$record)
                        <a class="btn btn-secondary" href="{{route('businesses.edit',$record->slug)}}">
                            <span class="fa fa-pencil"></span>
                        </a>
                    @endcan
                    @can('delete',$record)
                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                              action="{{route('businesses.destroy',$record->slug)}}"
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

            <tr>
                <th>Address</th>
                <td>{{$record->address->getFullAddress()}}</td>
            </tr>
            <tr>
                <th>Website</th>
                <td>{{$record->website}}</td>
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
           
            </tbody>
        </table>
    </div>
</div>
