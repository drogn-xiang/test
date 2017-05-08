<!--展示全部的客房信息,提供搜索,選擇的功能-->
<link rel="stylesheet" href="../resources/views/css/room_change.css">

<table id="dg" class="easyui-datagrid" title="用户信息"
       data-options="tools:'#tt',singleSelect:true,collapsible:true,url:'http://localhost/hotel_test/public/userinfo/all',method:'post'">
    <thead>
    <tr>
        <th data-options="field:'name',width:100,align:'center'">用户名</th>
        <th data-options="field:'admin_name',width:100,align:'center'">账户</th>
        <th data-options="field:'admin_pwd',width:100,align:'center'">密码</th>
        <th data-options="field:'phone',width:100,align:'center'">手机号</th>
        <th data-options="field:'id',width:100,align:'center'">身份证</th>
        <th data-options="field:'pow',width:100,align:'center'">权限</th>
    </tr>
    </thead>
</table>
<div id="tt">
    <input type="text" name="user_name" placeholder="请输入账户名">
    <a href="javascript:void(0)" class="icon-search room_search"></a>
</div>

<div id="win"></div>

<script>
    $(function(){
        $('#dg').datagrid({
            onClickRow: function (index, row){
                //发送ajax请求,刷新
                INP=row.admin_name;
                $('#win').window({
                    title:'用户信息',
                    width:600,
                    height:800,
                    modal:true,
                    href:'http://localhost/hotel_test/public/user/change'
                });
            }
        })

        //给面板的图标添加事件
        $('.room_search').on('click',function(){
            //获取输入的房间名进行刷新
            INP=$('input[name="user_name"]').val().trim();
            //发送ajax请求,刷新
            $('#win').window({
                title:'用户信息',
                width:600,
                height:800,
                modal:true,
                href:'http://localhost/hotel_test/public/user/change'
            });
        });
        //重新渲染
        $.parser.parse($('#cont'));
    })
</script>
