<?php
require_once './config/router.php';
require_once FILE_PHP_CONFIG;

// Xóa sản phẩm  trong giỏ hàng
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $cookie_data = $_COOKIE['shopping_cart'];
        $cart_data = json_decode($cookie_data, true);

        if (isset($_GET["key"])) {
            unset($cart_data[$_GET["key"]]);
            $item_data = json_encode($cart_data);
            setcookie("shopping_cart", $item_data, time() + (86400 * 30));
        }
    } else {
        if ($_GET["action"] == "clear") {
            setcookie("shopping_cart", "", time() - 3600);
        }
    }
    header("location: ./cart.php");
}

// Cập nhật giỏ hàng
if (isset($_POST['updateCart'])) {
    if (isset($_COOKIE['shopping_cart'])) {
        $cookie_data = $_COOKIE['shopping_cart'];
        $cart_data = json_decode($cookie_data, true);

        foreach ($_POST['quantity'] as $id => $quantity) {

            foreach ($cart_data as $keys => $values) {
                if ($cart_data[$keys]["item_id"] == $id) {
                    $cart_data[$keys]["item_quantity"] = $quantity;
                }
            }
        }

        $item_data = json_encode($cart_data);
        setcookie('shopping_cart', $item_data, time() + (86400 * 30));
        header("location: ./cart.php");
    }
}


// Đặt hàng 
if (isset($_POST['btnOder'])) {
    $name       = $_POST['name'];
    $phone      = $_POST['phone'];
    $address    = $_POST['address'];
    $payments   = $_POST['payments'];
    $note       = $_POST['note'];
    $idAccount  = $_SESSION[SESSION_USERNAME];

    // Kết nối DataBase
    connect();

    $insertOder = "INSERT INTO t_order(`id_account`, `recipient`, `phone`, `address`, `payments`, `note`, `create_datetime`) VALUES ('$idAccount','$name','$phone','$address',$payments,'$note',CURRENT_TIMESTAMP())";
    $resultOder = $conn->query($insertOder);
    if ($resultOder) {
        $idOrder = $conn->insert_id;
        if (isset($_COOKIE['shopping_cart'])) {
            $cookie_data = $_COOKIE['shopping_cart'];
            $cart_data = json_decode($cookie_data, true);

            foreach ($cart_data as $keys => $values) {

                $insertOderD = "INSERT INTO t_order_detail(`id_order`,`id_product`, `quantity`, `price`, `create_datetime`)
                                VALUES ($idOrder,$values[item_id],$values[item_quantity],$values[item_price],CURRENT_TIMESTAMP())";
                $resultOderD = $conn->query($insertOderD);
                if (!$resultOderD) {
                    $_SESSION["error"] = "Xảy ra lỗi khi insert chi tiết đơn hàng!";
                    exit;
                }
            }
            if (isset($_SESSION["error"])) {
                unset($_SESSION["error"]);
            }

            setcookie("shopping_cart", "", time() - 3600);

            header("location: ./index.php");
        }
    } else {
        $_SESSION["error"] = "Xảy ra lỗi khi insert đơn hàng!";
        exit;
    }
}

require FILE_PHP_MENUTOP;
// Đóng kết nối
disconnect();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Giỏ Hàng</title>
</head>

<body>
    <div>
        <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
        }
        ?>
    </div>
    <div class="border">
        <h1>Giỏ hàng</h1>
        <div>
            <h3><?php if (isset($_SESSION["error"])) {
                    echo $_SESSION["error"];
                } ?></h3>
        </div>
        <div class="divClear">
            <a class="btnClear btn" href="./cart.php?action=clear">Clear Cart</a>
        </div>
        <form action="" method="POST">
            <table class="table tableCart">
                <tr>
                    <th width="40%">Tên sản phẩm</th>
                    <th width="6%">Số lượng</th>
                    <th width="20%">Giá bán</th>
                    <th width="15%">Thành tiền</th>
                    <th width="5%">Action</th>
                </tr>
                <?php
                if (isset($_COOKIE["shopping_cart"])) {
                    $total = 0;
                    $cookie_data = $_COOKIE['shopping_cart'];
                    $cart_data = json_decode($cookie_data, true);
                    foreach ($cart_data as $keys => $values) {
                ?>
                        <tr>
                            <td><?= $values["item_name"]; ?></td>
                            <td><input type="number" value="<?= $values["item_quantity"]; ?>" name="quantity[<?= $values["item_id"]; ?>]" min="1" style="width: 50px; height: 30px;"></td>
                            <td><?= $values["item_price"]; ?> K</td>
                            <td><?= number_format($values["item_quantity"] * $values["item_price"], 2); ?> K</td>
                            <td><a class="btnDelete btn" href="./cart.php?action=delete&key=<?= $keys; ?>">Delete</a></td>
                        </tr>
                    <?php
                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total: </td>
                        <td colspan="2" align="center"><?= number_format($total, 2); ?> K</td>
                    </tr>
                <?php
                } else {
                    echo '
				<tr>
					<td colspan="5" align="center">Không có sản phẩm nào trong giỏ hàng</td>
				</tr>
				';
                }
                ?>
            </table>
            <input type="submit" class="btnUpdCart btn" name="updateCart" value="Cập nhật" />
        </form>
        <hr>
        <form action="" method="POST">
            <h1>Thông tin người nhận hàng</h1>

            <div>
                <input type="hidden" value="<?= $total ?>" name="payments" required />
            </div>
            <div class="cart-info">
                <span class="labelName cart-label">Người nhận: </span>
                <input type="text" value="" name="name" required />
                <div class="clear-both"></div>
            </div>

            <div class="cart-info">
                <span class="labelPhone cart-label">Điện thoại: </span>
                <input type="text" value="" name="phone" pattern="<?= PATTERN_PHONE ?>" required />
                <div class="clear-both"></div>
            </div>

            <div class="cart-info">
                <span class="labelAddress cart-label">Địa chỉ: </span>
                <input type="text" value="" name="address" required />
                <div class="clear-both"></div>
            </div>

            <div class="cart-info">
                <span class="labelnote cart-label">Ghi chú: </span>
                <textarea name="note" cols="70" rows="7"></textarea>
                <div class="clear-both"></div>
            </div>
            <div>
                <input type="submit" class="btnOder btn" name="btnOder" value="Đặt hàng" />
            </div>
        </form>

    </div>

    <!-- include footer -->
    <?php include FILE_PHP_FOOTER ?>
</body>

</html>