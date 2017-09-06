<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login()
    {
        if(Auth::guest()){
            return view('admin.session.login');
        }else{
            return redirect()->route('admin');
        }
    }

    //登录
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'yzm' => 'required|yzmgz',
        ]);
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success','欢迎登录');
            return redirect()->route('admin');
        }else{
            session()->flash('danger','用户名或密码错误');
            return back();
        }
        return view('admin.session.login');
    }

    //退出
    public function logout()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect()->route('admin.login');
    }


}
