<div class="card card-default">
    <img class="card-img-top" src="{{$record->photo->getThumbnail()}}">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
               <h4> <a href="{{route('posts.show',$record->slug)}}"> {{$record->title}}</a></h4>
            </div>
            <div class="col-sm-3 text-right">
                <div class="btn-group">
                    @can('update',$record)
                        <a class="btn btn-secondary" href="{{route('posts.edit',$record->slug)}}">
                            <span class="fa fa-pencil"></span>
                        </a>
                    @endcan
                    @can('delete',$record)
                        <form onsubmit="return confirm('Are you sure you want to delete?')"
                              action="{{route('posts.destroy',$record->slug)}}"
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

</div>
