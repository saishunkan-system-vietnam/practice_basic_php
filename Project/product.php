<?php 
    require './config/router.php';
    require FILE_PHP_MENUTOP;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sản phâm</title>
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
        $item_per_page = 12;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $products = $mysqli->query("SELECT * FROM t_product WHERE del_flg = 0 LIMIT " . $item_per_page . " OFFSET " . $offset) ;
        $totalRecords =  $mysqli->query("SELECT * FROM t_product WHERE del_flg = 0");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        // Đóng kết nối
        $mysqli -> close();
    ?>

    <div class="listProduct">
        <h1>Danh sách tất cả sản phẩm</h1>
        <hr>
        <?php while($row = $products->fetch_assoc()): ?>
        <div class="card">
            <form action=<?= FILE_PHP_ADDTOCART ?> id="from_cart" onsubmit="return checkLogin()" method="POST">
                <a href="./getProductById.php?id=<?= $row["id"] ?>">
                    <img src=<?= $row["avarta"];?> alt=<?= $row["name"] ?> style="width:200px; height:250px;">
                </a>
                <h3><?= $row["name"] ?></h3>
                <p class="price"><?= $row["price"].'K' ?></p>
                <input type="hidden" name="productId" value=<?= $row["id"] ?>>
                <input type="hidden" name="productName" value='<?= $row["name"] ?>'>
                <input type="hidden" name="productPrice" value=<?= $row["price"] ?>>
                <input type="hidden" name="productAvarta" value=<?= $row["avarta"] ?>>
                <p><input type="number" name="quantity" id="quantity" value="1"></p>
                <button type="submit" class="btncart" name="btnProduct"><i class="fa fa-shopping-cart"></i></button>
            </form>
        </div>
        <?php endwhile ; ?>
        <br>
        <div class="clear-both"></div>
        <?php include './pagination.php';?>
        <div class="clear-both"></div>

    </div>



    <script src=<?= FILE_JS_SLIDESHOW ?>></script>

    <!-- include footer -->
    <?php require FILE_PHP_FOOTER ?>
</body>