/**
 * Created by 香烟龙 on 2017/5/5.
 */
$(function(){
    $('#dg').datagrid({
        onClickRow: function (index, row){
            Roomname=row.name;
            //发送ajax请求,刷新
            $('#win').window({
                title:'创建订单',
                width:600,
                height:800,
                modal:true,
                href:'http://localhost/hotel_test/public/order/caozuo'
            });
        }
    })

    //给面板的图标添加事件
    //条件筛选
    $('.room_search').on('click',function(){

    })

    //已经入住
    $('.room_checkin').on('click',function(){
        $('#dg').datagrid({
            url:"http://localhost/hotel_test/public/orderinfo/checkin",
            method:"post"
        });
    })

    //未入住
    $('.room_checkout').on('click',function(){
        $('#dg').datagrid({
            url:"http://localhost/hotel_test/public/orderinfo/checkout",
            method:"post"
        });
    })

    //刷新
    $('.room_reload').on('click',function(){
        $('#dg').datagrid({
            url:"http://localhost/hotel_test/public/roominfo/all",
            method:"get"
        });
    })

    //重新渲染
    $.parser.parse($('#cont'));
})