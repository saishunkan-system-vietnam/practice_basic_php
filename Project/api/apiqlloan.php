<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$name = isset($_POST['name']) ? trim($_POST['name']) : '';

if ($name == 'delete') {
    $id_device = isset($_POST['id_device']) ? trim($_POST['id_device']) : '';

    $sql_delete_device = "UPDATE t_loan_detail  SET del_flg=1, update_datetime=CURRENT_TIMESTAMP() WHERE id_device=$id_device";
    $result_Delete = mysqli_query($connect, $sql_delete_device) or die("lỗi truy vấn delete");

    if (!$result_Delete) {
        echo false;
    } else {
        echo true;
    }

    mysqli_close($connect);
}

if ($name == 'upd_pay') {
    $pay_flg = isset($_POST['pay_flg']) ? trim($_POST['pay_flg']) : '';
    $pay_time = isset($_POST['pay_time']) ? trim($_POST['pay_time']) : '';

    $sql_Update_device = "UPDATE t_loan_detail SET pay_flg = $pay_flg, pay_date=CURRENT_TIMESTAMP(), update_datetime=CURRENT_TIMESTAMP() WHERE create_datetime = '$pay_time'";
    $result_Update = mysqli_query($connect, $sql_Update_device) or die("lỗi truy vấn update");


    mysqli_close($connect);
}
