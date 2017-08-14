<?php

use Illuminate\Database\Seeder;

class AdminRoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_users')->delete();
        
        \DB::table('admin_role_users')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'user_id' => 57,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 2,
                'user_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 6,
                'user_id' => 59,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'role_id' => 7,
                'user_id' => 60,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}