@extends('layouts.default')
@section('title','注册')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            {{--标题--}}
            <div class="panel-heading">
                <h1>注册表单</h1>
            </div>
            {{--表单--}}
            <div class="panel-body">
                <form action="{{route('users.store')}}" method="post">
                    {{--引入错误信息--}}
                    @include('shared._errors')

                    {{csrf_field()}}

                    {{--名称--}}
                    <div class="form-group">
                        <label for="name">名称</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    {{--邮箱--}}
                    <div class="form-group">
                        <label for="email">邮箱</label>
                        <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    {{--密码--}}
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                    </div>

                    {{--确认密码--}}
                    <div class="form-group">
                        <label for="password_confirmation">确认密码</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                    </div>

                    {{--提交按钮--}}
                    <button type="submit" class="btn btn-primary">注册</button>


                </form>
            </div>
        </div>
    </div>
    
@stop