<?php 
    require './config/router.php';

    if(isset($_GET["action"]))
    {
    	if($_GET["action"] == "delete")
    	{
            $cookie_data = $_COOKIE['shopping_cart'];        
            $cart_data = json_decode($cookie_data, true);
    		foreach($cart_data as $keys => $values)
    		{
    			if($cart_data[$keys]['item_id'] == $_GET["id"])
    			{
    				unset($cart_data[$keys]);
                    $item_data = json_encode($cart_data);
                    
    				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
    				header("location: ./cart.php");
    			}
    		}
    	}
    	if($_GET["action"] == "clear")
    	{
    		setcookie("shopping_cart", "", time() - 3600);
    		header("location: ./cart.php");
    	}
    }   
    require FILE_PHP_MENUTOP;

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_CART ?>>
</head>

<body>
    <h2>Giỏ hàng</h2>
    <div>
        <div>
            <a href="./cart.php?action=clear">Clear Cart</a>
        </div>
        <table id="table_cart">
            <tr>
                <th width="40%">Tên sản phẩm</th>
                <th width="10%">Số lượng</th>
                <th width="20%">Giá bán</th>
                <th width="15%">Thành tiền</th>
                <th width="5%">Action</th>
            </tr>
            <?php
			if(isset($_COOKIE["shopping_cart"]))
			{
				$total = 0;
				$cookie_data = $_COOKIE['shopping_cart'];
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $values)
				{
			?>
            <tr>
                <td><?= $values["item_name"]; ?></td>
                <td><?= $values["item_quantity"]; ?></td>
                <td><?= $values["item_price"]; ?> K</td>
                <td><?= number_format($values["item_quantity"] * $values["item_price"], 2);?> K</td>
                <td><a href="./cart.php?action=delete&id=<?= $values["item_id"]; ?>"><span
                            class="text-danger">Xóa</span></a></td>
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
			}
			else
			{
				echo '
				<tr>
					<td colspan="5" align="center">No Item in Cart</td>
				</tr>
				';
			}
			?>
        </table>
    </div>

    <!-- include footer -->
    <?php include FILE_PHP_FOOTER ?>
</body>

</html>