/**
 * Created by 香烟龙 on 2017/5/8.
 */
$(function(){
    //获取订单的信息
    $.ajax({
        type:'post',
        data:{
            order_id:Order_id
        },
        url:'http://localhost/hotel_test/public/orderinfo/orderend',
        success:function(res){
            //填充数据
            var obj=JSON.parse(res);
            $('#order_room').val(obj.data[0].room_name);
            $('#order_name').val(obj.data[0].name);
            $('#order_yajin').val(obj.data[0].yajin);
            $('#order_xiaofei').val(obj.data[0].xiaofei);
            $('#order_id').val(obj.data[0].id);
        },
        fail:function(){
            $.messager.alert('Warning','服务器请求失败！');
        }
    })

    function login(){
        //获取消费
        var xiaofei=$('#order_xiaofei').val();
        var room_name=$('#order_room').val();
        $.ajax({
            type:'post',
            data:{
                order_id:Order_id,
                xiaofei:xiaofei,
                room_name:room_name
            },
            url:'http://localhost/hotel_test/public/orderinfo/out',
            success:function(res){
                var obj=JSON.parse(res);
                if(obj.length){
                    $.messager.alert('Warning','订单处理失败！');

                }else{
                    $.messager.alert('Warning','订单处理成功！');
                }
            },
            fail:function(){
                $.messager.alert('Warning','服务器请求失败！');
            }
        })
    }

    //绑定提交
    $('#order_login').on('click',login)

})