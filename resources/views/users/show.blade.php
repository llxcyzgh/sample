{{--继承基础布局模板--}}
@extends('layouts.default')
{{--设置本html的title--}}
@section('title',$user->name)

{{--具体内容--}}
@section('content')
    <div class="row">
        {{--显示用户信息, 包括头像, 名称, 删除按钮--}}
        <div class="col-md-offset-2 col-md-8">
            <div class="col-md-12">
                <div class="col-md-offset-2 col-md-8">
                    <section class="user_info">
                        @include('shared._user_info',['user'=>$user])
                    </section>
                </div>
            </div>

            {{--显示用户发表的状态statuses--}}
            <div class="col-md-12">
                @if(count($statuses)>0)
                    <ol class="statuses">
                        @foreach($statuses as $status)
                            {{--                        @include('statuses._status')--}}
                            @include('statuses._status',['status'=>$status])
                        @endforeach
                    </ol>
                    {!! $statuses->render() !!}
                @endif
            </div>
        </div>
    </div>
@stop