<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;

class PermissionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //如果是异步请求则返回json数据
        if ($request->ajax()) {
            $permissionModel = config('admin.database.permissions_model');
            if ($request->input('search')) {
                $permissions = $permissionModel::
                        where('name', 'like', $request->input('search') . '%')
                        ->offset($request->input('offset'))
                        ->limit($request->input('limit'))
                        ->get();
                $total = $permissionModel::where('name', 'like', $request->input('search') . '%')->count();
            } else {
                $permissions = $permissionModel::
                        offset($request->input('offset'))
                        ->limit($request->input('limit'))
                        ->get();
                $total = $permissionModel::count();
            }
            $permissionData = [];
            foreach ($permissions as $key => $permission) {
                $permissionData[$key]['id'] = $permission->id;
                $permissionData[$key]['name'] = $permission->name;
                $permissionData[$key]['slug'] = $permission->slug;
                $permissionData[$key]['created_at'] = (string) $permission->created_at;
                $permissionData[$key]['updated_at'] = (string) $permission->updated_at;
            }
            return [
                'total' => $total,
                'rows' => $permissionData
            ];
        }
        //如果是同步请求，返回视图
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.permission.create');
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
        $permissionModel = config('admin.database.permissions_model');
        try {
            $permissionModel::create([
                'name' => $input['name'],
                'slug' => $input['slug']
            ]);
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
        $permissionModel = config('admin.database.permissions_model');
        $permission = $permissionModel::find($id);
        return view('admin.permission.edit', ['permission' => $permission]);
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
        $permissionModel = config('admin.database.permissions_model');
        $permission = $permissionModel::find($id);
        try {
            $permission->update([
                'name' => $input['name'],
                'slug' => $input['slug']
            ]);
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
        $permissionModel = config('admin.database.permissions_model');
        $permissionModel::destroy($id);
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
        $permissionModel = config('admin.database.permissions_model');
        $permissionModel::destroy($input['ids']);
        return ['status' => 1, 'msg' => '删除成功!'];
    }

}
