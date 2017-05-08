<link rel="stylesheet" href="../resources/views/css/create_user.css">
<script src="../resources/views/js/create_user.js"></script>
<div class="create_user">
    <table>
        <tr>
            <td><label for="name">用户名:</label></td>
            <td><input name="name" id="name" type="text"></td>
        </tr>
        <tr>
            <td><label for="user">账户:</label></td>
            <td><input name="user" id="user" type="text"></td>
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
                </div>
            </td>
        </tr>
    </table>
</div>