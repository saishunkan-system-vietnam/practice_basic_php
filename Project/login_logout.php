<?php
    require_once './config/router.php';
    require_once FILE_PHP_CONFIG;

    // Logout
    if(isset($_REQUEST['type']) && $_REQUEST['type'] == 'logout'){
        // xoa session
        unset($_SESSION[SESSION_USERNAME]);
        unset($_SESSION["role"]);
        header("location: ./index.php");	
    }

    // Login
    if (isset($_POST["uid"]) && isset($_POST["pass"]) && isset($_POST["save"]) ) {
        $email = $_POST["uid"];
        $password = md5($_POST["pass"]);

        // Kết nối DataBase
        connect();

        $result = $conn->query("SELECT * FROM t_account WHERE id = '$email' AND password = '$password' AND del_flg = 0");

        if ($result->num_rows>0) {
            while($row = $result->fetch_assoc()){
                $_SESSION[SESSION_USERNAME] = $email;
                $_SESSION["role"] = $row["role"] ;
            }
            

            if ($_POST["save"] == "1") {
                setcookie(COOKIE_USERNAME, $email, time() + 14400);
                setcookie(COOKIE_PASSWORD, $_POST["pass"], time() + 14400);
            }
            echo json_encode(['status'=>'success']);   
        } else{
            echo json_encode(['status'=>'error']);
        }
    }

    // Đóng kết nối
    disconnect();
?>