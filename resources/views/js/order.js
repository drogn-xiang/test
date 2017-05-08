/**
 * Created by 香烟龙 on 2017/5/7.
 */
$(function(){
    //获取房间的信息
    $.ajax({
        type:'get',
        url:'http://localhost/hotel_test/public/roominfo/one',
        data:{
            roomname:Roomname
        },
        success:function(res){
            var info=JSON.parse(res);
            if(info.length){
                if(info[0].checkin){
                    $.messager.alert('系統提示','该房间还未退房!');
                }
                Price=info[0].price;
                $('#order_money').val(info[0].price);
                $('#order_room').val(info[0].name);
            }else{
                $.messager.alert('系統提示','系统错误!');
            }
        },
        fail:function(){
            $.messager.alert('系統提示','服务器请求失败!');
        }
    })

    //监听天数改变的事件，改变金额
    $('#order_time').change(function(even){
        var days=$('#order_time').val();
        $('#order_benjin').val(days*Price);
    })


    //绑定提交事件
    function login(){
        //获取填写数据
        var name=$('#order_name').val().trim();
        var id=$('#order_id').val().trim();
        var room=$('#order_room').val().trim();
        var yajin=$('#order_yajin').val().trim();
        var benjin=$('#order_benjin').val().trim();
        var time=$('#order_time').val().trim();
        var price=$('#order_money').val().trim();
        if(name&&id&&room&&yajin&&benjin&&time&&price){
            //校验，发送请求
            $.ajax({
                url:'http://localhost/hotel_test/public/orderinfo/create',
                type:'post',
                data:{
                    name:name,
                    id:id,
                    room:room,
                    yajin:yajin,
                    benjin:benjin,
                    room:room,
                    time:time
                },
                success:function (res) {
                    $('#order_login').on('click',login);
                    var info=JSON.parse(res);
                    if (info.length){
                        $.messager.alert('系統提示','提交失败!');
                        $('#dg').datagrid('reload');
                    }else{
                        $.messager.alert('系統提示','提交成功!');
                        $('#dg').datagrid('reload');
                    }
                },
                fail:function(){
                    $('#order_login').on('click',login);
                    $.messager.alert('系統提示','服务器请求失败!');
                }
            })
        }else{
            $.messager.alert('系統提示','全部参数为必填项!');
        }
    }

    $('#order_login').on('click',login);
})