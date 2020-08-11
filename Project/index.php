<?php 
    require_once './config/router.php';
    require_once FILE_PHP_MENUTOP;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE ?>>
</head>

<body>
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src=<?= FILE_IMG_BANNER1 ?> style="width:100%">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src=<?= FILE_IMG_BANNER2 ?> style="width:100%">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src=<?= FILE_IMG_BANNER3 ?> style="width:100%">
            <div class="text">Caption Three</div>
        </div>

    </div>
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <?php
    // Kết nối DataBase
    connect();

    // Select dữ liệu
    $result = $conn->query("SELECT * FROM t_product WHERE del_flg = 0 ORDER BY create_datetime DESC LIMIT 12");   

    // Đóng kết nối
    disconnect();
    ?>

    <div class="listProduct">
        <h1>Danh sách sản phẩm mới nhất</h1>
        <hr>

        <?php while($row = $result->fetch_assoc()): ?>

        <div class="card">
            <form action=<?= FILE_PHP_ADDTOCART ?> id="from_cart" onsubmit="return checkLogin()" method="POST">
                <a href="./getProductById.php?id=<?= $row["id"] ?>">
                    <img src=<?= $row["image"];?> alt=<?= $row["name"] ?> style="width:200px; height:250px;">
                </a>
                <h3><?= $row["name"] ?></h3>
                <p class="price"><?= $row["price"].'K' ?></p>
                <input type="hidden" name="productId" value=<?= $row["id"] ?>>
                <input type="hidden" name="productName" value='<?= $row["name"] ?>'>
                <input type="hidden" name="productPrice" value=<?= $row["price"] ?>>
                <input type="hidden" name="productImage" value=<?= $row["image"] ?>>
                <p><input type="number" name="quantity" id="quantity" value="1"></p>
                <button type="submit" name="btnIndex" class="btncart btn"><i class="fa fa-shopping-cart"></i></button>     
                
            </form>
        </div> 
        <?php endwhile ; ?>
        <br>
        <div class="clear-both"></div>
    </div>
    <div class="clear-both"></div>   
    <!-- include footer -->
    <?php include FILE_PHP_FOOTER ?>


    <script src=<?= FILE_JS_SLIDESHOW ?>></script>
</body>