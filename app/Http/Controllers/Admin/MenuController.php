<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use DB;

class MenuController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $menuModel = config('admin.database.menu_model');
        $roleModel = config('admin.database.roles_model');
        $menus = $menuModel::where('parent_id', 0)->orderBy('order')->get();
        $roles = $roleModel::all();
        return view('admin.menu.index', [
            'menus' => $menus,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rule = [
            'parent_id' => 'required',
            'title' => 'required',
            'icon' => 'required',
            'uri' => 'required'
        ];
        $input = $request->all();
        Validator::make($input, $rule)->validate();
        $menuModel = config('admin.database.menu_model');
        try {
            $menu = $menuModel::create([
                        'parent_id' => $input['parent_id'],
                        'title' => $input['title'],
                        'icon' => $input['icon'],
                        'uri' => $input['uri']
            ]);
            if (isset($input['roles']) && is_array($input['roles'])) {
                foreach ($input['roles'] as $role) {
                    DB::table(config('admin.database.role_menu_table'))->insert([
                        'role_id' => $role,
                        'menu_id' => $menu->id
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
        $menuModel = config('admin.database.menu_model');
        $roleModel = config('admin.database.roles_model');
        $menus = $menuModel::where('parent_id', 0)->orderBy('order')->get();
        $roles = $roleModel::all();
        $menu = $menuModel::find($id);
        return view('admin.menu.edit', [
            'menus' => $menus,
            'roles' => $roles,
            'menuRoles' => array_column($menu->roles->toArray(), 'id'),
            'targetMenu' => $menu
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
            'parent_id' => 'required',
            'title' => 'required',
            'icon' => 'required',
            'uri' => 'required'
        ];
        $input = $request->all();
        Validator::make($input, $rule)->validate();
        $menuModel = config('admin.database.menu_model');
        $allChildrenIds = $menuModel::allChildrenIds($id);
        if (in_array($input['parent_id'], $allChildrenIds) || $id == $input['parent_id']) {
            return ['status' => 0, 'msg' => '父级选择错误!'];
        }
        $menu = $menuModel::find($id);
        try {
            $menu->update([
                'parent_id' => $input['parent_id'],
                'title' => $input['title'],
                'icon' => $input['icon'],
                'uri' => $input['uri']
            ]);
            DB::table(config('admin.database.role_menu_table'))->where('menu_id',$id)->delete();
            if (isset($input['roles']) && is_array($input['roles'])) {
                foreach ($input['roles'] as $role) {
                    DB::table(config('admin.database.role_menu_table'))->insert([
                        'role_id' => $role,
                        'menu_id' => $menu->id
                    ]);
                }
            }
        } catch (\Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }

        return ['status' => 1, 'msg' => '更新成功!'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $menuModel = config('admin.database.menu_model');
        $menuModel::destroy($id);
        return ['status' => 1, 'msg' => '删除成功'];
    }

    /**
     * nestable
     * @param Request $request
     */
    public function nestable(Request $request) {
        $menuModel = config('admin.database.menu_model');
        try {
            $menuModel::recursionNestable($request->input('nestable'));
        } catch (\Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
        return ['status' => 1, 'msg' => '更新成功'];
    }

}
