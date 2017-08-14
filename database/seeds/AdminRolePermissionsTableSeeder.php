<?php

use Illuminate\Database\Seeder;

class AdminRolePermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_permissions')->delete();
        
        \DB::table('admin_role_permissions')->insert(array (
            0 => 
            array (
                'role_id' => 6,
                'permission_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 6,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 7,
                'permission_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}