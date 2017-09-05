<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class adminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            session()->flash('info','请登录后操作');
            return redirect()->route('admin.login');
        }else{
            if(Auth::user()->is_admin != 1){
                Auth::logout();
                session()->flash('danger','非管理员账号');
                return redirect()->route('admin.login');
            }
        }
        return $next($request);
    }
}
