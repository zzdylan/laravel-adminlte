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
            0 => 
            array (
                'id' => 2,
                'parent_id' => 5,
                'order' => 0,
                'title' => '一级菜单2',
                'icon' => 'fa-cloud',
                'uri' => 'uri2',
                'created_at' => NULL,
                'updated_at' => '2017-08-03 08:34:39',
            ),
            1 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'order' => 0,
                'title' => '一级菜单1.1',
                'icon' => 'fa-cloud',
                'uri' => 'uri1.1',
                'created_at' => NULL,
                'updated_at' => '2017-08-01 08:27:52',
            ),
            2 => 
            array (
                'id' => 4,
                'parent_id' => 2,
                'order' => 0,
                'title' => '一级菜单2.1',
                'icon' => 'fa-cloud',
                'uri' => 'uri2.1',
                'created_at' => NULL,
                'updated_at' => '2017-08-01 08:27:52',
            ),
            3 => 
            array (
                'id' => 5,
                'parent_id' => 1,
                'order' => 1,
                'title' => '一级菜单1.2',
                'icon' => 'fa-cloud',
                'uri' => 'uri1.2',
                'created_at' => NULL,
                'updated_at' => '2017-08-01 08:27:52',
            ),
            4 => 
            array (
                'id' => 6,
                'parent_id' => 2,
                'order' => 1,
                'title' => '一级菜单2.2',
                'icon' => 'fa-cloud',
                'uri' => 'uri2.2',
                'created_at' => NULL,
                'updated_at' => '2017-08-01 08:27:52',
            ),
            5 => 
            array (
                'id' => 7,
                'parent_id' => 2,
                'order' => 2,
                'title' => '1.1.1',
                'icon' => 'fa-cloud',
                'uri' => '',
                'created_at' => NULL,
                'updated_at' => '2017-08-03 01:17:50',
            ),
            6 => 
            array (
                'id' => 12,
                'parent_id' => 0,
                'order' => 11,
                'title' => '菜单管理',
                'icon' => 'fa-cloud',
                'uri' => 'menu',
                'created_at' => NULL,
                'updated_at' => '2017-08-14 21:35:07',
            ),
            7 => 
            array (
                'id' => 18,
                'parent_id' => 0,
                'order' => 10,
                'title' => '角色管理',
                'icon' => 'fa-users',
                'uri' => 'role',
                'created_at' => '2017-08-04 03:17:12',
                'updated_at' => '2017-08-14 21:35:07',
            ),
            8 => 
            array (
                'id' => 32,
                'parent_id' => 0,
                'order' => 7,
                'title' => '用户管理',
                'icon' => 'fa-user',
                'uri' => 'user',
                'created_at' => '2017-08-04 16:37:23',
                'updated_at' => '2017-08-14 21:35:07',
            ),
            9 => 
            array (
                'id' => 39,
                'parent_id' => 0,
                'order' => 8,
                'title' => '权限管理',
                'icon' => 'fa-eye',
                'uri' => 'permission',
                'created_at' => '2017-08-05 04:00:09',
                'updated_at' => '2017-08-14 21:35:07',
            ),
            10 => 
            array (
                'id' => 40,
                'parent_id' => 0,
                'order' => 9,
                'title' => '测试菜单',
                'icon' => 'fa-angellist',
                'uri' => '/test0',
                'created_at' => '2017-08-09 13:55:23',
                'updated_at' => '2017-08-14 21:35:07',
            ),
            11 => 
            array (
                'id' => 41,
                'parent_id' => 40,
                'order' => 0,
                'title' => '测试一级子菜单1',
                'icon' => 'fa-angellist',
                'uri' => 'test1',
                'created_at' => '2017-08-09 13:58:41',
                'updated_at' => '2017-08-09 14:10:04',
            ),
            12 => 
            array (
                'id' => 42,
                'parent_id' => 40,
                'order' => 1,
                'title' => '测试一级子菜单2',
                'icon' => 'fa-angellist',
                'uri' => 'test2',
                'created_at' => '2017-08-09 14:02:34',
                'updated_at' => '2017-08-11 11:44:06',
            ),
            13 => 
            array (
                'id' => 43,
                'parent_id' => 0,
                'order' => 6,
                'title' => '主页',
                'icon' => 'fa-angellist',
                'uri' => 'index',
                'created_at' => '2017-08-11 11:43:53',
                'updated_at' => '2017-08-14 21:35:16',
            ),
        ));
        
        
    }
}