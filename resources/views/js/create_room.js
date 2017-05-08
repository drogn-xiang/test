/**
 * Created by 香烟龙 on 2017/3/19.
 */
$(function(){
    function craete(){

        //获取用户填写信息
        var name=$('#room_name').val().trim();
        var mianji=$('#room_mianji').val().trim();
        var chuangwei=$('#room_chuangwei').val().trim();
        var kongtiao=$('#room_kongtiao').val().trim();
        var dianshi=$('#room_dianshi').val().trim();
        var cesuo=$('#room_cesuo').val().trim();
        var price=$('#room_price').val().trim();
        var err=$('#room_err').val().trim();
        var type=$('#room_type').val().trim();
        var dress=$('#room_dress').val().trim();
        //判断是否有错误信息
        if(dress && type && name && mianji && chuangwei && kongtiao && dianshi && cesuo && price){
            //发送请求
            $.ajax({
                type:'get',
                data:{
                    name:name,
                    mianji:mianji,
                    chuangwei:chuangwei,
                    kongtiao:kongtiao,
                    dianshi:dianshi,
                    cesuo:cesuo,
                    price:price,
                    err:err,
                    type:type,
                    dress:dress
                },
                url:'http://localhost/hotel_test/public/roominfo/create'
            }).done(function(res){
                if(res.length===0){
                    $.messager.alert('系統提示','提交成功!');
                }else{
                    $.messager.alert('系統提示','提交失敗!');
                }
            }).fail(function(){

                $.messager.alert('Warning','提交失敗!');

            });
        }else{
            $.messager.alert('Warning','请按要求填写');
        }
    }

    $('#create_room').on('click',craete);
})