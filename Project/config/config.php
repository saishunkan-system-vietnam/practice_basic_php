<?php
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASENAME', 'qlthietbi');
define('COOKIE_LOGIN', 'save_info_login');

$cookie_time = (3600 * 24 * 30); // 30 days

// khởi tạo kết nối
$connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASENAME);
?>