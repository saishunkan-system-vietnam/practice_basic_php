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
<h1>Danh sách tất cả sản phẩm</h1>
<hr>
<?php
    // TÌM TỔNG SỐ RECORDS
    $sql = "SELECT count(id) as total FROM product";
    $result = $mysqli->query($sql) or die ($mysqli->error);
    $row = $result->fetch_assoc();
    $total_records = $row['total'];

    // TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 12;

    // TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    
    // Tìm Start
    $start = ($current_page - 1) * $limit;

    // Select dữ liệu
    $result = $mysqli->query("SELECT * FROM product LIMIT $start, $limit") or die ($mysqli->error);   
    
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
<br>
<div class="pagination">
    <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="product.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // Ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="product.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // Nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="product.php?page='.($current_page+1).'">Next</a> | ';
            }
        ?>
</div>

<link rel="stylesheet" href=<?= FILE_CSS_STYLE ?>>
<script src=<?= FILE_JS_SLIDESHOW ?>></script>
</body>

<!-- include footer -->
<?php require FILE_PHP_FOOTER ?>