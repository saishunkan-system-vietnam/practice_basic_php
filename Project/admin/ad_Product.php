<?php 
    session_start();
    require '../config/router.php';
    require FILE_PHP_CONFIG ;
     if (isset($_SESSION["role"])) {
         if ($_SESSION["role"] != 1) {
            echo '<script type="text/javascript">alert("tài khoản của bạn không có quyền vào chức năng Admin")</script>';
            header("location: ../index.php");
         }
     }else{
        header("location: ../index.php");
     }    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Product</title>
    <link rel="stylesheet" href=<?= LINK_ICON?>>
    <script src=<?= LINK_JQUERY?>></script>
</head>

<body>
    <?php require FILE_PHP_HEADERAD ?>

    <?php
        $content = isset($_GET['content'])?  $_GET['content'] : "";
    
        $item_per_page = 2;
        $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords =  $mysqli->query("SELECT * FROM t_product WHERE name  LIKE '%{$content}%'");  
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
    ?>
    <script>
    var page = <?= $current_page ?>;
    var content = '<?= $content ?>';
    </script>

    <div class="main-content">
        <h2>Danh sản phẩm</h2>
        <div class="search procut">
            <div class="search_procut label"><label for="">Tìm kiếm sản phẩm: </label></div>
            <div class="search_procut input"><input type="text" class="inp search" id="inpSearch"
                    placeholder="Nhập tên sản phẩm"></div>
            <div class="search_procut button"><button class="btn" id="btnSearch">Tìm kiếm</button></div>
        </div>
        <div class="clear-both"></div>

        <button class="btn" onclick="document.getElementById('regist').style.display='block'"><i
                class="fa fa-plus-circle"></i> Thêm mới</button>

        <table class="table_listAccount">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Xuất xứ</th>
                    <th>Giá</th>
                    <th>Dung tích</th>
                    <th>Chú thích</th>
                    <th>Del_Flg</th>
                    <th><a>Edit</a></th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <br>
    <div class="clear-both"></div>
    <?php require FILE_PHP_PAGINATION ?>
    <div class="clear-both"></div>

    <script src=<?= FILE_JS_PRODUCTAD ?>></script>

</body>

</html>