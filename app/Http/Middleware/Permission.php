<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Permission {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission) {
        //echo $permission;
        //判断是否登录
        if (Auth::guard('admin')->guest()) {
            Session::put('url.intented', $request->url());
            return redirect(config('admin.prefix') . '/login');
        }
        //判断是否是超级管理员
        if (Auth::guard('admin')->user()->isSuperAdmin() || Auth::guard('admin')->user()->id == 1) {
            return $next($request);
        }
        $allPermissions = Auth::guard('admin')->user()->allPermissions();
        if (!in_array($permission, $allPermissions)) {
            return response(jump('权限不足'));
        }
        return $next($request);
    }

}
