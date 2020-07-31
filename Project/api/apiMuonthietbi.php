<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$idthietbi =  trim($_POST['idThietbi']);
$reason = trim($_POST['reason']);
$soLuong = trim($_POST['soluong']);

$sql_Insert_tbl_muontra = "INSERT INTO t_loan (id_account, loan_date, create_datetime) VALUES ($_SESSION[txtId],CURDATE(), CURRENT_TIMESTAMP())";
$result_tbl_muontra = mysqli_query($connect, $sql_Insert_tbl_muontra);

if(!$result_tbl_muontra)
{ 
    echo false;
}
else
{
    $sql_Insert_tbl_chitietmuontra = "INSERT INTO t_loan_detail (id_loan, id_device, amount, reason, create_datetime) VALUES ((SELECT MAX(id) FROM t_loan),$idthietbi,$soLuong,'$reason', CURRENT_TIMESTAMP())";
    $result_tbl_chitietmuontra =  mysqli_query($connect, $sql_Insert_tbl_chitietmuontra);

    if(!$result_tbl_chitietmuontra)
    {
        echo false;
    }
    else
    {
        echo true;
    }
    mysqli_close($connect);
}
?>