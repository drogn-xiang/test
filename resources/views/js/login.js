
/**
 * Created by 香烟龙 on 2017/3/12.
 */

$(function(){
    var login=function(){
        var username=$('#username').val().trim();
        var password=$('#password').val().trim();
        var yzm=$('#yzm').val().trim();
        if(username && password){
            if(yzm){
                $('#info').empty();
                $('#login').off('click');
                //发送请求
                $.ajax({
                    type: 'post',
                    url:'http://localhost/hotel_test/public/checkin',
                    data:{
                        username:username,
                        password:password,
                        yzm:yzm
                    },
                    success:function(res){
                        $('#login').on('click',login);
                        if(res.err==0){
                            $('#info').html('登录成功!');
                            setTimeout(function(){
                                window.location.href="http://localhost/hotel_test/public/admin";
                            },1000);
                        }else if(res.err==1){
                            $('#info').html('账户密码错误!');
                        }else{
                            $('#info').html('验证码错误!');
                        }
                    },
                    fail:function(){
                        $('#login').on('click',login);
                        $('#info').html('服务器错误!');
                    }
                });
            }else{
                $('#info').empty();
                $('#info').html('请输入验证码!');
            }
        }else{
            $('#info').empty();
            $('#info').html('请输入密码或用户名!');
        }
    }

    //绑定事件,登录按钮
    $('#login').on('click',login);

    //重置按钮
    $('#reset').on('click',function(){
        var username=$('#username').val('');
        var password=$('#password').val('');
        var yzm=$('#yzm').val('');
    });
})