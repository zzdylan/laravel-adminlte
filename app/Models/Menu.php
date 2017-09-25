<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model {

    protected $guarded = [];
    protected $table = 'admin_menu';

    public function roles() {
        return $this->belongsToMany(config('admin.database.roles_model'), config('admin.database.role_menu_table'), 'menu_id', 'role_id');
    }

    public static function recursionNestable($nestableArr, $parent_id = 0) {
        foreach ($nestableArr as $key => $nestable) {
            $menu = self::find($nestable['id']);
            $menu->order = $key;
            $menu->parent_id = $parent_id;
            $menu->save();
            if (!empty($nestable['children'])) {
                self::recursionNestable($nestable['children'], $nestable['id']);
            }
        }
        return true;
    }

    public static function allChildrenUrls($id, $menus = null) {
        $childrensUrls = [];
        if ($menus == null) {
            $menus = self::menuCache();
        }
        foreach ($menus as $menu) {
            if ($menu['parent_id'] == $id) {
                $childrensUrls = self::allChildrenUrls($menu['id'], $menus);
                $childrensUrls[] = $menu['uri'];
            }
        }
        return $childrensUrls;
    }

    public static function allChildrenIds($id, $menus = null) {
        $childrensIds = [];
        if ($menus == null) {
            $menus = self::menuCache();
        }
        foreach ($menus as $menu) {
            if ($menu['parent_id'] == $id) {
                $childrensIds = self::allChildrenIds($menu['id'], $menus);
                $childrensIds[] = $menu['id'];
            }
        }
        return $childrensIds;
    }
    
    public static function allChildrens($id, $menus = null) {
        $childrens = [];
        if ($menus == null) {
            $menus = self::menuCache();
        }
        foreach ($menus as $menu) {
            if ($menu['parent_id'] == $id) {
                $childrens = self::allChildrens($menu['id'], $menus);
                $childrens[] = $menu;
            }
        }
        return $childrens;
    }

    public static function menuCache() {
        return Cache::rememberForever('menus', function() {
                    return self::with('roles')->orderBy('order')->get()->toArray();
                });
    }

}
