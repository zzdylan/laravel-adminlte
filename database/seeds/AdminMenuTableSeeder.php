<?php

use Illuminate\Database\Seeder;

class AdminMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_menu')->delete();
        
        \DB::table('admin_menu')->insert(array (
            1 => 
            array (
                'id' => 1,
                'parent_id' => 0,
                'order' => 7,
                'title' => '系统',
                'icon' => 'fa-desktop',
                'uri' => 'auth/menu',
                'created_at' => NULL,
                'updated_at' => '2017-08-14 21:35:07',
            ),
            6 => 
            array (
                'id' => 12,
                'parent_id' => 1,
                'order' => 11,
                'title' => '菜单管理',
                'icon' => 'fa-cloud',
                'uri' => 'auth/menu',
                'created_at' => NULL,
                'updated_at' => '2017-08-14 21:35:07',
            ),
            7 => 
            array (
                'id' => 18,
                'parent_id' => 1,
                'order' => 10,
                'title' => '角色管理',
                'icon' => 'fa-users',
                'uri' => 'auth/role',
                'created_at' => '2017-08-04 03:17:12',
                'updated_at' => '2017-08-14 21:35:07',
            ),
            8 => 
            array (
                'id' => 32,
                'parent_id' => 1,
                'order' => 7,
                'title' => '用户管理',
                'icon' => 'fa-user',
                'uri' => 'auth/user',
                'created_at' => '2017-08-04 16:37:23',
                'updated_at' => '2017-08-14 21:35:07',
            ),
            9 => 
            array (
                'id' => 39,
                'parent_id' => 1,
                'order' => 8,
                'title' => '权限管理',
                'icon' => 'fa-eye',
                'uri' => 'auth/permission',
                'created_at' => '2017-08-05 04:00:09',
                'updated_at' => '2017-08-14 21:35:07',
            ),
            13 => 
            array (
                'id' => 43,
                'parent_id' => 0,
                'order' => 6,
                'title' => '主页',
                'icon' => 'fa-home',
                'uri' => 'index',
                'created_at' => '2017-08-11 11:43:53',
                'updated_at' => '2017-08-14 21:35:16',
            ),
        ));
        
        
    }
}