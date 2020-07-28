<?php
require_once "./config/config.php";
require_once "./config/router.php";
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $confirm_password = $_POST["confirm_password"]; 
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    // $confirm = $_POST["confirm"]; 

    $sqlSelectUser = "SELECT * FROM usertbl where email='$email'";

    if ($connect->query($sqlSelectUser)->num_rows > 0) {
        echo 2;
        close_connect();
        return;
    }

    $sqlInsert = "INSERT INTO usertbl (email, username, password, dob, gender, address) 
    VALUES ('$email', '$username', '$password', '$dob', '$gender','$address')";

    if ($connect->query($sqlInsert) === true) {
        echo 1;
        close_connect();
        return;
    } else {
        echo $sqlInsert;
        return;
    }
};
?>