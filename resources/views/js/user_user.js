/**
 * Created by 香烟龙 on 2017/5/4.
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
        $('#user_change').off('click');
        if(INP){
            //获取表单的信息
            var admin_pwd=$('input[name="user_pwd"]').val();
            var phone=$('input[name="phone"]').val();
            var cardno=$('input[name="cardno"]').val();
            if(admin_pwd && phone && cardno){
                $.ajax({
                    type:'post',
                    url:'http://localhost/hotel_test/public/userinfo/change',
                    data:{
                        user:INP,
                        admin_pwd:admin_pwd,
                        phone:phone,
                        id:cardno
                    },
                    success:function(res){
                        $('#user_change').on('click',login);
                        if(res == 1){
                            $.messager.alert('系統提示','提交成功!');
                        }else{
                            $.messager.alert('系統提示','提交失敗!');
                        }
                    },
                    fail:function(){
                        $('#user_change').on('click',login);
                        $.messager.alert('系統提示','服务器请求失败!');
                    }
                })
            }else{
                $('#user_change').on('click',login);
                $.messager.alert('系統提示','请正确填写!');
            }
        }

    }

    $('#user_change').on('click',login);

})