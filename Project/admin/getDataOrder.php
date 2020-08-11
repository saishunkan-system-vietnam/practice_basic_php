<?php 
     require '../config/router.php';
     require FILE_PHP_CONFIG;
     require FILE_PHP_PAGINATIONAD;
     require FILE_PHP_FUNCTION;

    // Kết nối DataBase
    connect();

    if (isset($_POST["id"])) {
        $orderId = $_POST["id"];

        if (isset($_POST["name"]) && $_POST["name"] == "product" ) {

           // Get dữ liệu chi tiết đơn hàng
            $sql = "SELECT p.id, od.id ,p.name, od.quantity, od.price FROM t_order_detail AS od  INNER JOIN t_product AS p ON od.id_product = p.id WHERE od.id_order = $orderId  AND od.del_flg = 0";
            $product = $conn->query($sql);
            if ($product->num_rows>0) {
                while($row = $product->fetch_assoc()){
                    $data[] = $row;
                }   
                echo json_encode(['status' => 'success','data' =>$data, 'id' =>$orderId]);
            }
            else {
                echo json_encode(['status' => 'error']);
            }    
        }
        elseif (isset($_POST["name"]) && $_POST["name"] == "order") {
             // Get dữ liệu đơn hàng
            $order =  $conn->query("SELECT * FROM t_order WHERE id = $orderId");
            if ($order->num_rows>0) {
                while($row = $order->fetch_assoc()){
                    $data[] = $row;
                }   
                echo json_encode(['status' => 'success','data' =>$data]);
            }
            else {
                echo json_encode(['status' => 'error']);
            }    
        }
        elseif (isset($_POST["name"]) && $_POST["name"] == "updOrder"
                && isset($_POST["status"]) && isset($_POST["recipient"])
                && isset($_POST["phone"])   && isset($_POST["address"])){
            $status         = $_POST["status"];
            $recipient      = $_POST["recipient"];
            $phone          = $_POST["phone"];
            $address        = $_POST["address"];
            $note           = isset($_POST["note"])? $_POST["note"]:"";

            $sql = "UPDATE t_order SET recipient='$recipient' ,phone= '$phone',address='$address' ,note='$note',status=$status , upadte_datetime = CURRENT_TIMESTAMP()  WHERE id = '$orderId'";
            $order = $conn->query($sql);
            if ($order) {
                echo json_encode(['status' => 'success']);
            } 
            else {
                echo json_encode(['status' => 'error']);
            }    
        }
    }
    elseif (isset($_GET["name"]) && $_GET["name"] == "search") {
       // Lấy thong tin lọc
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        
        // Lấy trang hiện tại
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        
        // Khởi tạo đối tượng Pagination mới
        $pagination = new Pagination();
        
        // Cấu hình thông số phân trang
        $pagination->init(array(
            'current_page'  => $page,
            'total_record'  => count_all_order($id),
            'link_full'     => 'getDataOrder.php?page={page}&id='.$id,
            'link_first'    => 'getDataOrder.php'
        ));

        // Lấy limit và Start
        $limit = $pagination->get_config('limit');
        $start = $pagination->get_config('start');

        // Lấy danh sách người dùng
        $data = get_all_order($id, $limit, $start);

        // Trả kết quả cho client
        echo json_encode(['status' => 'success','data' =>$data,'paging' => $pagination->html()]);
    }

    
    // Đóng kết nối
    disconnect();

?>