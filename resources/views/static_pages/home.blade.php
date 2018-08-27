@extends('layouts.default')

@section('title','home')

@section('content')
    {{--如果已经登陆,则显示新建微博表单, 如果未登陆,则显示注册按钮--}}
    @if (Auth::check())
        <div class="row">
            <div class="col-md-8">
                <section class="status_form">
                    @include('shared._status_form')
                </section>

                <h3>微博列表</h3>
                @include('shared._feed')
            </div>
            <aside class="col-md-4">
                <section class="user_info">
                    @include('shared._user_info', ['user' => Auth::user()])
                </section>
                <section class="stats">
                    @include('shared._stats', ['user' => Auth::user()])
                </section>

            </aside>
        </div>
    @else
        <div class="jumbotron">
            <h1>hi zhuli</h1>
            <p class="lead"> welcome to the world <a href="#">这是第一个laraver程序</a> can you see</p>
            <p>
                <a href="{{ route('signup') }}" class="btn btn-lg btn-success" role="button">现在注册</a>
            </p>
        </div>
    @endif

@stop
