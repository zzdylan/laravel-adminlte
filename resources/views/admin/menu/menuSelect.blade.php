@foreach($menus as $menu)
    <option @if(old('parent_id')==$menu['id'] || (isset($targetMenu) && $targetMenu->parent_id==$menu['id'])) selected  @endif value="{{$menu['id']}}">{{$sign}}{{$menu['title']}}</option>
    <?php count($menu['childrens']); ?>
    @if($menu['childrens'])
        @include('admin.menu.menuSelect',['menus'=>$menu['childrens'],'sign'=>$sign.'&nbsp;&nbsp;&nbsp;&nbsp;'])
    @endif
@endforeach