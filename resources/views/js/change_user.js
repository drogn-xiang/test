/**
 * Created by 香烟龙 on 2017/4/24.
 */
$(function(){
    //加载页面数据
    $.ajax({
        type:'post',
        url:'http://localhost/hotel_test/public/userinfo/find',
        data:{
            user:INP
        },
        success:function(res){
            var info=JSON.parse(res);
            if(info.length){
                //开始填充数据
                $('input[name="name"]').val(info[0].name);
                $('input[name="user"]').val(info[0].admin_name);
                $('input[name="user_pwd"]').val(info[0].admin_pwd);
                $('input[name="phone"]').val(info[0].phone);
                $('input[name="cardno"]').val(info[0].id);
                $('select[name="pow"]').val(info[0].pow);
            }else{
                $.messager.alert('系統提示','输入信息有误!');
            }
        },
        fail:function(){
            $.messager.alert('系統提示','服务器请求失败!');
        }
    })

    var login=function(){
        //解除绑定事件
        $('#create_user').off('click');
        if(INP){
            //获取填写表单
            var name=$('input[name="name"]').val();
            var admin_pwd=$('input[name="user_pwd"]').val();
            var phone=$('input[name="phone"]').val();
            var id=$('input[name="cardno"]').val();
            var pow=$('select[name="pow"]').val();

            $.ajax({
                type:'post',
                url:'http://localhost/hotel_test/public/userinfo/change',
                data:{
                    user:INP,
                    name:name,
                    admin_pwd:admin_pwd,
                    phone:phone,
                    id:id,
                    pow:pow
                },
                success:function(res){
                    $('#create_user').on('click',login);
                    if(res == 1){
                        $.messager.alert('系統提示','提交成功!');
                    }else{
                        $.messager.alert('系統提示','提交失敗!');
                    }
                    $('#dg').datagrid('reload');
                },
                fail:function(){
                    $('#create_user').on('click',login);
                    $.messager.alert('系統提示','服务器请求失败!');
                }
            })
        }

    }

    var del=function(){
        //解除绑定事件
        $('#delete_user').off('click');
        //发送请求
        if(INP){
            $.ajax({
                type:'post',
                url:'http://localhost/hotel_test/public/userinfo/del',
                data:{
                    user:INP
                },
                success:function(res){
                    $('#delete_user').on('click',del);
                    res=JSON.parse(res);
                    if (res.length==0){
                        $.messager.alert('系統提示','更改成功!');
                        //发送ajax请求,刷新
                        $('#dg').datagrid('reload');
                    }
                },
                fail:function(){
                    $('#delete_user').on('click',del);
                    $.messager.alert('系統提示','服务器请求失败!');
                }
            })
        }
    }

    //绑定按钮功能(删除,提交)
    $('#create_user').on('click',login);

    $('#delete_user').on('click',del);


})