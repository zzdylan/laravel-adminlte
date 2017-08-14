<?php

use Illuminate\Database\Seeder;

class AdminUserPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_user_permissions')->delete();
        
        \DB::table('admin_user_permissions')->insert(array (
            0 => 
            array (
                'user_id' => 60,
                'permission_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}