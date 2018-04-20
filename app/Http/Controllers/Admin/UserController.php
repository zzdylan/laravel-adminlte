<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //如果是异步请求则返回json数据
        if ($request->ajax()) {
            $userModel = config('admin.database.users_model');
            if ($request->input('search')) {
                $users = $userModel::
                        where('username', 'like', $request->input('search') . '%')
                        ->offset($request->input('offset'))
                        ->limit($request->input('limit'))
                        ->get();
                $total = $userModel::where('username', 'like', $request->input('search') . '%')->count();
            } else {
                $users = $userModel::
                        offset($request->input('offset'))
                        ->limit($request->input('limit'))
                        ->get();
                $total = $userModel::count();
            }
            $userData = [];
            foreach ($users as $key => $user) {
                $userData[$key]['id'] = $user->id;
                $userData[$key]['username'] = $user->username;
                $userData[$key]['roles'] = $user->roles->pluck('name')->toArray();
                $userData[$key]['created_at'] = (string) $user->created_at;
                $userData[$key]['updated_at'] = (string) $user->updated_at;
            }
            return [
                'total' => $total,
                'rows' => $userData
            ];
        }
        //如果是同步请求，返回视图
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roleModel = config('admin.database.roles_model');
        $permissionModel = config('admin.database.permissions_model');
        $roles = $roleModel::all();
        $permissions = $permissionModel::all();
        return view('admin.user.create', ['roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rule = [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required',
            'roles' => 'required|array'
        ];
        $input = $request->all();
        Validator::make($input, $rule)->validate();
        $adminModel = config('admin.database.users_model');
        if ($adminModel::where('username', $input['username'])->exists()) {
            return ['status' => 0, 'msg' => '用户名已存在'];
        }
        $roleUsersTable = config('admin.database.role_users_table');
        $userPermissionsTable = config('admin.database.user_permissions_table');
        try {
            $admin = $adminModel::create([
                        'username' => $input['username'],
                        'name' => $input['name'],
                        'password' => bcrypt($input['password'])
            ]);
            foreach ($input['roles'] as $role) {
                DB::table($roleUsersTable)->insert([
                    'role_id' => $role,
                    'user_id' => $admin->id
                ]);
            }
            if (isset($input['permissions']) && is_array($input['permissions'])) {
                foreach ($input['permissions'] as $permission) {
                    DB::table($userPermissionsTable)->insert([
                        'permission_id' => $permission,
                        'user_id' => $admin->id
                    ]);
                }
            }
        } catch (\Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
        return ['status' => 1, 'msg' => '添加成功!'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (!Auth::guard('admin')->user()->isSuperAdmin()) {
            return jump('无权访问');
        }
        $adminModel = config('admin.database.users_model');
        $roleModel = config('admin.database.roles_model');
        $permissionModel = config('admin.database.permissions_model');
        $user = $adminModel::find($id);
        $roles = $roleModel::all();
        $permissions = $permissionModel::all();
        return view('admin.user.edit', ['user' => $user, 'roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (!Auth::guard('admin')->user()->isSuperAdmin()) {
            return ['status' => 0, 'msg' => '无权访问!'];
        }
        $rule = [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required'
        ];
        $input = $request->all();
        Validator::make($input, $rule)->validate();
        $adminModel = config('admin.database.users_model');
        $user = $adminModel::find($id);
        $user->username = $input['username'];
        $user->name = $input['name'];
        if ($request->input('password') != $user->password) {
            $user->password = bcrypt($input['password']);
        }
        try {
            $user->save();
            DB::table(config('admin.database.role_users_table'))->where('user_id', $id)->delete();
            if (isset($input['roles']) && is_array($input['roles'])) {
                foreach ($input['roles'] as $role) {
                    DB::table('admin_role_users')->insert([
                        'user_id' => $id,
                        'role_id' => $role
                    ]);
                }
            }
            DB::table(config('admin.database.user_permissions_table'))->where('user_id', $id)->delete();
            if (isset($input['permissions']) && is_array($input['permissions'])) {
                foreach ($input['permissions'] as $permission) {
                    DB::table('admin_user_permissions')->insert([
                        'permission_id' => $permission,
                        'user_id' => $id
                    ]);
                }
            }
        } catch (\Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
        return ['status' => 1, 'msg' => '修改成功!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $userModel = config('admin.database.users_model');
        $roleModel = config('admin.database.roles_model');
        $admin = $userModel::find($id);
        //超级管理员可以删除超级管理员，但是只有最后一个超级管理员的时候则不能删除
        if ($admin->isSuperAdmin() && $roleModel::where('slug', 'super_admin')->first()->admins()->count() == 1) {
            return ['status' => 0, 'msg' => '该超级管理员是最后一位超级管理员，无法删除'];
        }
        $userModel::destroy($id);
        //删除该用户的角色关联和权限关联
        DB::table(config('admin.database.role_users_table'))->where('user_id',$id)->delete();
        DB::table(config('admin.database.user_permissions_table'))->where('user_id', $id)->delete();
        return ['status' => 1, 'msg' => '删除成功!'];
    }

    /**
     * 批量删除
     * @param Request $request
     */
    public function batchDestroy(Request $request) {
        $rule = [
            'ids' => 'required|array',
        ];
        $input = $request->all();
        if (in_array(1, $input['ids'])) {
            return ['status' => 0, 'msg' => '无法删除顶级管理员'];
        }
        if (in_array(Auth::guard('admin')->user()->id, $input['ids'])) {
            return ['status' => 0, 'msg' => '无法删除自己'];
        }
        Validator::make($input, $rule)->validate();
        $userModel = config('admin.database.users_model');
        $userModel::destroy($input['ids']);
        return ['status' => 1, 'msg' => '删除成功!'];
    }

}
