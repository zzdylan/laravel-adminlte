@foreach($menus as $key=>$menu)
@if(Auth::guard('admin')->user() && Auth::guard('admin')->user()->visible($menu['roles']))
<li class="@if(isset($menu['childrens'])) treeview @endif {{is_active($menu['id'])}}">
    <a href="@if(isset($menu['childrens']))javascript:;@else{{url(config('admin.prefix').'/'.$menu['uri'])}}@endif"><i class="fa {{$menu['icon']}}"></i> <span>{{$menu['title']}}</span>
        @if(isset($menu['childrens']))
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        @endif
    </a>
    @if(isset($menu['childrens']))
    @include('admin.layouts.menuPart',['menus'=>$menu['childrens']])
    @endif
</li>
@endif
@endforeach