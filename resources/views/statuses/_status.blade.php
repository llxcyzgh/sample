<li id="status-{{$status->id}}">
    {{--用户头像--}}
    <a href="{{route('users.show',$user->id)}}">
        <img src="{{$user->gravatar()}}" alt="{{$user->name}}" class="gravatar">
    </a>

    {{--用户名--}}
    <span class="user">
        <a href="{{route('users.show',$user->id)}}">{{$user->name}}</a>
    </span>

    {{--本状态创建时间--}}
    <span class="timestamp">
        {{$status->created_at->diffForHumans()}}
    </span>

    {{--状态内容--}}
    <span class="content">{{$status->content}}</span>

    {{--如果是作者则提供删除按钮--}}
    @can('destroy',$status)
        <form action="{{route('statuses.destroy',$status->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-sm btn-danger status-delete-btn">删除</button>
        </form>
    @endcan
</li>