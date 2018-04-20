<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Role {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) {
        //判断是否登录
        if (Auth::guard('admin')->guest()) {
            Session::put('url.intented', $request->url());
            return redirect(config('admin.prefix') . '/login');
        }
        //判断是否有某角色
        if (Auth::guard('admin')->user()->inRole($role)) {
            return $next($request);
        }
        return response(jump('权限不足'));
    }

}
