<link rel="stylesheet" href="../resources/views/css/order_end.css">
<script src="../resources/views/js/order_end.js"></script>
<div class="end_order">
    <!--  展示房间号，用户信息，订单押金，预期赔偿  -->
    <table>
        <tr>
            <td><label for="order_room">房间名:</label></td>
            <td><input name="order_room" id="order_room" type="text" disabled></td>
        </tr>
        <tr>
            <td><label for="order_name">姓名:</label></td>
            <td><input name="order_name" id="order_name" type="text" disabled></td>
        </tr>
        <tr>
            <td><label for="order_id">证件号:</label></td>
            <td><input name="order_id" id="order_id" type="text" disabled></td>
        </tr>
        <tr>
            <td><label for="order_yajin">押金:</label></td>
            <td><input name="order_yajin" id="order_yajin" type="text" disabled></td>
        </tr>
        <tr>
            <td><label for="order_xiaofei">逾期费用:</label></td>
            <td><input name="order_xiaofei" id="order_xiaofei" type="text" disabled></td>
        </tr>
    </table>
    <div>
        <button id="order_login">提交</button>
    </div>
</div>