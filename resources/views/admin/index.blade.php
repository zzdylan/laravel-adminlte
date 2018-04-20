@extends('admin.layouts.base')
@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">系统信息</h3>
    </div>
    <div class="box-body"> 
        <table class="table table-hover table-bordered table-condensed">
            <tbody>
                <tr>
                    <td>版本</td>
                    <td>1.0.0beta</td>
                </tr>
                <tr>
                    <td>laravel版本</td>
                    <td>{{app()->version()}}</td>
                </tr>
                <tr>
                    <td>服务器操作系统</td>
                    <td>{{PHP_OS}}</td>
                </tr>
                <tr>
                    <td>运行环境</td>
                    <td>{{$_SERVER["SERVER_SOFTWARE"]}}</td>
                </tr>
<!--                            <tr>
                    <td>MYSQL版本</td>
                    <td></td>
                </tr>-->
                <tr>
                    <td>PHP版本</td>
                    <td>{{PHP_VERSION}}</td>
                </tr>
                <tr>
                    <td>上传限制</td>
                    <td>{{ini_get('upload_max_filesize')}}</td>
                </tr>
                <tr>
                    <td>POST限制</td>
                    <td>{{ini_get('post_max_size')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('js')
<script>
</script>
@endsection