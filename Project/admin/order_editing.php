<?php
require '../config/router.php';
require FILE_PHP_CONFIG;
require FILE_PHP_HEADERAD;
require FILE_PHP_FUNCTION;


if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
    if (
        isset($_POST["name"]) && isset($_POST["origin"]) && isset($_POST["price"])
        && isset($_POST["capacity"]) && isset($_POST["describe_product"])
    ) {

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
            $uploadedFiles = $_FILES['image'];
            $result = uploadFiles($uploadedFiles);
            if (!empty($result['errors'])) {
                $error = $result['errors'];
            } else {
                $image = '../' . $result['path'];
            }
        }
        if (!isset($image) && !empty($_POST['image'])) {
            $image = '../' . $_POST['image'];
        }

        $name                   =   $_POST["name"];
        $origin                 =   $_POST["origin"];
        $price                  =   (int)$_POST["price"];
        $capacity               =   $_POST["capacity"] . 'ml';
        $describe_product       =   $_POST["describe_product"];
        $content                =   $_POST["content"];

        if ($_GET['action'] == 'edit' && !empty($_GET['id'])) {
            $sqlUpd = "UPDATE t_product SET `name` = '$name', `origin` = '$origin', `price` = $price, `image` = '$image', `capacity` = '$capacity' = '$capacity', `describe_product` = '$describe_product', `content` = '$content',`upadte_datetime` = CURRENT_TIMESTAMP()
                         WHERE id =$_GET[id];";
            $result = $mysqli->query($sqlUpd);
            if ($result) {
                echo '<script type="text/javascript">alert("Update sản phẩm thành công")</script>';
            } else {
                echo '<script type="text/javascript">alert("Update sản phẩm thất bại")</script>';
            }
        } else {
            $sqlinsert = "INSERT INTO t_product(`name`, `origin`, `price`, `image`, `capacity`, `describe_product`, `content`,`create_datetime`) 
                    VALUES ('$name','$origin',$price,'$image','$capacity','$describe_product','$content', CURRENT_TIMESTAMP())";

            $result = $mysqli->query($sqlinsert);

            if ($result) {
                echo '<script type="text/javascript">alert("Thêm sản phẩm thành công")</script>';
            } else {
                echo '<script type="text/javascript">alert("Thêm sản phẩm thất bại")</script>';
            }
        }
    }
} else {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        // Select dữ liệu
        $result = $mysqli->query("SELECT * FROM t_product WHERE id = '$id'");
        $product = $result->fetch_assoc();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order</title>
    <script src=<?= LINK_JQUERY ?>></script>
    <script src=<?= FILE_JS_CKEDITOR ?>></script>
</head>

<body>

    <?php
    $content = isset($_GET['content']) ?  $_GET['content'] : "";

    $item_per_page = 2;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
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
        <h1><?= !empty($_GET['id']) ?  "Sửa đơn hàng" : "Thêm đơn hàng" ?></h1>

        <div class="search procut">
            <h2>Danh sản phẩm</h2>
            <div class="search label"><label for="">Tìm kiếm sản phẩm: </label></div>
            <div class="search input"><input type="text" class="inpSearch inp" id="inpSearchProduct" placeholder="Nhập tên nhân viên"></div>
            <div class="search button"><button type="submit" class="btnSearch btn" id="btnSearchProduct">Tìm kiếm</button></div>
        </div>
        <div class="product_content">
            <form action="">
                <table class="table tableListProduct">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </form>

            <br>
            <div class="clear-both"></div>
            <?php require FILE_PHP_PAGINATION ?>
            <div class="clear-both"></div>
        </div>

    </div>
    <script src=<?= FILE_JS_COMMON ?>></script>
    <script src=<?= FILE_JS_ADDORDERAD ?>></script>
</body>

</html>