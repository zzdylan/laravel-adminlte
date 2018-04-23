@extends('admin.layouts.base')
@section('content')
<div class="box">
    <div class="box-body">
        <div id="toolbar">
            @if(Auth::guard('admin')->user()->checkPermission('role.create')) <a href="{{url(config('admin.prefix').'/auth/role/create')}}" class="btn btn-success">新增</a> @endif
            @if(Auth::guard('admin')->user()->checkPermission('role.delete')) <button disabled class="btn btn-danger remove">删除</button> @endif
        </div>
        <table id="table"></table>
    </div>
</div>
@endsection
@section('otherjs')
<script>
    $table = $('#table');
    $(".remove").click(function () {
        layer.confirm('确认删除?', {btn: ['是', '否']}, function () {
            layer.load(1, {shade: [0.1, '#fff']});
            var ids = getSelectionIds();
            layer.load(1, {shade: [0.1, '#fff']});
            $.post("{{url(config('admin.prefix').'/auth/role/batch_destroy')}}", {ids: ids}, function (res) {
                layer.closeAll();
                if (res.status == 1) {
                    layer.msg(res.msg, {icon: 1});
                    //移除行
                    $table.bootstrapTable('remove', {field: 'id', values: ids});
                } else {
                    layer.msg(res.msg, {icon: 5});
                }
            });
        });

    });

    //获取所有选中框的ids
    function getSelectionIds() {
        var selections = $table.bootstrapTable('getSelections');
        return $.map(selections, function (row) {
            return row.id
        });
    }

    function operateFormatter(value, row, index) {
        return [
                '',
                @if(Auth::guard('admin')->user()->checkPermission('role.edit'))  '<a class="edit btn btn-warning" href="javascript:void(0)" title="编辑">', '<i class="fa fa-edit"></i>', '</a>  ', @endif
                @if(Auth::guard('admin')->user()->checkPermission('role.create'))  '<a class="removeOne btn btn-danger" href="javascript:void(0)" title="删除">', '<i class="fa fa-trash"></i>', '</a>  ', @endif
                ''
        ].join('');
    }

    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            window.location.href = "{{url(config('admin.prefix').'/auth/role')}}" + '/' + row.id + '/edit';
        },
        'click .removeOne': function (e, value, row, index) {
            layer.confirm('确认删除?', {btn: ['是', '否']}, function () {
                layer.load(1, {shade: [0.1, '#fff']});
                $.ajax({
                    url: "{{url(config('admin.prefix').'/auth/role')}}" + '/' + row.id,
                    type: 'delete',
                    dataType: 'json',
                    success: function (res) {
                        layer.closeAll();
                        if (res.status == 1) {
                            layer.msg(res.msg, {icon: 1});
                            //移除行
                            $table.bootstrapTable('remove', {field: 'id', values: [row.id]});
                        } else {
                            layer.msg(res.msg, {icon: 5});
                        }
                    }
                });
            });
        }
    };

    $table.on('check.bs.table uncheck.bs.table ' +
        'check-all.bs.table uncheck-all.bs.table', function () {
            $(".remove").prop('disabled', !$table.bootstrapTable('getSelections').length);

            // save your data, here just save the current page
            selections = getSelectionIds();
            // push or splice the selections if you want to save all data selections
        });

    $table.bootstrapTable({
        url: "{{url(config('admin.prefix').'/auth/role')}}",
        search: true,
        sidePagination: 'server',
        pagination: true,
        showRefresh: true,
        showExport: true,
//        advancedSearch: true,//高级搜索
        toolbar: "#toolbar",
//        idTable:"table",
        columns: [
            {
                field: 'state',
                checkbox: true,
            }, {
                field: 'id',
                title: 'id'
            }, {
                field: 'name',
                title: '名称'
            }, {
                field: 'slug',
                title: '标识'
            },
            {
                field: 'created_at',
                title: '创建时间'
            }, {
                field: 'updated_at',
                title: '更新时间'
            }, {
                title: '操作',
                events: operateEvents,
                formatter: operateFormatter
            }
        ]
    });
</script>
@endsection