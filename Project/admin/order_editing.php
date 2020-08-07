<?php
require '../config/router.php';
require FILE_PHP_CONFIG;
require FILE_PHP_HEADERAD;
require FILE_PHP_FUNCTION;

// Thêm sản phẩm vào order
if (isset($_GET['action']) && $_GET['action'] == 'addProduct') {
    if (isset($_GET["id"]) && isset($_GET["quantity"])) {
        $productId = $_GET["id"];
        $result = $mysqli->query("SELECT * FROM t_product WHERE id = $productId AND del_flg = 0");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                if (isset($_COOKIE["addProductForOrder"])) {
                    $cookie_data = $_COOKIE['addProductForOrder'];

                    $order_data = json_decode($cookie_data, true);
                } else {
                    $order_data = array();
                }

                $item_id_list = array_column($order_data, 'item_id');

                if (in_array($row['id'], $item_id_list)) {
                    foreach ($order_data as $keys => $values) {
                        if ($order_data[$keys]["item_id"] == $row['id']) {
                            $order_data[$keys]["item_quantity"] = $order_data[$keys]["item_quantity"] + $_GET["quantity"];
                        }
                    }
                } else {
                    $item_array = array(
                        'item_id'            =>    $row['id'],
                        'item_name'          =>    $row['name'],
                        'item_price'         =>    $row["price"],
                        'item_quantity'      =>    $_GET["quantity"],
                    );
                    $order_data[] = $item_array;
                }
                $item_data = json_encode($order_data);
                setcookie('addProductForOrder', $item_data, time() + (86400 * 30));
                header("location: ./order_editing.php");
            }
        }
    }
} 
elseif (isset($_GET["action"]) && $_GET["action"] == "delete") 
{
    $cookie_data = $_COOKIE['addProductForOrder'];
    $order_data = json_decode($cookie_data, true);
    foreach ($order_data as $keys => $values) {
        if ($order_data[$keys]['item_id'] == $_GET["id"]) {
            unset($order_data[$keys]);
            $item_data = json_encode($order_data);
            setcookie("addProductForOrder", $item_data, time() + (86400 * 30));
            header("location: ./order_editing.php");
        }
    }
} 
elseif (isset($_POST['updOrder'])) 
{
    if (isset($_COOKIE['addProductForOrder'])) {
        $cookie_data = $_COOKIE['addProductForOrder'];
        $order_data = json_decode($cookie_data, true);

        foreach ($_POST['quantity'] as $id => $quantity) {

            foreach ($order_data as $keys => $values) {
                if ($order_data[$keys]["item_id"] == $id) {
                    $order_data[$keys]["item_quantity"] = $quantity;
                }
            }
        }

        $item_data = json_encode($order_data);
        setcookie('addProductForOrder', $item_data, time() + (86400 * 30));
        header("location: ./order_editing.php");
    }
}
elseif(isset($_GET["action"]) && $_GET["action"] == "edit" && isset( $_GET["id"]))
{
    $orderId = $_GET["id"];
    $product = $mysqli->query("SELECT * FROM t_order_detail WHERE id_order = $orderId AND del_flg = 0");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order</title>
    <script src=<?= LINK_JQUERY ?>></script>
    <link rel="stylesheet" href=<?= LINK_ICON ?>>
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
        <div class="main-product searchProduct">
            <div class="search procut">
                <h2>Danh sản phẩm</h2>
                <div class="search label"><label for="">Tìm kiếm sản phẩm: </label></div>
                <div class="search input"><input type="text" class="inpSearch inp" id="inpSearchProduct" placeholder="Nhập tên nhân viên"></div>
                <div class="search button"><button type="submit" class="btnSearch btn" id="btnSearchProduct">Tìm kiếm</button></div>
            </div>
            <div class="product_content">
                <table class="table tableListProduct">
                    <thead>
                        <tr>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="30%">Ảnh</th>
                            <th width="10%">Số lượng</th>
                            <th width="10%">Giá</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbodySearch">

                    </tbody>
                </table>
                <br>
                <div class="clear-both"></div>
                <?php require FILE_PHP_PAGINATION ?>
                <div class="clear-both"></div>
            </div>
        </div>
        <div class="clear-both"></div>
        <div class="main-product addProduct">
            <h2>Sản phẩm đã chọn</h2>
            <form action="" method="POST">
                <table class="table tableProduct">
                    <thead>
                        <tr>
                            <th width="40%">Tên sản phẩm</th>
                            <th width="6%">Số lượng</th>
                            <th width="20%">Giá bán</th>
                            <th width="15%">Thành tiền</th>
                            <th width="5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_COOKIE["addProductForOrder"])) {
                            $total = 0;
                            $cookie_data = $_COOKIE['addProductForOrder'];
                            $order_data = json_decode($cookie_data, true);
                            foreach ($order_data as $keys => $values) {
                        ?>
                                <tr>
                                    <td><?= $values["item_name"]; ?></td>
                                    <td><input type="number" value="<?= $values["item_quantity"]; ?>" name="quantity[<?= $values["item_id"]; ?>]" min="1" style="width: 50px; height: 30px;"></td>
                                    <td><?= $values["item_price"]; ?> K</td>
                                    <td><?= number_format($values["item_quantity"] * $values["item_price"], 2); ?> K</td>
                                    <td><a href="?action=delete&id=<?= $values["item_id"]; ?>" class="btn btnDelProduct"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php
                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                            }
                            ?>
                            <tr>
                                <td colspan="3" align="right">Total</td>
                                <td align="right"><?= number_format($total, 2); ?> K</td>
                                <td></td>
                            </tr>
                        <?php
                        } else {
                            echo '
				<tr>
					<td colspan="5" align="center">Chưa có sản phẩm nào!!!!!!!</td>
				</tr>
				';
                        }
                        ?>

                    </tbody>

                </table>
                <input type="submit" class="btnUpdOrder btn" name="updOrder" value="Cập nhật" />
            </form>
            <hr>
            <form action="" method="POST">
                <h2>Thông tin người nhận hàng</h2>

                <div>
                    <input type="hidden" value="<?= $total ?>" name="payments" required />
                </div>
                <?php 
                if (isset($_GET['action']) && $_GET['action'] == 'edit') {?>
                <div class="wrap-field">
                    <label>Trạng thái: </label>
                    <select name="stasus">
                        <option value="0">Chờ xủ lý</option>
                        <option value="1">Đã tiếp nhận</option>
                        <option value="2">Đang gửi</option>
                        <option value="3">Đã nhận</option>
                        <option value="4">Cancel</option>
                    </select>
                    <div class="clear-both"></div>
                </div>
                   
                <?php }?>
                
                <div class="wrap-field">
                    <label>Người nhân: </label>
                    <input type="text" name="name" value="<?= (!empty($product) ? $product['name'] : "") ?>" required />
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Số điện thoại: </label>
                    <input type="text" name="name" value="<?= (!empty($product) ? $product['name'] : "") ?>"  pattern=<?= PATTERN_PHONE ?> required />
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Địa chỉ: </label>
                    <input type="text" name="name" value="<?= (!empty($product) ? $product['name'] : "") ?>" required />
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Ghi chú: </label>
                    <textarea name="note" cols="70" rows="7"></textarea>
                    <div class="clear-both"></div>
                </div>
                <div>
                    <input type="submit" class="btnOder btn" name="btnOder" value="Đặt hàng" />
                </div>
            </form>

        </div>
    </div>



    </div>
    <script src=<?= FILE_JS_COMMON ?>></script>
    <script src=<?= FILE_JS_ADDORDERAD ?>></script>
</body>

</html>