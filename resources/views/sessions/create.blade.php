@extends('layouts.default')
@section('title','登陆')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            {{--标题--}}
            <div class="panel-heading">
                <h5>登陆</h5>
            </div>
            {{--表单--}}
            <div class="panel-body">
                {{--引入错误信息--}}
                @include('shared._errors')
                <form action="{{route('login')}}" method="post">
                    {{csrf_field()}}

                    {{--登陆邮箱--}}
                    <div class="form-group">
                        <label for="email">邮箱</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    {{--登陆密码--}}
                    <div class="form-group">
                        <label for="password">密码 （<a href="{{ route('password.request') }}">忘记密码</a>）</label>
                        <input type="password" name="password" id="password" class="form-control"
                               value="{{ old('password') }}">
                    </div>

                    {{--记住我--}}
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember">记住我</label>
                    </div>


                    {{--提交按钮--}}
                    <button type="submit" class="btn btn-primary">登陆</button>
                </form>
                <hr>
                <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
            </div>
        </div>
    </div>

@stop