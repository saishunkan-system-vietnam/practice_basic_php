<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$data = array();

if ($name == 'insert') {
    $idthietbi = trim($_POST['idThietbi']);
    $date = trim($_POST['intend_date']);
    $reason = trim($_POST['reason']);
    $soLuong = trim($_POST['soluong']);

    $sql_Insert_tbl_muontra = "INSERT INTO t_loan (id_account, loan_date, intend_date, create_datetime) VALUES ($_SESSION[txtId], CURRENT_TIMESTAMP(), '$date', CURRENT_TIMESTAMP())";
    $result_tbl_muontra = mysqli_query($connect, $sql_Insert_tbl_muontra);

    if (!$result_tbl_muontra) {
        echo false;
    } else {
        $sql_Insert_tbl_chitietmuontra = "INSERT INTO t_loan_detail (id_loan, id_device, amount, reason, create_datetime) VALUES ((SELECT MAX(id) FROM t_loan),$idthietbi,$soLuong,'$reason', CURRENT_TIMESTAMP())";
        $result_tbl_chitietmuontra =  mysqli_query($connect, $sql_Insert_tbl_chitietmuontra);

        if (!$result_tbl_chitietmuontra) {
            echo false;
        } else {
            echo true;
        }
        mysqli_close($connect);
    }
}

if ($name == 'check') {
    $user = isset($_POST['user']) ? trim($_POST['user']) : '';
    
    $sql_check = "SELECT COUNT(*) total FROM t_loan_detail tld INNER JOIN t_loan tl ON tld.id_loan  = tl.id INNER JOIN t_account tc on  tl.id_account = tc.id where tc.user_name = '$user' AND tld.del_flg = 0 and tld.pay_flg = 0";

    $result_select = mysqli_query($connect, $sql_check) or die("lỗi truy vấn select");
    
    while ($row = $result_select->fetch_assoc()) {
        $data[count($data)] = $row;
    }
    header('Content-Type: application/json');
    echo (json_encode($data));
    mysqli_close($connect);
}

if ($name == 'select') {
    $id_device = isset($_POST['id_device']) ? trim($_POST['id_device']) : '';
    $sql_select = "SELECT * FROM t_device WHERE del_flg = 0 AND id=$id_device";
    $result_select = mysqli_query($connect, $sql_select) or die("lỗi truy vấn select");
    
    while ($row = $result_select->fetch_assoc()) {
        $data[count($data)] = $row;
    }
    header('Content-Type: application/json');
    echo (json_encode($data));
    mysqli_close($connect);
}


