<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:40'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);

        return redirect()->back();
    }

//    这里我们使用的是『隐性路由模型绑定』功能，Laravel 会自动查找并注入对应 ID 的实例对象 $status，如果找不到就会抛出异常。
    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '微博已被成功删除');
        return redirect()->back();
    }


}
