<?
    require("../config/config.php");

    $conn = ConnectDB();
    if(isset($_POST["proc"]))
    {
        if($_POST["proc"] == "CheckExistAccount")
        {  
            $myJSON = array();

            if(isset($_POST["uid"]))
            {
                $uid = $_POST["uid"];
                $sql = "SELECT COUNT(*) as result FROM t_account WHERE uid = '{$uid}'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0)
                {
                    while( $data = $result->fetch_assoc()) 
                    {
                        $myJSON[count($myJSON)] = $data;
                    }  
                    header('Content-Type: application/json');  
                    echo json_encode($myJSON);    
                }  
                else{
                    echo ("err");
                }
            }
            else{
                echo("err");
            }            
        }
        elseif($_POST["proc"] == "Regist")
        {
            if(isset($_POST["uid"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["pass"]) && isset($_POST["tel"])&& isset($_POST["gender"]) && isset($_POST["admin_flg"]))
            {
                $uid = $_POST["uid"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $pass = $_POST["pass"];
                $tel = $_POST["tel"];
                $gender = $_POST["gender"];
                $admin_flg = $_POST["admin_flg"];

                $sql = "INSERT INTO t_account(uid, fname, lname, pass, gender, tel, admin_flg) VALUES ('{$uid}','{$fname}','{$lname}','{$pass}','{$gender}','{$tel}', '{$admin_flg}')";

                $result = $conn->query($sql);
                echo $result;
            }
            else
                echo false;    
        }
        elseif($_POST["proc"] == "Upd")
        {
            if(isset($_POST["uid"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["pass"]) && isset($_POST["tel"])&& isset($_POST["gender"]) && isset($_POST["admin_flg"]))
            {
                $uid = $_POST["uid"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $pass = $_POST["pass"];
                $tel = $_POST["tel"];
                $gender = $_POST["gender"];
                $admin_flg = $_POST["admin_flg"];

                $sql = "UPDATE t_account SET fname = '{$fname}',lname = '{$lname}',pass = '{$pass}',gender = '{$gender}',tel = '{$tel}', admin_flg = '{$admin_flg}' WHERE uid = '{$uid}'";

                $result = $conn->query($sql);
                echo $result;
            }
            else
                echo false;    
        }
        elseif($_POST["proc"] == "Get")
        {
            $myJSON = array();
            if(isset($_POST["uid"]))
            {
                $uid = $_POST["uid"];

                $sql = "SELECT uid, fname, lname, gender, pass, tel, admin_flg FROM t_account WHERE uid = '{$uid}' ";

                $result = $conn->query($sql);

                if ($result->num_rows > 0)
                {
                    while( $data = $result->fetch_assoc()) 
                    {
                        $myJSON[count($myJSON)] = $data;
                    }  
                header('Content-Type: application/json');  
                echo json_encode($myJSON);
                }
            }   
        }
        elseif($_POST["proc"] == "Del")
        {
            if(isset($_POST["uid"]))
            {
                $uid = $_POST["uid"];
                $sql = "UPDATE t_account SET del_flg = 1 WHERE uid = '{$uid}'";
                $result = $conn->query($sql);

                echo($result);
            }   
        }
    } 

    DisconnectDB($conn);
?>