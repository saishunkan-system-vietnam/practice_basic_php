<?php
// require "./config/config.php"; 
define("HOST_NAME", 'localhost');
define("USER_NAME", 'root');
define("PASSWORD", '');
define("DATABASE", 'recruitment');

$connect = mysqli_connect(HOST_NAME, USER_NAME, PASSWORD, DATABASE);

if ($connect->connect_error) {
    die("Connect fail: " . $conn->connect_error);
    exit();
}

function  close_connect(){
    global $connect;
    if($connect)
    {
        $connect->close();
    }
}
?>



