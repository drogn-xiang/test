<link rel="stylesheet" href="../resources/views/css/create_room.css">
<script src="../resources/views/js/create_room.js"></script>
<div class="create_room">
    <table>
        <tr>
            <td><label for="room_name">房间名:</label></td>
            <td><input name="room_name" id="room_name" type="text"></td>
        </tr>
        <tr>
            <td><label for="room_mianji">面积:</label></td>
            <td><input name="room_mianji" id="room_mianji" type="text"></td>
        </tr>
        <tr>
            <td><label for="room_chuangwei">床位:</label></td>
            <td><input name="room_chuangwei" id="room_chuangwei" type="text"></td>
        </tr>
        <tr>
            <td><label for="room_kongtiao">空调:</label></td>
            <td>
                <select name="room_kongtiao" id="room_kongtiao">
                    <option value="1">有</option>
                    <option value="0">没有</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="room_type">类型:</label></td>
            <td>
                <select name="room_type" id="room_type">
                    <option value="主题套房">主题套房</option>
                    <option value="普通房间">普通房间</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="room_dress">楼层:</label></td>
            <td>
                <input name="room_dress" id="room_dress" type="text">
            </td>
        </tr>
        <tr>
            <td><label for="room_dianshi">电视:</label></td>
            <td>
                <select name="room_dianshi" id="room_dianshi">
                    <option value="1">有</option>
                    <option value="0">没有</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="room_cesuo">卫生间:</label></td>
            <td>
                <select name="room_cesuo" id="room_cesuo">
                    <option value="1">有</option>
                    <option value="0">没有</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="room_price">价格:</label></td>
            <td><input name="room_price" id="room_price" type="text"></td>
        </tr>
    </table>
    <div>
        <h1>房间详情</h1>
        <textarea name="room_err" id="room_err">

        </textarea>
    </div>
    <div>
        <button id="create_room">提交</button>
    </div>
</div>