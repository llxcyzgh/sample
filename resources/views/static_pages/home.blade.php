@extends('layouts.default')

@section('title','home')

@section('content')
    <div class="jumbotron">
        <h1>hi zhuli</h1>
        <p class="lead"> welcome to the world <a href="#">这是第一个laraver程序</a> can you see</p>
        <p>
            <a href="{{ route('signup') }}" class="btn btn-lg btn-success" role="button">现在注册</a>
        </p>
    </div>

@stop
