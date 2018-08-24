@extends('layouts.default')
@section('title','更新个人资料')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            {{--标题--}}
            <div class="panel-heading">
                <h5>更新个人资料</h5>
            </div>
            {{--表单--}}
            <div class="panel-body">
                {{--引入错误信息--}}
                @include('shared._errors')

                <div class="gravatar_edit">
                    <a href="http://gravatar.com/emails" target="_blank">
                        <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar"/>
                    </a>
                </div>

                <form action="{{route('users.update',$user->id)}}" method="post">
                    {{ method_field('PATCH') }}
                    {{csrf_field()}}

                    {{--名称--}}
                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    </div>

                    {{--邮箱--}}
                    <div class="form-group">
                        <label for="email">邮箱</label>
                        <input type="text" name="email" id="email" disabled="disabled" class="form-control" value="{{ $user->email }}">
                    </div>

                    {{--密码--}}
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" name="password" id="password" class="form-control"
                               value="{{ old('password') }}">
                    </div>

                    {{--确认密码--}}
                    <div class="form-group">
                        <label for="password_confirmation">确认密码</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control" value="{{ old('password_confirmation') }}">
                    </div>

                    {{--提交按钮--}}
                    <button type="submit" class="btn btn-primary">更新</button>


                </form>
            </div>
        </div>
    </div>

@stop