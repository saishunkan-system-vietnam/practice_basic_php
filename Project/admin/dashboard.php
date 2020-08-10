<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
include(SITE_MENULEFT);
include(SITE_POPUPDEVICE);
include(SITE_TOPNAV);

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href=<?= LINK_JQUERY_AWESOM ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_DASHBOARD ?>>
    <title>Dashboard</title>
</head>
<body>

    <?php

    $sql_acc = "SELECT COUNT(*) as total_acc  FROM `t_account` WHERE del_flg = 0";
    $sql_device = "SELECT COUNT(*) as total_device FROM `t_device` WHERE del_flg = 0";
    $sql_device_loan = "SELECT SUM(amount) as sum_device_loan FROM t_loan_detail WHERE del_flg = 0";
    $sql_acc_loan = "SELECT COUNT(DISTINCT tl.id_account) as total_acc_loan FROM `t_loan` tl INNER JOIN t_loan_detail tld ON tl.id = tld.id_loan WHERE tld.del_flg = 0 AND tld.pay_flg = 0";


    $result_acc = mysqli_query($connect, $sql_acc);
    $row_acc = mysqli_fetch_assoc($result_acc);
    $total_acc = $row_acc['total_acc'];

    $result_device = mysqli_query($connect, $sql_device);
    $row_device = mysqli_fetch_assoc($result_device);
    $total_device = $row_device['total_device'];

    $result_device_loan = mysqli_query($connect, $sql_device_loan);
    $row_device_loan = mysqli_fetch_assoc($result_device_loan);
    $sum_device_loan = $row_device_loan['sum_device_loan'];

    $result_acc_loan = mysqli_query($connect, $sql_acc_loan);
    $row_acc_loan = mysqli_fetch_assoc($result_acc_loan);
    $total_acc_loan = $row_acc_loan['total_acc_loan'];

    mysqli_close($connect);
    ?>
    <div class="content">
        <div class="flex-container">
            <div class="acc">
                <span>Tổng số account</span>
                <label><?= $total_acc ?></label>
            </div>
            <div class="acc_loan">
                <span>Số acc đang mượn</span>
                <label><?= $total_acc_loan ?></label>
            </div>
        </div>
        <div class="flex-container">
            <div class="device">
                <span>Tổng số thiết bị</span>
                <label><?= $total_device ?></label>
            </div>
            <div class="device_loan">
                <span>Số thiết bị được mượn</span>
                <label><?= $sum_device_loan ?></label>
            </div>
        </div>
    </div>
</body>

</html>