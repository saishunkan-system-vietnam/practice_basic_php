<?php
	require './config/router.php';

    if (isset($_POST["productId"]) && isset($_POST["productName"]) && isset($_POST["productPrice"]) 
        && isset($_POST["productAvarta"]) && isset($_POST["quantity"])) {

        if (isset($_COOKIE["shopping_cart"])) {
            $cookie_data = $_COOKIE['shopping_cart'];

		    $cart_data = json_decode($cookie_data, true);
        }
        else
	    {
	    	$cart_data = array();
        }
        
        $item_id_list = array_column($cart_data, 'item_id');
        if(in_array($_POST["productId"], $item_id_list))
	    {
	    	foreach($cart_data as $keys => $values)
	    	{
	    		if($cart_data[$keys]["item_id"] == $_POST["productId"])
	    		{
	    			$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
	    		}
	    	}
        }
        else
	    {
	    	$item_array = array(
	    		'item_id'			=>	$_POST["productId"],
	    		'item_name'			=>	$_POST["productName"],
                'item_price'		=>	$_POST["productPrice"],
                'item_avarta'		=>	$_POST["productAvarta"],
	    		'item_quantity'		=>	$_POST["quantity"]
	    	);
	    	$cart_data[] = $item_array;
	    }
		$item_data = json_encode($cart_data);
		setcookie('shopping_cart', $item_data, time() + (86400 * 30));
		header("location: ./index.php");
    }
?>