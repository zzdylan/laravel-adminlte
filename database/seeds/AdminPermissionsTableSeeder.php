<?php

use Illuminate\Database\Seeder;

class AdminPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_permissions')->delete();
        
        \DB::table('admin_permissions')->insert(array (
            0 => 
            array (
                'id' => 6,
                'name' => '用户列表',
                'slug' => 'user.list',
                'created_at' => '2017-08-05 14:55:28',
                'updated_at' => '2017-08-05 14:55:28',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => '添加用户',
                'slug' => 'user.create',
                'created_at' => '2017-08-05 14:55:45',
                'updated_at' => '2017-08-05 14:55:45',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => '修改用户',
                'slug' => 'user.edit',
                'created_at' => '2017-08-05 14:56:07',
                'updated_at' => '2017-08-05 14:56:07',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => '删除用户',
                'slug' => 'user.destroy',
                'created_at' => '2017-08-05 14:56:44',
                'updated_at' => '2017-08-05 14:56:44',
            ),
            4 => 
            array (
                'id' => 11,
                'name' => '角色列表',
                'slug' => 'role.list',
                'created_at' => '2017-08-05 14:58:02',
                'updated_at' => '2017-08-05 14:58:02',
            ),
            5 => 
            array (
                'id' => 12,
                'name' => '添加角色',
                'slug' => 'role.create',
                'created_at' => '2017-08-05 14:59:54',
                'updated_at' => '2017-08-05 14:59:54',
            ),
            6 => 
            array (
                'id' => 13,
                'name' => '修改角色',
                'slug' => 'role.edit',
                'created_at' => '2017-08-05 15:00:22',
                'updated_at' => '2017-08-05 15:00:22',
            ),
            7 => 
            array (
                'id' => 14,
                'name' => '删除角色',
                'slug' => 'role.destroy',
                'created_at' => '2017-08-05 15:01:04',
                'updated_at' => '2017-08-05 15:01:04',
            ),
            8 => 
            array (
                'id' => 16,
                'name' => 'test',
                'slug' => 'test',
                'created_at' => '2017-08-06 06:17:49',
                'updated_at' => '2017-08-06 06:26:08',
            ),
            9 => 
            array (
                'id' => 17,
                'name' => 'ttttttt',
                'slug' => 'tt',
                'created_at' => '2017-08-14 22:45:00',
                'updated_at' => '2017-08-14 22:45:00',
            ),
            10 => 
            array (
                'id' => 18,
                'name' => '11',
                'slug' => '11',
                'created_at' => '2017-08-14 22:46:11',
                'updated_at' => '2017-08-14 22:46:11',
            ),
        ));
        
        
    }
}