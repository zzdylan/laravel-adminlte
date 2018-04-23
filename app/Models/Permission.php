<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];
    protected $table = 'admin_permissions';
    
    public function admins(){
        return $this->belongsToMany(config('admin.database.users_model'),config('admin.database,user_permissions_table'),'permission_id','user_id');
    }
    
    public function roles(){
        return $this->belongsToMany(config('admin.database.roles_model'),config('admin.database.role_permissions_table'),'permission_id','role_id');
    }
    
}
