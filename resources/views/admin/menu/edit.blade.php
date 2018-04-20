@extends('admin.layouts.base')
@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">编辑</h3>
        <div class="box-tools">
            <div class="btn-group pull-right" style="margin-right: 10px">
                <a href="{{url(config('admin.prefix').'/menu')}}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;列表</a>
            </div> 
            <div class="btn-group pull-right" style="margin-right: 10px">
                <a onclick="history.back(1)" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="editForm" class="form-horizontal">
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">父级菜单</label>

                <div class="col-sm-8">
                    <select name="parent_id" class="form-control" required>
                        <option value="0">顶级菜单</option>
                        @php
                        $data = [
                            'menus'=>$menus,
                            'sign'=>'&nbsp;&nbsp;&nbsp;&nbsp;'
                        ];
                        if(isset($targetMenu)){
                            $data['targetMenu'] = $targetMenu;
                        }
                        @endphp
                        @include('admin.menu.menuSelect',$data)
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">标题</label>
                <div class="col-sm-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <input name="title" value="{{$targetMenu->title}}" type="text" class="form-control" placeholder="输入标题" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图标</label>
                <div class="col-sm-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <input name="icon" value="{{$targetMenu->icon}}" style="height: 34px" class="icon" type="text" class="form-control" placeholder="" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">路径</label>
                <div class="col-sm-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <input name="uri" value="{{$targetMenu->uri}}" type="text" class="form-control" placeholder="输入路径" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">角色</label>
                <div class="col-sm-8">
                    <div class="help-block with-errors"></div>
                    <select style="width: 100%;" id="roles" name="roles[]" class="form-control select2" multiple>
                        @foreach($roles as $role)
                        <option @if(isset($targetMenu) && in_array($role->id,$menuRoles)) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="col-md-2"></div>
            <div class="btn-group col-md-8">
                <button type="reset" class="btn btn-warning pull-left">撤销</button>
                <button type="submit" class="btn btn-info pull-right">提交</button>
            </div>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
@endsection
@section('otherjs')
<script>
    $('.icon').iconpicker();
    $('.select2').select2();
    $('#editForm').validator({disable: false}).on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            layer.load(1, {shade: [0.1, '#fff']});
            $.ajax({
                url: "{{asset(config('admin.prefix').'/auth/menu').'/'.$targetMenu->id}}",
                type: 'put',
                dataType: "json",
                data: $("#editForm").serialize(),
                success: function (res) {
                    layer.closeAll();
                    if (res.status == 1) {
                        layer.msg(res.msg, {icon: 1});
                        location.href = "{{asset(config('admin.prefix')).'/auth/menu'}}";
                    } else {
                        layer.msg(res.msg, {icon: 5});
                    }
                }
            });
        }
        return false;
    })
</script>
@endsection