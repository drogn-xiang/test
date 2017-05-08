<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- 引入easyui,jq -->
    <script src="../resources/lib/jquery-3.1.1.min.js"></script>
    <script src="../resources/lib/jquery-easyui-1.5.1/jquery.easyui.min.js"></script>
    <script src="../resources/lib/jquery-easyui-1.5.1/locale/easyui-lang-zh_CN.js"></script>
    <link rel="stylesheet" href="../resources/lib/jquery-easyui-1.5.1/themes/default/easyui.css">
    <link rel="stylesheet" href="../resources/lib/jquery-easyui-1.5.1/themes/icon.css">
    <!--  基础样式 -->
    <link rel="stylesheet" href="../resources/views/css/base.css">
    <script src="../resources/views/js/admin.js"></script>
    <link rel="stylesheet" href="../resources/views/css/admin.css">
    <title>欢迎登录!<?php echo $_SESSION['name']?></title>
</head>
<body class="easyui-layout">
<div data-options="region:'north',split:true" style="height:50px;">
    <div id="time"></div>
    <div class="top_link">
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">重新登陆</a>
        <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-search'">退出</a>
    </div>
</div>
<div data-options="region:'south',split:true" style="height:60px;">
    <h1 class="link_title">小小链接</h1>
    <div class="link_cont">
        <a href="#">链接</a>
        <a href="#">链接</a>
        <a href="#">链接</a>
        <a href="#">链接</a>
        <a href="#">链接</a>
        <a href="#">链接</a>
        <a href="#">链接</a>
    </div>
</div>
<div data-options="region:'west',title:'用户操作',split:true" style="width:100px;">
    <div class="easyui-accordion" style="width:100%;" data-options="fit:true">
        <div title="客房管理" data-options="iconCls:'icon-save'">
            <?php if($_SESSION['pow']){?>
            <div class="cont_btn">新增客房</div>
            <?php }?>
            <div class="cont_btn">信息更改</div>
        </div>
        <div title="订单管理" data-options="iconCls:'icon-reload',selected:true">
            <div class="cont_btn">创建订单</div>
            <div class="cont_btn">订单操作</div>
        </div>
        <div title="用户管理">
            <?php if($_SESSION['pow']){?>
            <div class="cont_btn">新增用户</div>
            <div class="cont_btn">用户信息</div>
            <?php }else{?>
            <div class="cont_btn">更改信息</div>
            <?php }?>
        </div>
    </div>
</div>
<div id="cont" data-options="region:'center',title:'操作界面'" style="padding:5px;background:#eee;"></div>
</body>
</html>