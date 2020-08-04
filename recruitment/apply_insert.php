<?php
require_once "./config/router.php";

if (isset($_POST["recruitment_id"]) && isset($_POST["user_email"])) {
    $recruitment_id = $_POST["recruitment_id"];
    $user_email = $_POST["user_email"];
    require_once "./config/config.php";

    $sqlSelectUser = "SELECT * FROM t_apply where id_recruitment='$recruitment_id' and id_user ='$user_email' and del_flg = 0";

    if ($connect->query($sqlSelectUser)->num_rows > 0) {
        echo 2;
        close_connect();
        return;
    }
    
    $sqlInsert = "INSERT INTO t_apply (id_recruitment, id_user) 
    VALUES ('$recruitment_id', '$user_email')";

    if ($connect->query($sqlInsert) === true) {
        echo 1;
    } else {
        echo 0;
    }

    close_connect();
}
