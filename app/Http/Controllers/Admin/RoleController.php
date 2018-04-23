<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;

class RoleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //如果是异步请求则返回json数据
        if ($request->ajax()) {
            $roleModel = config('admin.database.roles_model');
            if ($request->input('search')) {
                $roles = $roleModel::where('name', 'like', $request->input('search') . '%')
                        ->offset($request->input('offset'))
                        ->limit($request->input('limit'))
                        ->get();
                $total = $roleModel::where('name', 'like', $request->input('search') . '%')->count();
            } else {
                $roles = $roleModel::
                        offset($request->input('offset'))
                        ->limit($request->input('limit'))
                        ->get();
                $total = $roleModel::count();
            }
            $roleData = [];
            foreach ($roles as $key => $role) {
                $roleData[$key]['id'] = $role->id;
                $roleData[$key]['name'] = $role->name;
                $roleData[$key]['slug'] = $role->slug;
                $roleData[$key]['created_at'] = (string) $role->created_at;
                $roleData[$key]['updated_at'] = (string) $role->updated_at;
            }
            return [
                'total' => $total,
                'rows' => $roleData
            ];
        }
        //如果是同步请求，返回视图
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $permissionModel = config('admin.database.permissions_model');
        $permissions = $permissionModel::all();
        return view('admin.role.create', ['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rule = [
            'name' => 'required',
            'slug' => 'required'
        ];
        $input = $request->all();
        Validator::make($input, $rule)->validate();
        $roleModel = config('admin.database.roles_model');
        $rolePermissionsTable = config('admin.database.role_permissions_table');
        try {
            $role = $roleModel::create([
                        'name' => $input['name'],
                        'slug' => $input['slug']
            ]);
            if (isset($input['permissions']) && is_array($input['permissions'])) {
                foreach ($input['permissions'] as $permission) {
                    DB::table($rolePermissionsTable)->insert([
                        'permission_id' => $permission,
                        'role_id' => $role->id
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
        $roleModel = config('admin.database.roles_model');
        $permissionModel = config('admin.database.permissions_model');
        $allPermissions = $permissionModel::all();
        $role = $roleModel::find($id);
        $targetPermissions = $role->permissions;
        return view('admin.role.edit', [
            'role' => $role,
            'targetPermissions' => $targetPermissions,
            'allPermissions' => $allPermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $rule = [
            'name' => 'required',
            'slug' => 'required'
        ];
        $input = $request->all();
        Validator::make($input, $rule)->validate();
        $roleModel = config('admin.database.roles_model');
        $rolePermissionsTable = config('admin.database.role_permissions_table');
        $role = $roleModel::find($id);
        try {
            $role->update([
                'name' => $input['name'],
                'slug' => $input['slug']
            ]);
            if (isset($input['permissions']) && is_array($input['permissions'])) {
                DB::table($rolePermissionsTable)->where('role_id', $id)->delete();
                foreach ($input['permissions'] as $permission) {
                    DB::table($rolePermissionsTable)->insert([
                        'permission_id' => $permission,
                        'role_id' => $id
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
        $roleModel = config('admin.database.roles_model');
        $roleModel::destroy($id);
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
        Validator::make($input, $rule)->validate();
        $roleModel = config('admin.database.roles_model');
        $roleModel::destroy($input['ids']);
        return ['status' => 1, 'msg' => '删除成功!'];
    }

}
