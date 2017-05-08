<link rel="stylesheet" href="../resources/views/css/create_order.css">
<script src="../resources/views/js/order_info.js"></script>

<table id="dg" class="easyui-datagrid" title="客房信息"
       data-options="tools:'#tt',singleSelect:true,collapsible:true,url:'http://localhost/hotel_test/public/orderinfo/all',method:'post'">
    <thead>
    <tr>
        <th data-options="field:'order_id',width:50,align:'center'">订单号</th>
        <th data-options="field:'name',width:100,align:'center'">姓名</th>
        <th data-options="field:'id',width:150,align:'center'">证件号</th>
        <th data-options="field:'yajin',width:150,align:'center'">押金</th>
        <th data-options="field:'room_name',width:100,align:'center'">房间名</th>
        <th data-options="field:'time',width:50,align:'center'">天数</th>
        <th data-options="field:'time_in',width:150,align:'center'">入住时间</th>
        <th data-options="field:'time_out',width:150,align:'center'">结账时间</th>
    </tr>
    </thead>
</table>
<div id="tt">
    <a href="javascript:void(0)" class="icon-search order_search" title="搜索"></a>
    <a href="javascript:void(0)" class="icon-print order_end" title="完成訂單"></a>
    <a href="javascript:void(0)" class="icon-add order_ing" title="未完成訂單"></a>
    <a href="javascript:void(0)" class="icon-reload order_bad" title="逾期未結"></a>
    <a href="javascript:void(0)" class="icon-reload order_reload" title="刷新"></a>
</div>

<div id="win"></div>