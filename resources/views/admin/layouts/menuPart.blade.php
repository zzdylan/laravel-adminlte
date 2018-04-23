@foreach($menus as $key=>$menu)
@if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->visible($menu['roles']))
<li class="@if($menu['childrens']) treeview @endif {{is_active($menu['id'])}}">
    <a href="@if($menu['childrens'])javascript:;@else{{url(config('admin.prefix').'/'.$menu['uri'])}}@endif"><i class="fa {{$menu['icon']}}"></i> <span>{{$menu['title']}}</span>
        @if($menu['childrens'])
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        @endif
    </a>
    @if($menu['childrens'])
    <ul class="treeview-menu">
    @include('admin.layouts.menuPart',['menus'=>$menu['childrens']])
    </ul>
    @endif
</li>
@endif
@endforeach