<?php

use Illuminate\Database\Seeder;

class AdminRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_roles')->delete();
        
        \DB::table('admin_roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '超级管理员',
                'slug' => 'super_admin',
                'created_at' => NULL,
                'updated_at' => '2017-08-11 13:48:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '普通管理员',
                'slug' => 'admin',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 7,
                'name' => '测试角色',
                'slug' => 'test_role',
                'created_at' => '2017-08-05 16:03:29',
                'updated_at' => '2017-08-05 16:03:29',
            ),
        ));
        
        
    }
}