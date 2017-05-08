<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function test(Request $request){
        session_start();
        //连接数据库,判断是否验证码正确
        $username = $request->input('username','');
        $password = $request->input('password','');
        $yzm = $request->input('yzm','');
        //校验验证码
        $value = $_SESSION['code'];
        if($value===$yzm){
            //链接数据库
            $results = app('db')->select("SELECT * FROM admin WHERE admin_name='{$username}' and admin_pwd='{$password}'");
            //判断数组长度
            if(count($results)){
                $_SESSION['pow']=$results[0]->pow;
                $_SESSION['name']=$results[0]->name;
                $_SESSION['user']=$results[0]->admin_name;
                $_SESSION['id']=$results[0]->id;
                return response()->json(['err' => '0']);
            }else{
                return response()->json(['err' => '1']);
            }
        }else{
            return response()->json(['err' => '2']);
        }
    }
    //
    public function user(Request $request,$type){
        switch ($type){
            case 'create':{
                return view('user_create');
            }
                break;
            case 'caozuo':{
                //判断权限,用户只能看和更改自己的信息
                return view('user_caozuo');
            }
                break;
            case 'change':{
                //判断权限,用户只能看和更改自己的信息
                return view('user_change');
            }
                break;
            case 'user':{
                //判断权限,用户只能看和更改自己的信息
                return view('user_user');
            }
                break;

        }
    }

    public function userinfo(Request $request,$info){
        switch ($info){
            case 'create':{
                //获取传来的参数,校验后插入数据库
                $admin_name=$request->input('admin_name','');
                $id=$request->input('id','');
                $name=$request->input('name','');
                $pow=$request->input('pow','');
                $phone=$request->input('phone','');
                //校验身份证,电话号码
                $is_id="/^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/";
                $is_phone="/^1[34578]\d{9}$/";
                $is_id=preg_match($is_id,$id);
                $is_phone=preg_match($is_phone,$phone);
                if($is_id && $is_phone){
                    $results = app('db')->select("INSERT INTO `hotel`.`admin` (`name`, `admin_name`, `id`, `phone`, `pow`) VALUES ('{$name}','{$admin_name}','{$id}','{$phone}','{$pow}')");
                    return $results;
                }else{
                    return json_encode(array(err=>1,title=>'填写格式不正确'));
                }
            }
                break;
            case 'all':{
                $results = app('db')->select("select * from admin");
                $total=count($results);
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;
            case 'find':{
                $user=$request->input('user','');
                //查询数据库是否存在该条信息
                $results = app('db')->select('select count(*) from admin where admin_name="'.$user.'"');
                if ($results){
                    //查询该条信息
                    $results = app('db')->select('select * from admin where admin_name="'.$user.'"');
                    echo json_encode($results);
                }else{
                    //没有该条信息
                    echo 0;
                }
            }
                break;

            case 'change':{
                session_start();
                //判断权限
                $arr=array();
                if($_SESSION['pow']){
                    //是管理员权限能够任意更改信息
                    $arr['name']=$request->input('name','');
                    $arr['admin_name']=$request->input('user','');
                    $arr['admin_pwd']=$request->input('admin_pwd','');
                    $arr['phone']=$request->input('phone','');
                    $arr['id']=$request->input('id','');
                    $arr['pow']=$request->input('pow','');
                    //遍历数组
                    $str = '';
                    foreach($arr as $key=>$value){
                        $str.=','.$key.'="'.$value.'"';
                    }
                    $str=substr($str,1);
                }else{
                    //使用者权限,仅能修改自己的部分信息
                    $arr['admin_pwd']=$request->input('admin_pwd','');
                    $arr['phone']=$request->input('phone','');
                    $arr['id']=$request->input('id','');
                    $arr['admin_name']=$request->input('user','');
                    if(!($arr['admin_pwd']&&$arr['phone']&&$arr['id']&&$arr['admin_name'])){
                        exit(2);
                    }
                    $str = '';
                    foreach($arr as $key=>$value){
                        $str.=','.$key.'="'.$value.'"';
                    }
                    $str=substr($str,1);
                }
                //获取参数
                $sql = 'UPDATE admin SET '.$str.' WHERE admin_name="'.$arr['admin_name'].'"';
                $user = app('db')->update($sql);
                if ($user){
                    echo 1;
                }else{
                    echo 0;
                }

            }
                break;

            case 'del':{
                //判断权限是否删除
                session_start();
                $user=$request->input('user','');
                if($_SESSION['pow']){
                    $user=$request->input('user','');
                    $results = app('db')->select('delete from admin where admin_name="'.$user.'"');
                    echo json_encode($results);
                }
            }
                break;
        }
    }

    public function room(Request $request,$type){
        switch ($type){
            case 'create':{
                return view('room_create');
            }
                break;
            case 'caozuo':{
                $name = $request->input('name','');
                return view('room_caozuo');
            }
                break;
            case 'change':{
                return view('room_change');
            }
                break;
            case 'err':{
                return view('room_err');
            }
                break;
        }
    }

    public function roominfo(Request $request,$info){
        //操作
        switch ($info){
            case 'create':{
                session_start();
                if($_SESSION['pow']){
                    //参数
                    $name=$request->input('name','');
                    $mianji=$request->input('mianji','');
                    $chuangwei=$request->input('chuangwei','');
                    $dianshi=$request->input('dianshi','');
                    $cesuo=$request->input('cesuo','');
                    $price=$request->input('price','');
                    $err=$request->input('err','');
                    $kongtiao=$request->input('kongtiao','');
                    $dress=$request->input('dress','');
                    $type=$request->input('type','');
                    //数据库操作
                    // $results = app('db')->insert("insert into room ('name','mianji','chuangwei','dianshi','cesuo','price','kongtiao','err') VALUES ({$name},{$mianji},{$chuangwei},{$dianshi},{$cesuo},{$price},{$kongtiao},{$err})");
                    $results = app('db')->select("INSERT INTO `hotel`.`room` (`name`, `mianji`, `chuangwei`, `kongtiao`, `dianshi`, `cesuo`, `err`, `price`,`dress`,`type`) VALUES ('{$name}','{$mianji}','{$chuangwei}','{$kongtiao}','{$dianshi}','{$cesuo}','{$err}','{$price}','{$dress}','{$type}')");
                    return $results;
                }
            }
                break;

            case 'all':{
                $results = app('db')->select("select * from room");
                $total=count($results);
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;

            case 'one':{
                $name=$request->input('roomname','');
                $room = app('db')->select("select * from room where name='".$name."'");
                return json_encode($room);
            }
                break;

            case 'change':{
                //判断权限
                session_start();
                $arr=array();
                $arr['err']=$request->input('err','');
                $pow = $_SESSION['pow'] ? $_SESSION['pow'] : 0;
                $arr['name']=$request->input('name','');
                if($pow){
                    //是管理员权限能够任意更改信息
                    $arr['mianji']=$request->input('mianji','');
                    $arr['chuangwei']=$request->input('chuangwei','');
                    $arr['dianshi']=$request->input('dianshi','');
                    $arr['cesuo']=$request->input('cesuo','');
                    $arr['price']=$request->input('price','');
                    $arr['kongtiao']=$request->input('kongtiao','');
                    //遍历数组
                    $str = '';
                    foreach($arr as $key=>$value){
                        $str.=','.$key.'="'.$value.'"';
                    }
                    $str=substr($str,1);
                }else{
                    //使用者权限,仅能保修
                    $str = '';
                    foreach($arr as $key=>$value){
                        $str.=','.$key.'="'.$value.'"';
                    }
                    $str=substr($str,1);
                }
                //获取参数
                $sql = 'UPDATE room SET '.$str.' WHERE name="'.$arr['name'].'"';
                $room = app('db')->update($sql);
                if ($room){
                    echo 1;
                }else{
                    echo 0;
                }
            }
                break;

            case 'delete':{
                //首先判断是否有权限
                session_start();
                if($_SESSION['pow']){
                    $room_name=$request->input('change','');
                    $sql = 'DELETE FROM room WHERE name="'.$room_name.'"';
                    $room = app('db')->delete($sql);
                    if($room){
                        echo 1;
                    }else{
                        echo 0;
                    }
                }else{
                    echo 0;
                }

            }
                break;
        }
    }

    public function order(Request $request,$type){
        switch ($type){
            case 'create':{
                return view('order_create');
            }
                break;
            case 'caozuo':{
                return view('order_caozuo');
            }
                break;
            case 'info':{
                return view('order_info');
            }
                break;
            case 'jiezhao':{
                return view('order_jiezhao');
            }
                break;
        }
    }

    public function orderinfo(Request $request,$info){
        switch ($info){
            case 'checkin':{
                $results = app('db')->select("select * from room where checkin='1'");
                $total=count($results);
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;
            case 'checkout':{
                $results = app('db')->select("select * from room where checkin='0'");
                $total=count($results);
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;
            case 'create':{
                $id=$request->input('id','');
                $name=$request->input('name','');
                $yajin=$request->input('yajin','');
                $benjin=$request->input('benjin','');
                $room=$request->input('room','');
                $time=$request->input('time','');
                $time_in=time();
                //校验后插入数据库
                //将房间的入住信息改为已入住
                //判断是否已经入住
                $checkin = app('db')->select("select count(*) from room where name='".$room."' and checkin='0'");
                if ($checkin[0]){
                    session_start();
                    $results1 = app('db')->select("update room set checkin='1' where name='".$room."'");
                    $results2 = app('db')->select("INSERT INTO `hotel`.`checkin` (`start_admin`,`time_in`,`name`, `id`, `benjin`, `yajin`, `room_name`, `time`) VALUES ('{$_SESSION["name"]}','{$time_in}','{$name}','{$id}','{$benjin}','{$yajin}','{$room}','{$time}')");
                    return json_encode(array('results1'=>$results1,'results2'=>$results2));
                }else{
                    return json_encode(array('err'=>1));
                }
            }
                break;
            case 'all':{
                $results = app('db')->select("select * from checkin");
                $total=count($results);
                //遍历时间戳
                for ($i=0;$i<$total;$i++){
                    $date=date('Y-m-d H:i:s', $results[$i]->time_in);
                    $results[$i]->time_in=$date;
                    if($results[$i]->time_out){
                        $date=date('Y-m-d H:i:s', $results[$i]->time_out);
                        $results[$i]->time_out=$date;
                    }else{
                        $results[$i]->time_out='nall';
                    }
                }
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;
            case 'end':{
                $results = app('db')->select("select * from checkin where time_out!=''");
                $total=count($results);
                //遍历时间戳
                for ($i=0;$i<$total;$i++){
                    $date=date('Y-m-d H:i:s', $results[$i]->time_in);
                    $results[$i]->time_in=$date;
                    if($results[$i]->time_out){
                        $date=date('Y-m-d H:i:s', $results[$i]->time_out);
                        $results[$i]->time_out=$date;
                    }else{
                        $results[$i]->time_out='nall';
                    }
                }
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;
            case 'ing':{
                $results = app('db')->select("select * from checkin where time_out is null");
                $total=count($results);
                //遍历时间戳
                for ($i=0;$i<$total;$i++){
                    $date=date('Y-m-d H:i:s', $results[$i]->time_in);
                    $results[$i]->time_in=$date;
                    if($results[$i]->time_out){
                        $date=date('Y-m-d H:i:s', $results[$i]->time_out);
                        $results[$i]->time_out=$date;
                    }else{
                        $results[$i]->time_out='nall';
                    }
                }
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;
            case 'bad':{
                //逾期未结算的订单需要对时间戳进行对比
                //一天的秒数
                $days=24*60*60;
                //当前的时间戳
                $daybegin=strtotime(date("Ymd"));
                $dayend=$daybegin+$days;
                $results = app('db')->select("select * from checkin where time_in+(time*".$days.")<=".$dayend."");
                $total=count($results);
                //遍历时间戳
                for ($i=0;$i<$total;$i++){
                    $date=date('Y-m-d H:i:s', $results[$i]->time_in);
                    $results[$i]->time_in=$date;
                    if($results[$i]->time_out){
                        $date=date('Y-m-d H:i:s', $results[$i]->time_out);
                        $results[$i]->time_out=$date;
                    }else{
                        $results[$i]->time_out='nall';
                    }
                }
                return json_encode(array('total'=>$total,'rows'=>$results));
            }
                break;
            case 'orderend':{
                $order_id=$request->input('order_id','');
                $results = app('db')->select("select * from checkin where order_id=".$order_id);
                //判断是否预期，预期后需要支付的金额
                $start=$results[0]->time_in;
                $time=$results[0]->time;
                $days=24*60*60;
                $daybegin=strtotime(date("Ymd"));
                if(($start+$time*$days)<$daybegin){
                    //判断预期多久
                    $out_days=($daybegin-($start+$time*$days))/$days;
                    //房间的单价
                    $price=($results[0]->benjin)/($results[0]->time);
                    $results[0]->xiaofei=$out_days*$price;
                }
                return json_encode(array(
                    'data'=>$results
                ));
            }
                break;
            case 'out':{
                session_start();
                $xiaofei=$request->input('xiaofei','');
                $order_id=$request->input('order_id','');
                $room_name=$request->input('room_name','');
                $results1 = app('db')->select("update checkin set xiaofei='".$xiaofei."',end_admin='".$_SESSION['name']."',time_out='".time()."' where order_id=".$order_id);
                $results2 = app('db')->select("update room set checkin=0 where name='".$room_name."'");
                return json_encode(array(
                    'results1'=>$results1,
                    'results2'=>$results2
                ));
            }
                break;
        }
    }
}
