<?php
require_once "./config/config.php";

if (
    isset($_POST["company"]) && isset($_POST["position"]) && isset($_POST["address"])
    && isset($_POST["salary"]) && isset($_POST["deadline"]) && isset($_POST["detail"])
    && isset($_POST["id"])
) {
    $id = $_POST["id"];
    $company = $_POST["company"];
    $position = $_POST["position"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];
    $deadline = $_POST["deadline"];
    $detail = $_POST["detail"];

    $sqlUpdate = "UPDATE t_recruitment 
                  SET company = '$company',
                      position = '$position',
                      address = '$address',
                      salary = '$salary',
                      deadline = '$deadline',
                      detail = '$detail',
                      update_datetime = NOW() 
                  where id = '$id'";
    $connect->query($sqlUpdate);

    if ($connect->query($sqlUpdate) === TRUE) {
        echo 1;
    } else {
        echo  $connect->error;
    }

    close_connect();
}

if (isset($_POST["del_id"])) {
    $id = $_POST["del_id"];

    $sql_Upd_Recruitment = "UPDATE t_recruitment set del_flg = 1, update_datetime = NOW() where id = '$id'";
    $connect->query($sql_Upd_Recruitment);

    if ($connect->query($sql_Upd_Recruitment) === false) {
        echo  $connect->error;
        close_connect();
        return;
    }

    $sql_Upd_apply = "UPDATE t_apply set del_flg = 1, update_datetime = NOW() where id_recruitment = '$id'";
    $connect->query($sql_Upd_apply);

    if ($connect->query($sql_Upd_apply) === TRUE) {
        echo 1;
    } else {
        echo  $connect->error;
    }

    close_connect();
}
