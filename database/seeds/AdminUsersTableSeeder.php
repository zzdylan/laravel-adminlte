<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$lqs0zK4w4sXfMfwQNAIy9OzlPHfpGdc2AOD94QtrW7yWzvR3reoXq',
                'name' => 'admin',
                'avatar' => NULL,
                'remember_token' => 'd2iJewOJNdryQk0C4VXtvMIIPMAetxgSsb6RoiocmkTLKPiCgQTMBadyAU6L',
                'created_at' => '2017-07-28 16:52:45',
                'updated_at' => '2017-07-28 16:52:45',
            )
        ));
        
        
    }
}