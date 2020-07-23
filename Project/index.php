<?php 
    require './config/router.php';
    require FILE_PHP_HEADER;
?>

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
<h1>Danh sách sản phẩm mới nhất</h1>
<hr>
<?php
    // Select dữ liệu
    $result = $mysqli->query("SELECT * FROM `product` ORDER BY `product`.`production_time` DESC LIMIT 12");   
    
    // Đóng kết nối
    $mysqli -> close();
?>
<?php while($row = $result->fetch_assoc()): ?>
<div class="card">
    <img src=<?= $row["avarta"];?> alt="Denim Jeans" style="width:200px; height:250px;">
    <h3><?= $row["name"] ?></h3>
    <p class="price"><?= $row["price"].'K' ?></p>
    <p><?= $row["note"] ?></p>
    <p><button>Add to Cart</button></p>
</div>
<?php endwhile ; ?>


<link rel="stylesheet" href=<?= FILE_CSS_STYLE ?>>
<script src=<?= FILE_JS_SLIDESHOW ?>></script>
</body>

<!-- include footer -->
<?php require FILE_PHP_FOOTER ?>