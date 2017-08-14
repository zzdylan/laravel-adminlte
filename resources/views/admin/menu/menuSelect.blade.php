@foreach($menus as $menu)
    <option @if(old('parent_id')==$menu->id || isset($targetMenu) && $targetMenu->parent_id==$menu->id) selected  @endif value="{{$menu->id}}">{{$sign}}{{$menu->title}}</option>
    @if($menu->hasChildren())
        @include('admin.menu.menuSelect',['menus'=>$menu->childrens(),'sign'=>$sign.'&nbsp;&nbsp;&nbsp;&nbsp;'])
    @endif
@endforeach