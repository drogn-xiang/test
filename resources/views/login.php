<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <link rel="stylesheet" href="../resources/views/css/base.css">
    <link rel="stylesheet" href="../resources/views/css/login.css">
    <script src="../resources/lib/jquery-3.1.1.min.js"></script>
    <script src="../resources/views/js/login.js"></script>
</head>
<body>
    <div class="login">
        <h1 class="title">用户登录</h1>
        <table>
            <tr>
                <td><label for="username">用户名:</label></td>
                <td colspan="2"><input autocomplete="off" type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <td><label for="password">密码:</label></td>
                <td colspan="2"><input autocomplete="off" type="password" id="password" name="password">
            </tr>
            <tr>
                <td><label for="yzm">验证码:</label></td>
                <td><input type="text" id="yzm" name="yzm"  autocomplete="off"></td>
                <td><img src="../resources/lib/img.php" onclick="this.src='../resources/lib/img.php?Math.random()'" alt="点击刷新"></td>
            </tr>
        </table>
        <div id="info"></div>
        <div class="btn">
            <button id="login">登录</button>
            <button id="reset">重置</button>
        </div>
    </div>
</body>
</html>