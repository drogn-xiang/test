$(function(){
    var time=function(){
        var date=new Date();
        //年 月 日 小时
        var year=date.getFullYear();
        var mouth=date.getMonth()+1;
        var time=date.getDate();
        var hour=date.getHours();
        var feng=date.getMinutes();
        var scend=date.getSeconds();
        var time="系统时间:"+year+"年"+mouth+"月"+time+"日 "+hour+":"+feng+":"+scend;
        $('#time').html(time);
    };

    //系统时间
    setInterval(time,1000);

    //绑定事件,事件委托
    document.onclick=function(ev){
        var target = ev.target || ev.srcElement;
        switch (target.innerText){
            case '重新登陆':{
                // //将$_Session的清空,刷新
                window.location.href='http://localhost/hotel_test/public/login';
            }
                break;
            case '退出':{
                var userAgent = navigator.userAgent;
                if (userAgent.indexOf("Firefox") != -1 || userAgent.indexOf("Chrome") !=-1) {
                    window.location.href="about:blank";
                } else {
                    window.opener = null;
                    window.open("", "_self");
                    window.close();
                }
            }
                break;
            case '新增客房':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/room/create');
            }
                break;
            case '信息更改':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/room/change');
            }
                break;
            case '客房报修':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/room/err');
            }
                break;
            case '创建订单':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/order/create');
            }
                break;
            case '订单操作':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/order/info');
            }
                break;
            case '新增用户':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/user/create');
            }
                break;
            case '用户信息':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/user/caozuo');
            }
                break;
            case '更改信息':{
                $('#cont').empty();
                $('#cont').load('http://localhost/hotel_test/public/user/user');
            }
                break;
        }
    }
})