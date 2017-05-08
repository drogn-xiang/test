/**
 * Created by 香烟龙 on 2017/4/12.
 */
$(function(){
    $('#create_user').on('click',function(){
        //获取表单数据
        var name=$('#name').val().trim();
        var user=$('#user').val().trim();
        var phone=$('#phone').val().trim();
        var cardno=$('#cardno').val().trim();
        var pow=$('#pow').val().trim();
        if(name&&user&&phone&&cardno&&pow){
            //校验身份证,电话号码格式
            var id_reg=/^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/;
            var phone_reg=/^1[34578]\d{9}$/;
            var is_id=id_reg.test(cardno);
            var is_phone=phone_reg.test(phone);
            if (is_id && is_phone){
                //发送请求
                $.ajax({
                    url:'http://localhost/hotel_test/public/userinfo/create',
                    type:'post',
                    data:{
                        admin_name:user,
                        id:cardno,
                        name:name,
                        pow:pow,
                        phone:phone
                    },
                    success:function(res){
                        if(res.length===0){
                            $.messager.alert('系統提示','提交成功!');
                        }else{
                            $.messager.alert('系統提示','提交失敗!');
                        }
                    },
                    fail:function(){
                        $.messager.alert('Warning','服务器请求错误!');
                    }
                })
            }else{
                $.messager.alert('Warning','手机或身份证格式错误');
            }
        }else{
            $.messager.alert('Warning','请按要求填写');
        }
    })
})