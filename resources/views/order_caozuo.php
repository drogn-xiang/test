<link rel="stylesheet" href="../resources/views/css/create_order.css">
<script src="../resources/views/js/order.js"></script>
<div class="create_order">
    <table>
        <tr>
            <td><label for="order_room">房间名:</label></td>
            <td><input name="order_room" id="order_room" type="text" disabled></td>
        </tr>
        <tr>
            <td><label for="order_money">单价:</label></td>
            <td><input name="order_money" id="order_money" type="text" disabled></td>
        </tr>
        <tr>
            <td><label for="order_name">姓名:</label></td>
            <td><input name="order_name" id="order_name" type="text"></td>
        </tr>
        <tr>
            <td><label for="order_id">证件号:</label></td>
            <td><input name="order_id" id="order_id" type="text"></td>
        </tr>
        <tr>
            <td><label for="order_yajin">押金:</label></td>
            <td><input name="order_yajin" id="order_yajin" type="text"></td>
        </tr>
        <tr>
            <td><label for="order_time">天数:</label></td>
            <td><input name="order_time" id="order_time" type="text"></td>
        </tr>
        <tr>
            <td><label for="order_benjin">房租:</label></td>
            <td><input name="order_benjin" id="order_benjin" type="text" disabled></td>
        </tr>
    </table>
    <div>
        <button id="order_login">提交</button>
    </div>
</div>