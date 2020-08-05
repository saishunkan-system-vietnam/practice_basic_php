<?php
require '../config/router.php';
require FILE_PHP_CONFIG;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account</title>
    <link rel="stylesheet" href=<?= LINK_ICON ?>>
    <script src=<?= LINK_JQUERY ?>></script>
</head>

<body>
    <?php require FILE_PHP_HEADERAD ?>
    <?php
    $content = isset($_GET['content']) ?  $_GET['content'] : "";

    $item_per_page = 2;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords =  $mysqli->query("SELECT * FROM t_account WHERE fullname  LIKE '%{$content}%'");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    ?>
    <script>
        var page = <?= $current_page ?>;
        var content = '<?= $content ?>';
    </script>

    <div class="main-content">
        <h1>Danh sản phẩm</h1>
        <div class="search procut">
            <div class="search label"><label for="">Tìm kiếm sản phẩm: </label></div>
            <div class="search input"><input type="text" class="inpSearch inp" id="inpSearchProduct" placeholder="Nhập tên nhân viên"></div>
            <div class="search button"><button type="submit" class="btnSearch btn" id="btnSearchProduct">Tìm kiếm</button></div>
        </div>
        <div class="clear-both"></div>

        <div class="divAdd">
            <a class="btnAdd btn" href="./<?= $config_name ?>_editing.php"><i class="fa fa-plus-circle"></i> Thêm mới
            </a>
        </div>

        <table class="table tableListAccount">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Xuất xứ</th>
                    <th>Giá</th>
                    <th>Dung Tích</th>
                    <th>Nội Dung</th>
                    <th>Del_Flg</th>
                    <th><a>Edit</a></th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <br>
        <div class="clear-both"></div>
        <?php require FILE_PHP_PAGINATION ?>
        <div class="clear-both"></div>
    </div>



    <script src=<?= FILE_JS_COMMON ?>></script>
</body>

</html>