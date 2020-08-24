<?php
require_once "./config/config.php";

if (isset($_POST["company"]) && isset($_POST["position"]) && isset($_POST["address"])
&& isset($_POST["salary"]) && isset($_POST["deadline"]) && isset($_POST["detail"])
) {    
    $company = $_POST["company"];
    $position = $_POST["position"];
    $address = $_POST["address"];
    $salary = $_POST["salary"];
    $deadline = $_POST["deadline"];
    $detail = $_POST["detail"];

    $sqlSelectUser = "SELECT * FROM t_recruitment where company='$company' and position='$position'
    and deadline='$deadline' and del_flg = 0";

    if ($connect->query($sqlSelectUser)->num_rows > 0) {
        echo 2;
        close_connect();
        return;
    }

    $sqlInsert = "INSERT INTO t_recruitment (company, position, address, salary, deadline, detail) 
    VALUES ('$company', '$position', '$address', '$salary','$deadline', '$detail')";

    if ($connect->query($sqlInsert) === true) {
        echo 1;
    } else {
        echo 0;
    }

    close_connect();
};
?>