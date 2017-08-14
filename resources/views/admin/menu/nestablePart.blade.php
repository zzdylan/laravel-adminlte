<ol class="dd-list">
    @foreach($menus as $menu)
    <li class="dd-item" data-id="{{$menu->id}}">
        <div class="dd-handle">
            <i class="fa {{$menu->icon}}"></i>{{$menu->title}} 
            <span class="pull-right dd-nodrag">
                <a href="/admin/menu/{{$menu->id}}/edit"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0);" data-id="{{$menu->id}}" class="menu_delete"><i class="fa fa-trash"></i></a>
            </span>
        </div>
        @if($menu->hasChildren())
        @include('admin.menu.nestablePart',['menus'=>$menu->childrens()])
        @endif
    </li>
    @endforeach
</ol>