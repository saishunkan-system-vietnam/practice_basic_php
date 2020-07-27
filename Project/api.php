<?php
session_start();
require('./config/router.php');
require(SITE_CONFIG);
$idthietbi =  trim($_POST['idThietbi']);
$reason = trim($_POST['reason']);
$soLuong = trim($_POST['soluong']);

$sql_Insert_tbl_muontra = "INSERT INTO muontra (IDTaiKhoan, NgayMuon) VALUES ($_SESSION[txtId],CURDATE())";
$result_tbl_muontra = mysqli_query($connect, $sql_Insert_tbl_muontra);

if(!$result_tbl_muontra)
{ 
    echo false;
}
else
{
    $sql_Insert_tbl_chitietmuontra = "INSERT INTO chitietmuontra (MaMuonTra, MaThietBi, SoLuong, Lydo) VALUES ((SELECT MAX(MaMuonTra) FROM muontra),$idthietbi,$soLuong,'$reason')";
    $result_tbl_chitietmuontra =  mysqli_query($connect, $sql_Insert_tbl_chitietmuontra);

    if(!$result_tbl_chitietmuontra)
    {
        echo false;
    }
    else
    {
        echo true;
    }
}
?>
