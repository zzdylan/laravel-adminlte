@extends('admin.layouts.base')
@section('content')
<div class="row">
    @if(Auth::guard('admin')->user()->checkPermission('menu.nestable'))
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <span id="nestable-menu">
                    <button type="button" class="btn btn-success" data-action="expand-all"><i class="fa fa-plus"></i>展开</button>
                    <button type="button" class="btn btn-success" data-action="collapse-all"><i class="fa fa-minus"></i>收起</button>
                </span>
                <button id="save" type="button" class="btn btn-success" data-action="collapse-all" disabled="disabled"><i class="fa fa-save"></i>保存</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="dd" id="nestable_list_1">
                    @include('admin.menu.nestablePart',['menus'=>$menus])
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-6">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">添加菜单</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form id="addForm" method="post" action="/admin/menu" class="form-horizontal">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">父级菜单</label>

                        <div class="col-sm-10">
                            <select name="parent_id" class="form-control" required>
                                    <option value="0">顶级菜单</option>
                                    @include('admin.menu.menuSelect',['menus'=>$menus,'sign'=>'&nbsp;&nbsp;&nbsp;&nbsp;'])
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>

                        <div class="col-sm-10">
                            <div class="help-block with-errors"></div>
                            <div class="input-group">
                                    <span class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                    </span>
                                    <input name="title" value="" type="text" class="form-control" placeholder="输入标题" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">图标</label>

                        <div class="col-sm-10">
                            <div class="help-block with-errors"></div>
                            <div class="input-group">
                                    <input name="icon" value="" style="height: 34px" class="icon" type="text" class="form-control" placeholder="" required> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">路径</label>

                        <div class="col-sm-10">
                            <div class="help-block with-errors"></div>
                            <div class="input-group">
                                    <span class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                    </span>
                                    <input name="uri" value="" type="text" class="form-control" placeholder="输入路径" required> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">角色</label>

                        <div class="col-sm-10">
                            <div class="help-block with-errors"></div>
                            <select id="roles" name="roles[]" class="form-control" multiple>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button  type="reset" class="btn btn-default">取消</button>
                    <button id="add_button" type="submit" class="btn btn-info pull-right">提交</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
</div>
@endsection
@section('otherjs')
<script>
    $('#addForm').validator({focus: false, disable: false})
    $('#roles').select2();
    $('.icon').iconpicker();
    $('.dd').nestable();
    $('.dd').on('change', function () {
        $("#save").attr('disabled', false);
    });
    $('#save').click(function () {
        var nestable = $('.dd').nestable('serialize');
        layer.load(1, {shade: [0.1, '#fff']});
        $.post('/admin/menu/nestable', {"nestable": nestable}, function (res) {
            layer.closeAll();
            if (res.status == 0) {
                layer.msg(res.msg, {icon: 5});
            } else {
                layer.msg(res.msg, {icon: 1});
                location.href = "{{url(config('admin.prefix').'/menu')}}";
            }
        });
    });
    $('#nestable-menu').on('click', function (e)
    {
        var target = $(e.target),
                action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
    $('.menu_delete').click(function () {
        var ele = $(this);
        var id = ele.data('id')
        layer.confirm('确认删除?', {btn: ['是', '否']}, function () {
            layer.load(1, {shade: [0.1, '#fff']});
            $.ajax({
                url: "{{asset(config('admin.prefix').'/menu')}}" + '/' + id,
                type: 'delete',
                dataType: 'json',
                success: function (res) {
                    layer.closeAll();
                    if (res.status == 1) {
                        ele.parents("li")[0].remove();
                        layer.msg(res.msg, {icon: 1});
                    } else {
                        layer.msg(res.msg, {icon: 5});
                    }
                }
            });
        });
    });
    $('#addForm').validator().on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            layer.load(1, {shade: [0.1, '#fff']});
            $.post("{{asset(config('admin.prefix')).'/menu'}}", $('#addForm').serialize(), function (res) {
                layer.closeAll();
                if (res.status == 1) {
                    layer.msg(res.msg, {icon: 1});
                    location.href = "{{asset(config('admin.prefix')).'/menu'}}";
                } else {
                    layer.msg(res.msg, {icon: 5});
                }
            });
        }
        return false;
    })
</script>
@endsection