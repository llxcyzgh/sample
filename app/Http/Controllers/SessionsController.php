<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }

    // 创建会话,用于显示用户登陆页面
    public function create()
    {
        return view('sessions.create');
    }

    // 接收登陆表单传过来的账号密码信息,进行数据库验证
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            if (Auth::user()->activated) {
                // 登陆成功的相关操作
                session()->flash('success', '欢迎回来！');
                return redirect()->intended(route('users.show', [Auth::user()]));
            } else {
                Auth::logout();
                session()->flash('warning', '你的账号未激活，请检查邮箱中的注册邮件进行激活。');
                return redirect('/');
            }
        } else {
            // 登陆失败的相关操作
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return redirect('login');
    }


}
