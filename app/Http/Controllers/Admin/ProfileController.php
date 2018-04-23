<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller {

    public function edit() {
        $data = Auth::guard('admin')->user();
        return view('admin.profile.edit', ['data' => $data]);
    }

    public function update(Request $request) {
        $userTable = config('admin.database.users_table');
        $user = Auth::guard('admin')->user();
        $messages = [
            'username.required' => '用户名不能为空',
            'username.unique' => '用户名不能重复',
            'username.between' => '用户名只能设置1~10位',
            'name.required' => '昵称不能为空',
            'name.between' => '昵称只能设置1~10位',
            'password.required' => '密码不能为空',
            'password.confirmed' => '两次密码输入不一致',
        ];
        $validator = Validator::make($request->all(), [
                    'username' => 'required|unique:' . $userTable . ',username,' . $user->id . '|between:1,10',
                    'name' => 'required|between:1,10',
                    'password' => 'required|confirmed'
                        ], $messages);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return ['status' => 0, 'msg' => $errors->first()];
        }
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        if ($user->password != $request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        if ($request->hasFile('avatar')) {
            $disk = \Storage::disk(config('admin.upload.disk'));
            $image = $disk->put('avatar', $request->file('avatar'));
            $user->avatar = $image;
        }
        $user->save();
        return ['status' => 1, 'msg' => '更新成功'];
    }

}
