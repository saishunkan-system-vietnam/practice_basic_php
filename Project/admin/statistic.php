<?php
    require_once '../config/router.php';
    require_once FILE_PHP_CONFIG;

    // Kết nối dataBase
    connect();

    // Tổng số đơn hàng bán trong ngày
    $result = $conn->query('SELECT count(*) AS total FROM t_order WHERE DATE(create_datetime) = CURDATE() '); 
    $row = $result->fetch_assoc();
    $totalOrder = $row['total'];

    // Số đơn chưa xử lý trong ngày
    $result = $conn->query('SELECT count(*) AS total FROM t_order WHERE DATE(create_datetime) = CURDATE() AND status = 0 '); 
    $row = $result->fetch_assoc();
    $orderNotProcessed = $row['total'];

    // Số đơn đã hủy trong ngày
    $result = $conn->query('SELECT count(*) AS total FROM t_order WHERE DATE(create_datetime) = CURDATE() AND status = 4 '); 
    $row = $result->fetch_assoc();
    $orderCancel = $row['total'];

    // Tổng số tiền trong ngày
    $result = $conn->query('SELECT payments FROM t_order WHERE DATE(create_datetime) = CURDATE()'); 
    $totalPayments =0;
    while($row = $result->fetch_assoc()){
    $totalPayments = $totalPayments + $row['payments'];
    }

    echo json_encode(['totalOrder' =>$totalOrder, 'orderNotProcessed' => $orderNotProcessed, 'orderCancel' => $orderCancel, 'totalPayments'=>$totalPayments]);

    // Đóng kết nối
    disconnect();
?>