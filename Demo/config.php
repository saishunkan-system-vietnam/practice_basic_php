<?php
//khai báo biến host
$hostName = 'localhost';
// khai báo biến username
$userName = 'root';
//khai báo biến password
$passWord = '';
// khai báo biến databaseName
$databaseName = 'dangky';
// Khai báo cookie
define('cookie_login', 'save_info_login');

$cookie_time = (3600 * 24 * 30); // 30 days

// khởi tạo kết nối
$connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

?>