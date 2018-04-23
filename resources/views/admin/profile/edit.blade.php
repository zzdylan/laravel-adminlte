@extends('admin.layouts.base')
@section('othercss')
<link href="{{asset('packages/admin/bootstrap-fileinput/css/fileinput.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">编辑</h3>
    </div>
    <form id="editForm" method="post" class="form-horizontal" enctype ="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <div class="box-body">
            <div class="form-group">
                <label class="col-md-2 control-label">用户名</label>
                <div class="col-md-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <input name="username" value="{{$data->username}}" type="text" class="form-control" placeholder="输入用户名" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">昵称</label>
                <div class="col-md-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-pencil"></i>
                        </span>
                        <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="输入昵称" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">头像</label>
                <div class="col-md-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <input id="avatar" value="" name="avatar" value="" type="file" class="form-control" placeholder=""> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">密码</label>
                <div class="col-md-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                        <input id="password" name="password" value="{{$data->password}}" type="password" class="form-control" placeholder="输入密码" required> 
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">确认密码</label>
                <div class="col-md-8">
                    <div class="help-block with-errors"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                        <input name="password_confirmation" value="{{$data->password}}" type="password" class="form-control" placeholder="输入确认密码" required data-match="#password"> 
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="col-md-2"></div>
            <div class="btn-group col-md-8">
                <button type="reset" class="btn btn-warning pull-left">取消</button>
                <button id="submit_button" type="button" class="btn btn-info pull-right">提交</button>
            </div>
        </div>
    </form>
    <!-- END FORM-->
</div>
@endsection
@section('otherjs')
<script src="{{asset('packages/admin/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script src="{{asset('packages/admin/bootstrap-fileinput/js/locales/zh.js')}}"></script>
<script src="{{asset('packages/admin/jquery-form/jquery.form.min.js')}}"></script>
<script>
    $("#avatar").fileinput({
        maxFileCount:1,
        allowedFileExtensions:['jpg', 'gif', 'png'],
        showCaption: false,
        language: "zh",
        showUpload: false,
        maxFileSize:'3072',
        initialPreviewAsData:true,
        initialPreview: [
            "{{$data->avatar}}"
        ]
    });
    $('#submit_button').click(function () {
    layer.load(1, {shade: [0.1, '#fff']});
    $("#editForm").ajaxSubmit({
        dataType: 'json',
        type:'post',
        success: function (res) {
            layer.closeAll();
            //提交成功后调用
            if (res.status == 1) {
                layer.msg(res.msg, {icon: 1});
                location.href = "{{url(config('admin.prefix')).'/auth/profile/edit'}}";
            } else {
                layer.msg(res.msg, {icon: 5});
            }
        }
    });
});
</script>
@endsection