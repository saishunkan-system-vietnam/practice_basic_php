<?php
//khai báo biến host
$hostName = 'localhost';
// khai báo biến username
$userName = 'root';
//khai báo biến password
$passWord = '';
// khai báo biến databaseName
$databaseName = 'qlthietbi';
// Khai báo cookie
define('COOKIE_LOGIN', 'save_info_login');

define('PATTERN_EMAIL', '"^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$"');
define('PATTERN_PASSWORD', '"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"');

$cookie_time = (3600 * 24 * 30); // 30 days

// khởi tạo kết nối
$connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);
