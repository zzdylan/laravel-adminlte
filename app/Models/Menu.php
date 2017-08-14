<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $guarded = [];
    protected $table = 'admin_menu';

    public function hasChildren() {
        return self::where('parent_id', $this->id)->exists();
    }

    public function childrens() {
        return self::where('parent_id', $this->id)->orderBy('order')->get();
    }

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

    public static function allChildrenIds($id, &$allChildrenIds = []) {
        $menuIds = self::where('parent_id', $id)->pluck('id')->toArray();
        if (!empty($menuIds)) {
            $allChildrenIds = array_merge($menuIds, $allChildrenIds);
            foreach ($menuIds as $menuId) {
                self::allChildrenIds($menuId, $allChildrenIds);
            }
        }
        return $allChildrenIds;
    }

    public static function allChildrenUrls($id, &$allChildrenUrls = []) {
        $menus = self::where('parent_id', $id);
        $menuIds = $menus->pluck('id')->toArray();
        if (!empty($menuIds)) {
            $menuUris = $menus->pluck('uri')->toArray();
            foreach ($menuUris as $key => $menuUri) {
                $menuUris[$key] = config('admin.prefix') . '/' . $menuUri;
            }
            $menuUrls = array_map('url', $menuUris);
            $allChildrenUrls = array_merge($menuUrls, $allChildrenUrls);
            foreach ($menuIds as $menuId) {
                self::allChildrenIds($menuId, $allChildrenUrls);
            }
        }
        return $allChildrenUrls;
    }

}
