<?php
    require './config/router.php';
    require FILE_PHP_MENUTOP;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_PRODUCTDETAIL ?>>
</head>

<body>
    <?php
     if (isset($_GET["id"])) {
        $productId = $_GET["id"];
        $result = $mysqli->query("SELECT * FROM t_product WHERE id = $productId AND del_flg = 0");
    }
    // Đóng kết nối
    $mysqli -> close();
    ?>

    <?php while($row = $result->fetch_assoc()): ?>
    <div class="productDetail">
        <form action=<?= FILE_PHP_ADDTOCART ?> onsubmit="return checkLogin()" method="POST">
            <table class="productDTable">
                <tr>
                    <th style="width: 50%;"></th>
                    <th style="width: 50%;"></th>
                </tr>
                <tr>
                    <td><img src=<?= $row["avarta"]?> alt=""></td>
                    <td>
                        <h2><?= $row["name"]?></h2>
                        <h4>Xuất xứ: <?= $row["origin"]?></h4>
                        <h4>Dung tích: <?= $row["capacity"]?></h4>
                        <h4>Giá: <?= $row["price"]?> K</h4>
                        <p><?= $row["describe_product"]?></p>
                        <p><input type="number" name="quantity" id="quantityTable" value="1" max="100" min="1"></p>
                        <button type="submit" class="btncart" name="btnDetail" id="btnAddCart"><i class="fa fa-shopping-cart"> Thêm vào
                                giỏ
                                hàng</i></button>

                        <li>Ngay sau khi quý khách đặt hàng và thanh toán, HNCmua sẽ đặt hàng sản phẩm và vận chuyển
                            về Việt Nam.</li>
                        <li>Thời gian giao hàng dự kiến từ 6 - 8 ngày làm việc kể từ khi hàng về đến kho HNC tại
                            nước ngoài.</li>
                        <li>Giá trên đã bao gồm phí mua hộ, chưa bao gồm thuế và phí vận chuyển (nếu
                            có) ở nước ngoài và cước vận chuyển về Việt Nam. Miễn phí giao hàng nội thành
                            Hà Nội và Hồ Chí Minh.</li>

                    </td>
                </tr>
            </table>
            <input type="hidden" name="productId" value=<?= $row["id"] ?>>
            <input type="hidden" name="productName" value='<?= $row["name"] ?>'>
            <input type="hidden" name="productPrice" value=<?= $row["price"] ?>>
            <input type="hidden" name="productAvarta" value=<?= $row["avarta"] ?>>

        </form>
    </div>
    
    <div  class="viewNote">
    <p><?= $row["note"] ?></p>
    </div>
    <?php endwhile ; ?>

    <script src=<?= FILE_JS_SLIDESHOW ?>></script>
    <!-- include footer -->
    <?php require FILE_PHP_FOOTER ?>
</body>

</html>