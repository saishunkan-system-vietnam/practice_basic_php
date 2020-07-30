<?php
require('./config/router.php');
require(SITE_CONFIG);

if (isset($_POST["inpUser"])) {
    //trim and lowercase username
    $username =  strtolower(trim($_POST["inpUser"]));

    //check username in db
    $resultUser = mysqli_query($connect, "SELECT user_name FROM t_account WHERE del_flg=0 and user_name = '$username'");

    //return total count
    $username_exist = mysqli_num_rows($resultUser); //total records

    //if value is more than 0, username is not available
    if ($username_exist) {

        echo "UserName đã tồn tại";
    }

    //close db connection
    mysqli_close($connect);
};

if (isset($_POST["inpEmail"])) {
    //trim and lowercase username
    $mail =  strtolower(trim($_POST["inpEmail"]));

    //check email in db
    $resultMail = mysqli_query($connect, "SELECT email FROM t_account WHERE del_flg = 0 and email = '$mail'");

    //return total count
    $mail_exist = mysqli_num_rows($resultMail); //total records

    //if value is more than 0, username is not available
    if ($mail_exist) {
        echo "Email đã tồn tại";
    }
    //close db connection
    mysqli_close($connect);
}
