<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class SessionsController extends Controller
{
    // 创建会话,用于显示用户登陆页面
    public function create()
    {
        return view('sessions.create');
    }

    // 接收登陆表单传过来的信息,进行数据库验证
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            // 登陆成功的相关操作
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
        }else{
            // 登陆失败的相关操作
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }


    }
}
