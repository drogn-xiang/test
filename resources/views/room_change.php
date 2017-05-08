<!--展示全部的客房信息,提供搜索,選擇的功能-->
<link rel="stylesheet" href="../resources/views/css/room_change.css">

<table id="dg" class="easyui-datagrid" title="客房信息"
       data-options="tools:'#tt',singleSelect:true,collapsible:true,url:'http://localhost/hotel_test/public/roominfo/all',method:'get'">
    <thead>
    <tr>
        <th data-options="field:'name',width:100,align:'center'">房间名</th>
        <th data-options="field:'mianji',width:100,align:'center'">面积</th>
        <th data-options="field:'price',width:100,align:'center'">价格</th>
        <th data-options="field:'kongtiao',width:100,align:'center'">空调</th>
        <th data-options="field:'cesuo',width:100,align:'center'">厕所</th>
        <th data-options="field:'dianshi',width:100,align:'center'">电视</th>
        <th data-options="field:'chuangwei',width:100,align:'center'">床位</th>
        <th data-options="field:'checkin',width:100,align:'center'">入住</th>
        <th data-options="field:'type',width:100,align:'center'">类型</th>
        <th data-options="field:'dress',width:100,align:'center'">位置</th>
        <th data-options="field:'err',width:100,align:'right'">提示</th>
    </tr>
    </thead>
</table>
<div id="tt">
    <input type="text" name="room_name" placeholder="请输入房间名">
    <a href="javascript:void(0)" class="icon-search room_search"></a>
</div>

<div id="win"></div>

<script>
    $(function(){
        $('#dg').datagrid({
            onClickRow: function (index, row){
                Roomname=row.name;
                //发送ajax请求,刷新
                $('#win').window({
                    title:'房间信息',
                    width:600,
                    height:800,
                    modal:true,
                    href:'http://localhost/hotel_test/public/room/caozuo'
                });
            }
        })

        //给面板的图标添加事件
        $('.room_search').on('click',function(){
            //获取输入的房间名进行刷新
            Roomname=$('input[name="room_name"]').val().trim();
            //发送ajax请求,刷新
            $('#win').window({
                title:'房间信息',
                width:600,
                height:800,
                modal:true,
                href:'http://localhost/hotel_test/public/room/caozuo'
            });
        });
        //重新渲染
        $.parser.parse($('#cont'));
    })
</script>
