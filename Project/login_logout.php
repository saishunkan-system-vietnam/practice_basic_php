<?php
    session_start();
    require './config/router.php';
    require FILE_PHP_CONFIG;

    // Logout
    if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'logout'){
        // xoa session
        unset($_SESSION[SESSION_USERNAME]);
        unset($_SESSION["role"]);

        // Xóa cookie
        setcookie(COOKIE_USERNAME, '', time() - 14400);
        header("location: ./index.php");
    }



    // Login
    if (isset($_POST["uid"]) && isset($_POST["pass"]) && isset($_POST["save"]) ) {
        $email = $_POST["uid"];
        $password = md5($_POST["pass"]);

        $result = $mysqli->query("SELECT * FROM t_account WHERE id = '$email' AND password = '$password' AND del_flg =0");
        if ($result->num_rows) {
            while($row = $result->fetch_assoc()){
                $_SESSION[SESSION_USERNAME] = $email;
                $_SESSION["role"] = $row["role"] ;
            }
            

            if ($_POST["save"] == "1") {
                setcookie(COOKIE_USERNAME, $email, time() + 14400);
                setcookie(COOKIE_PASSWORD, $password, time() + 14400);
            }
            echo true;            
        }   else{
            echo false;
        }
    }

    // Đóng kết nối
    $mysqli -> close();
?>