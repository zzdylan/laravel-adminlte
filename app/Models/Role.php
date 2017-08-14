<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $guarded = [];
    protected $table = 'admin_roles';

    public function permissions() {
        return $this->belongsToMany(config('admin.database.permissions_model'), config('admin.database.role_permissions_table'), 'role_id', 'permission_id');
    }

    public function Admins() {
        return $this->belongsToMany(config('admin.database.users_model'), config('admin.database.role_users_table'), 'role_id', 'user_id');
    }

    public function menus(){
        return $this->belongsToMany(config('admin.database.menu_model'), config('admin.database.role_menu_table'), 'role_id', 'menu_id');
    }
    
}
