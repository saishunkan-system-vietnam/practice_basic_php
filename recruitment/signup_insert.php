<?php
require_once "./config/config.php";
require_once "./config/router.php";
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $tel = $_POST["tel"]; 

    $sqlSelectUser = "SELECT * FROM t_account where id='$email'";

    if ($connect->query($sqlSelectUser)->num_rows > 0) {
        echo 2;
        close_connect();
        return;
    }

    $sqlInsert = "INSERT INTO t_account (id, username, password, birthdate, gender, address, tel) 
    VALUES ('$email', '$username', '$password', '$birthdate', '$gender','$address', '$tel')";

    if ($connect->query($sqlInsert) === true) {
        echo 1;
        close_connect();
        return;
    } else {
        echo 0;
        return;
    }
};
?>