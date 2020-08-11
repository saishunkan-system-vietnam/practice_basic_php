<?php
require_once "./config/config.php";
// require_once "./config/router.php";

if (isset($_POST["id"]) && isset($_POST["admin_flg"])) {
    $id = $_POST["id"];
    $admin_flg = $_POST["admin_flg"];

    $sqlUpdate = "UPDATE t_account set admin_flg = '$admin_flg', update_datetime = NOW() where id='$id'";
    $connect->query($sqlUpdate);

    if ($connect->query($sqlUpdate) == TRUE) {
        echo 1;
    } else {
        close_connect();
        echo  $connect->error;
    }
}

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $tel = $_POST["tel"];

    $sqlUpdate = "UPDATE t_account 
                    set username = '$username',
                    password = '$password',
                    birthdate = '$birthdate',
                    gender = '$gender',
                    tel = '$tel',
                    address = '$address',
                    update_datetime = NOW()    
                  where id='$email'";

    //$connect->query($sqlUpdate);

    if ($connect->query($sqlUpdate) == TRUE) {
        echo 1;
    } else {
        close_connect();
        echo  $connect->error;
    }
}

if (isset($_POST["del_id"]) )
{
    $id = $_POST["del_id"];

    $sqlUpdate = "UPDATE t_account set del_flg = 1, update_datetime = NOW() where id='$id'";
    //$connect->query($sqlUpdate);

    if ($connect->query($sqlUpdate) == false) {
        close_connect();
        echo  $connect->error;
        return;
    }

    $sql_Upd_Apply = "UPDATE t_apply set del_flg = 1, update_datetime = NOW() where id_user='$id'";
    // $connect->query($sql_Upd_Apply);

    if ($connect->query($sql_Upd_Apply) == TRUE) {
        echo 1;
    } else {
        echo  $connect->error;
    }

    close_connect();
}

if (isset($_POST["active_id"]) )
{
    $id = $_POST["active_id"];

    $sqlUpdate = "UPDATE t_account set del_flg = 0, update_datetime = NOW() where id='$id'";
    //$connect->query($sqlUpdate);

    if ($connect->query($sqlUpdate) === false) {
        close_connect();
        echo  $connect->error;
        return;
    }

    $sql_Upd_Apply = "UPDATE t_apply set del_flg = 0, update_datetime = NOW() where id_user='$id'";
    // $connect->query($sql_Upd_Apply);

    if ($connect->query($sql_Upd_Apply) === TRUE) {
        echo 1;
    } else {
        echo  $connect->error;
    }

    close_connect();
}
