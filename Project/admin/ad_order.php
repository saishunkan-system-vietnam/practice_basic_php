<?php
require_once '../config/router.php';
require_once FILE_PHP_CONFIG;
require_once FILE_PHP_HEADERAD;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order</title>
    <link rel="stylesheet" href=<?= LINK_ICON ?>>
    <script src=<?= LINK_JQUERY ?>></script>
</head>

<body>
    <div class="main-content">
        <h1>Danh đơn hàng</h1>
        <div class="main-order searchOrder">
            <div class="search order">
                <h2>Danh sách đơn hàng</h2>
                <div class="search label"><label for="">Tìm kiếm đơn hàng: </label></div>
                <div class="search input"><input type="text" class="inpSearch inp" id="inpSearchOrder" placeholder="Nhập id đơn hàng "></div>
                <div class="search button"><button type="submit" class="btnSearch btn" id="btnSearchOrder">Tìm kiếm</button></div>
            </div>
            <div class="clear-both"></div>
            <div class="contentOrder" id="order_listorder">
                
            </div>
        </div>

        <div class="clear-both"></div>

        <div class="main-order addProduct">
            <div id="order_listproduct">

            </div>
            <div id="order_orderDetail">

            </div>
        </div>
    </div>


    <script src=<?= FILE_JS_COMMON ?>></script>
    <script src=<?= FILE_JS_ORDERAD ?>></script>
</body>

</html>