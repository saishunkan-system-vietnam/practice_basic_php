<?php

// Constant
define("HOST_NAME", 'localhost');
define("USER_NAME", 'root');
define("PASSWORD", '');
define("DATABASE", 'recruitment');

// Connect to database
$connect = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD, DATABASE);

// Nếu connect thất bại
if ($connect->connect_error) {
    die("Connect fail: " . $conn->connect_error);
    exit();
}

// Hàm ngắt kết nối với database
function  close_connect(){
    global $connect;
    
    if($connect)
    {
        $connect->close();
    }
}
?>



