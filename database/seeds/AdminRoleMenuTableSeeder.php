<?php

use Illuminate\Database\Seeder;

class AdminRoleMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_role_menu')->delete();
        
        \DB::table('admin_role_menu')->insert(array (
            0 => 
            array (
                'role_id' => 1,
                'menu_id' => 40,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'role_id' => 1,
                'menu_id' => 41,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'role_id' => 1,
                'menu_id' => 42,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'role_id' => 1,
                'menu_id' => 50,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}