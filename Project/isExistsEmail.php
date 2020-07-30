<?php
    require './config/router.php';
    require FILE_PHP_CONFIG;

    if (isset($_GET["email"])) {
        $email = $_GET["email"];
        $result = $mysqli->query("SELECT * FROM account WHERE id = '$email'");

        if ($result->num_rows){
            echo  true;
        }

        echo false;
    }
    // Đóng kết nối
    $mysqli -> close();
?>