<?php

/**
 * 将提示消息闪存到session中
 * @param type $type
 * @param type $message
 */
function admin_toastr($type, $message) {
    $toastr = ['type' => $type, 'message' => $message];
    \Illuminate\Support\Facades\Session::flash('toastr', $toastr);
}

/**
 * 判断左侧菜单是否active
 * @param type $menu_id
 * @return string
 */
function is_active($menu_id) {
    $menuModel = config('admin.database.menu_model');
    $allMenu = $menuModel::menuCache();
    foreach($allMenu as $menu){
        if($menu['id'] == $menu_id){
            $currentUrl = url(config('admin.prefix') . '/' . $menu['uri']);
            continue;
        }
    }
    $allChildrenUrls = $menuModel::allChildrenUrls($menu_id);
    if (in_array(Request::url(), $allChildrenUrls) || Request::url() == $currentUrl) {
        return 'active';
    }
    return '';
}

/**
 * 返回定时器报错页面
 * @param type $type
 * @param type $message
 * @return view
 */
function jump($message, $jumpUrl = '/admin', $type = 'error') {
    return view('jump', ['type' => $type, 'jumpUrl' => $jumpUrl, 'message' => $message]);
}

//递归获取分类树
function getTree($items, $pid = 0) {
    $tree = [];
    foreach ($items as $item) {
        if ($item['parent_id'] == $pid) {
            $item['childrens'] = getTree($items, $item['id']);
            $tree[] = $item;
            unset($item);
        }
    }
    return $tree;
}
