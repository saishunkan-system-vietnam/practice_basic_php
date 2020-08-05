<?php
require '../config/router.php';
require FILE_PHP_CONFIG;
require FILE_PHP_HEADERAD;

$config_name = "product";
$config_title = "sản phẩm";
if (!empty($_SESSION[SESSION_USERNAME])) {
    if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
        $_SESSION[$config_name . 'filter'] = $_POST;
        header('Location: ' . $config_name . '_listing.php');
        exit;
    }
    if (!empty($_SESSION[$config_name . 'filter'])) {
        $where = "";
        foreach ($_SESSION[$config_name . 'filter'] as $field => $value) {
            if (!empty($value)) {
                switch ($field) {
                    case 'name':
                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` LIKE '%" . $value . "%'" : "`" . $field . "` LIKE '%" . $value . "%'";
                        break;
                    default:
                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` = " . $value . "" : "`" . $field . "` = " . $value . "";
                        break;
                }
            }
        }
        extract($_SESSION[$config_name . 'filter']);
    }
    $item_per_page = 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if (!empty($where)) {
        $totalRecords =  $mysqli->query("SELECT * FROM `t_product` where (" . $where . ")");
    } else {
        $totalRecords =  $mysqli->query("SELECT * FROM `t_product`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if (!empty($where)) {
        $products =  $mysqli->query("SELECT * FROM `t_product` WHERE (" . $where . ") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    } else {
        $products =  $mysqli->query("SELECT * FROM `t_product` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    // Đóng kết nối
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Prodcut</title>
    <link rel="stylesheet" href=<?= LINK_ICON ?>>
    <script src=<?= LINK_JQUERY ?>></script>
</head>

<body>
    <div class="main-content">
        <h1>Danh sản phẩm</h1>
        <div class="search procut">
            <form id="<?= $config_name ?>-search-form" action="<?= $config_name ?>_listing.php?action=search" method="POST">
                <div class="search label"><label for="">Tìm kiếm <?= $config_title ?>: </label></div>
                <div class="search input"><input type="text" class="inpSearch inp" id="inpSearchProduct" placeholder="Nhập tên nhân viên" name="name" value="<?= !empty($name) ? $name : "" ?>"></div>
                <div class="search button"><button type="submit" class="btnSearch btn" id="btnSearchProduct">Tìm kiếm</button></div>
            </form>
        </div>
        <div class="clear-both"></div>

        <div class="divAdd">
            <a class="btnAdd btn" href="./<?= $config_name ?>_editing.php"><i class="fa fa-plus-circle"></i> Thêm mới </a>
        </div>

        <table class="table tablelistProduct">
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
                <?php while ($row = $products->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td>
                            <?php $img = !empty($row["image"]) ? $row["image"] : "../img/logoProduct.png";
                            echo "<img style='width: 200px; height: 200px;' src='$img'>";
                            ?>
                        </td>
                        <td><?= $row["describe_product"] ?></td>
                        <td><?= $row["origin"] ?></td>
                        <td><?= $row["price"] ?></td>
                        <td><?= $row["capacity"] ?></td>
                        <td><?= $row["content"] ?></td>
                        <td><?= $row["del_flg"] ?></td>
                        <td>
                            <div class="listing-prop listing-button">
                                <a class="btnEdit btn" href="./<?= $config_name ?>_editing.php?id=<?= $row['id'] ?>">Sửa</a>
                            </div>
                        </td>
                        <td>
                            <div class="listing-prop listing-button">
                                <a class="btnDelete btn" data-id="<?= $row['id'] ?>">Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="clear-both"></div>
    <?php require FILE_PHP_PAGINATION ?>
    <div class="clear-both"></div>

    <script src=<?= FILE_JS_PRODUCTAD ?>></script>

</body>

</html>