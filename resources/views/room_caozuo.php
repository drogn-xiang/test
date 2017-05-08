<link rel="stylesheet" href="../resources/views/css/create_room.css">
<div class="create_room">
    <table>
        <tr>
            <td><label for="caozuo_name">房间名:</label></td>
            <td><input disabled name="caozuo_name" id="caozuo_name" type="text"></td>
        </tr>
        <?php session_start(); if ($_SESSION['pow']){ ?>
        <script>
            var pow=1;
        </script>
        <tr>
            <td><label for="caozuo_mianji">面积:</label></td>
            <td><input name="caozuo_mianji" id="caozuo_mianji" type="text"></td>
        </tr>
        <tr>
            <td><label for="caozuo_chuangwei">床位:</label></td>
            <td><input name="caozuo_chuangwei" id="caozuo_chuangwei" type="text"></td>
        </tr>
        <tr>
            <td><label for="caozuo_kongtiao">空调:</label></td>
            <td>
                <select name="caozuo_kongtiao" id="caozuo_kongtiao">
                    <option value="1">有</option>
                    <option value="0">没有</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="caozuo_type">类型:</label></td>
            <td>
                <select name="caozuo_type" id="caozuo_type">
                    <option value="主题套房">主题套房</option>
                    <option value="普通房间">普通房间</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="caozuo_dress">楼层:</label></td>
            <td>
                <input name="caozuo_dress" id="caozuo_dress" type="text">
            </td>
        </tr>
        <tr>
            <td><label for="caozuo_dianshi">电视:</label></td>
            <td>
                <select name="caozuo_dianshi" id="caozuo_dianshi">
                    <option value="1">有</option>
                    <option value="0">没有</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="caozuo_cesuo">卫生间:</label></td>
            <td>
                <select name="caozuo_cesuo" id="caozuo_cesuo">
                    <option value="1">有</option>
                    <option value="0">没有</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="caozuo_price">价格:</label></td>
            <td><input name="caozuo_price" id="caozuo_price" type="text"></td>
        </tr>
        <?php }?>
    </table>
    <div>
        <h1>房间详情</h1>
        <textarea name="caozuo_err" id="caozuo_err" cols="40" >

        </textarea>
    </div>
    <div>
        <button id="caozuo_change">修改</button>
        <button id="caozuo_delete">删除</button>
    </div>
</div>

<script>
    $(function(){
        //加载页面数据
        $.ajax({
            type:'get',
            url:'http://localhost/hotel_test/public/roominfo/one',
            data:{
                roomname:Roomname
            },
            success:function(res){
                var info=JSON.parse(res);
                if(info.length){
                    //填充数据
                    $('#caozuo_name').val(info[0].name);
                    $('#caozuo_mianji').val(info[0].mianji);
                    $('#caozuo_dianshi').val(info[0].dianshi);
                    $('#caozuo_err').val(info[0].err);
                    $('#caozuo_kongtiao').val(info[0].kongtiao);
                    $('#caozuo_chuangwei').val(info[0].chuangwei);
                    $('#caozuo_cesuo').val(info[0].cesuo);
                    $('#caozuo_price').val(info[0].price);
                    $('#caozuo_checkin').val(info[0].checkin);
                    $('#caozuo_dress').val(info[0].dress);
                    $('#caozuo_type').val(info[0].type);
                }else{
                    $.messager.alert('系統提示','输入信息有误!');
                }
            },
            fail:function(){
                $.messager.alert('系統提示','服务器请求失败!');
            }
        })


        //绑定点击事件
        function login(){
            //获取表单的填写信息
            if(pow){
                var name=$('#caozuo_name').val().trim();
                var mianji=$('#caozuo_mianji').val().trim();
                var chuangwei=$('#caozuo_chuangwei').val().trim();
                var kongtiao=$('#caozuo_kongtiao').val().trim();
                var dianshi=$('#caozuo_dianshi').val().trim();
                var cesuo=$('#caozuo_cesuo').val().trim();
                var price=$('#caozuo_price').val().trim();
                var err=$('#caozuo_err').val();
                var type=$('#caozuo_type').val().trim();
                var dress=$('#caozuo_dress').val().trim();
                $.ajax({
                    type:'get',
                    url:'http://localhost/hotel_test/public/roominfo/change',
                    data:{
                        name:name,
                        mianji:mianji,
                        chuangwei:chuangwei,
                        kongtiao:kongtiao,
                        dianshi:dianshi,
                        cesuo:cesuo,
                        price:price,
                        err:err
                    },
                    success:function(res){
                        if(res == 1){
                            $.messager.alert('系統提示','提交成功!');
                        }else{
                            $.messager.alert('系統提示','提交失敗!');
                        }
                        $('#dg').datagrid('reload');
                    },
                    fail:function(){
                        $.messager.alert('系統提示','服务器请求失败!');
                    }
                });
            }else{
                var err=$('#caozuo_err').val().trim();
                var name=$('#caozuo_name').val().trim();
                $.ajax({
                    type:'get',
                    url:'http://localhost/hotel_test/public/roominfo/change',
                    data:{
                        err:err,
                        name:name
                    },
                    success:function(res){
                        if(res == 1){
                            $.messager.alert('系統提示','提交成功!');
                        }else{
                            $.messager.alert('系統提示','提交失敗!');
                        }
                        $('#dg').datagrid('reload');
                    },
                    fail:function(){
                        $.messager.alert('系統提示','服务器请求失败!');
                    }
                });
            }
        };

        function del(){
            $.ajax({
                type:'get',
                url:'http://localhost/hotel_test/public/roominfo/delete',
                data:{
                    change:Roomname
                },
                success:function(res){
                    $('#caozuo_delete').on('click',del);
                    if(res == 1){
                        $.messager.alert('系統提示','提交成功!');
                    }else{
                        $.messager.alert('系統提示','提交失敗!');
                    }
                    $('#dg').datagrid('reload');
                },
                fail:function(){
                    $('#caozuo_delete').on('click',del);
                    $.messager.alert('系統提示','服务请请求失败!');
                }
            });
        };

        $('#caozuo_change').on('click',login);
        $('#caozuo_delete').on('click',del);



    })
</script>