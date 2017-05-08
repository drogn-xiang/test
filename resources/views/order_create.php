<link rel="stylesheet" href="../resources/views/css/create_order.css">
<script src="../resources/views/js/create_order.js"></script>

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
        <th data-options="field:'type',width:100,align:'center'">房间类型</th>
        <th data-options="field:'dress',width:100,align:'center'">房间楼层</th>
        <th data-options="field:'err',width:100,align:'right'">提示</th>
    </tr>
    </thead>
</table>
<div id="tt">
    <a href="javascript:void(0)" class="icon-search room_search" title="搜索"></a>
    <a href="javascript:void(0)" class="icon-print room_checkin" title="已入住"></a>
    <a href="javascript:void(0)" class="icon-add room_checkout" title="未入住"></a>
    <a href="javascript:void(0)" class="icon-reload room_reload" title="刷新"></a>
</div>

<div id="win"></div>

