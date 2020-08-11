<?php
require_once '../config/router.php';
require_once FILE_PHP_CONFIG;

if (isset($_POST["orderId"])) {
    $orderId = $_POST["orderId"];

    // Kết nối DataBase
    connect();

    if (isset($_POST["name"]) && $_POST["name"]== "deleteOrder") {
         // update dữ liệu
        $sql = "UPDATE t_order_detail SET del_flg = 1 , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id_order = '$orderId'";
        $orderDetail = $conn->query($sql);

        if ($orderDetail) {
            $sql = "UPDATE t_order SET del_flg = 1 , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id = '$orderId'";
            $order = $conn->query($sql);
            if ($order) {
                echo json_encode(['status' => 'success']);
            }
            else{
                echo json_encode(['status' => 'error']);
            }
        
        } else {
            echo json_encode(['status' => 'error']);
        }
    }elseif (isset($_POST["name"]) && $_POST["name"]== "deleteProduct" && isset($_POST["id"])) {
        
        $id = $_POST["id"];

         // update dữ liệu
         $sql = "UPDATE t_order_detail SET del_flg = 1 , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id = '$id'";
         $orderDetail = $conn->query($sql);
         if ($orderDetail) {
            $sql = "SELECT * FROM t_order_detail  WHERE id_order = '$orderId'";
             $resultSelect = $conn->query($sql);
             if ($resultSelect->num_rows>0) {
                $total =0;
                while($row = $resultSelect->fetch_assoc()){
                   $total = $total + ($row["quantity"] * $row["price"]);
                }   
                $sql = "UPDATE t_order SET payments = $total  , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id = '$orderId'";
                $order = $conn->query($sql);
                if ($order) {
                    echo json_encode(['status' => 'success']);
                }
                else {
                    echo json_encode(['status' => 'error:Lỗi update bảng đơn hàng']);
                }
            }  
            else {
                echo json_encode(['status' => 'error:Lỗi Select dữ liệu chi tiết đơn hàng']);
            }
         }
         else {
            echo json_encode(['status' => 'error:Lỗi xóa sản phẩm của đơn hàng']);
         }
    }
    
}

// Đóng kết nối
disconnect();
?>