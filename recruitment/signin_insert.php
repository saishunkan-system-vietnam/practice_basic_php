<?php
require_once "./config/config.php";
require_once "./config/router.php";
if (isset($_POST["username"])&&isset($_POST["paemail"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $email = $_POST["email"]; 
    $password = $_POST["password"];  
    // $confirm_password = $_POST["confirm_password"]; 
    $dob = $_POST["dob"];  
    $gender = $_POST["gender"];  
    $address = $_POST["address"]; 
    // $confirm = $_POST["confirm"]; 

    $sqlSelectUser = "INSERT INTO usertbl (email, username, password, dob, gender, address) 
    VALUES ('$email', '$username', '$password', '$dob', '$gender')";

    $result = $connect->query($sqlSelectUser);

    if ($connect->query($sqlSelectUser) === true) {
        echo "New record created successfully";
      } else {
        echo $connect->error;
      }
};
?>