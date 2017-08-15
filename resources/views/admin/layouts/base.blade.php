<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('packages/admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('packages/admin/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
<!--  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">-->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('packages/admin/adminlte/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('packages/admin/adminlte/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="{{asset('packages/admin/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('packages/admin/nestable/css/jquery.nestable.css')}}">
  <link rel="stylesheet" href="{{asset('packages/admin/fontawesome-iconpicker/css/fontawesome-iconpicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('packages/admin/bootstrap-table/bootstrap-table.min.css')}}">
  <style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background-color: #3c8dbc
    }
    </style>
  @yield('othercss')
  <!-- Google Font -->
<!--  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition {{config('admin.skin')}} {{implode(' ',config('admin.layout'))}}">
<div class="wrapper">

  <!-- Main Header -->
  @include('admin.layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @include('admin.layouts.content')
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('admin.layouts.footer')
  
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<!--<script src="{{asset('packages/admin/jquery/jquery.min.js')}}"></script>-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('packages/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('packages/admin/adminlte/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script>
    $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{asset('packages/admin/layer/layer.js')}}"></script>
<script src="{{asset('packages/admin/bootstrap-validator/validator.min.js')}}"></script>
<script src="{{asset('packages/admin/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('packages/admin/nestable/js/jquery.nestable.js')}}"></script>
<script src="{{asset('packages/admin/fontawesome-iconpicker/js/fontawesome-iconpicker.min.js')}}"></script>
<script src="{{asset('packages/admin/bootstrap-table/bootstrap-table.js')}}"></script>
<script src="{{asset('packages/admin/bootstrap-table/locale/bootstrap-table-zh-CN.min.js')}}"></script>
<script src="{{asset('packages/admin/tableExport.jquery.plugin/tableExport.min.js')}}"></script>
<script src="{{asset('packages/admin/bootstrap-table/extensions/export/bootstrap-table-export.js')}}"></script>
<script src="{{asset('packages/admin/bootstrap-table/extensions/toolbar/bootstrap-table-toolbar.js')}}"></script>
<script src="{{asset('packages/admin/jquery-cookie/jquery.cookie.js')}}"></script>
<script>
    var cookie = $.cookie('sidebar');
    //console.log(cookie);
    if (cookie == 0) {
        $('body').addClass('sidebar-collapse');
        //console.log('添加闭合样式');
    }
    $(".sidebar-toggle").click(function() {
        //console.log($("body").attr('class'));
        var flag = getFlag();
        $.cookie('sidebar', flag, {path: '/'})
    });
    function getFlag() {
        var str = $("body").attr('class');
        var strs = new Array();
        strs = str.split(" "); //字符分割 
        //console.log(strs);
        var flag = 0;//0是闭合状态
        for (var i = 0; i < strs.length; i++) {
            if (strs[i] == 'sidebar-collapse') {
                flag = 1;//将要变成展开状态
            }
        }
        return flag;
    }
</script>
@yield('otherjs')
</body>
</html>