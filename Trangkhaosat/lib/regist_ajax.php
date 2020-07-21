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
            if(isset($_POST["uid"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["pass"]) && isset($_POST["tel"]))
            {
                $uid = $_POST["uid"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $pass = $_POST["pass"];
                $tel = $_POST["tel"];

                $sql = "INSERT INTO t_account(uid, fname, lname, pass, tel) VALUES ('{$uid}','{$fname}','{$lname}','{$pass}','{$tel}')";

                $result = $conn->query($sql);
                echo $result;
            }
            else
                echo false;    
        }
    } 

    DisconnectDB($conn);
?>