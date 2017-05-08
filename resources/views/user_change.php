<link rel="stylesheet" href="../resources/views/css/create_user.css">
<script src="../resources/views/js/change_user.js"></script>
<div class="create_user">
    <table>
        <tr>
            <td><label for="name">用户名:</label></td>
            <td><input name="name" id="name" type="text"></td>
        </tr>
        <tr>
            <td><label for="user">账户:</label></td>
            <td><input disabled name="user" id="user" type="text"></td>
        </tr>
        <tr>
            <td><label for="user_pwd">账户密码:</label></td>
            <td><input name="user_pwd" id="user_pwd" type="text"></td>
        </tr>
        <tr>
            <td><label for="phone">手机号:</label></td>
            <td><input name="phone" id="phone" type="text"></td>
        </tr>
        <tr>
            <td><label for="cardno">身份证:</label></td>
            <td><input name="cardno" id="cardno" type="text"></td>
        </tr>
        <tr>
            <td><label for="pow">权限:</label></td>
            <td>
                <select name="pow" id="pow">
                    <option value="1">管理员</option>
                    <option value="0">用户</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <div>
                    <button id="create_user">提交</button>
                    <button id="delete_user">删除</button>
                </div>
            </td>
        </tr>
    </table>
</div>