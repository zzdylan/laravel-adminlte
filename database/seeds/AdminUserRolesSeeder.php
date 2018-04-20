<?php

use Illuminate\Database\Seeder;

class AdminUserRolesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('admin_role_users')->delete();
        \DB::table('admin_role_users')->insert(array(
            0 =>
            array(
                'role_id' => 1,
                'user_id' => 1,
            )
        ));
    }

}
