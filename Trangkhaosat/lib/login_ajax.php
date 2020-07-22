<?
    session_start();
    require("../config/config.php");

    $cookie_time = (3600 * 24 * 30);
    $uid = '';
    $pass = '';

    $conn = ConnectDB();
    
    if(isset($_POST["uid"]) && isset($_POST["pass"]) && isset($_POST["save"]))
    {   
        $uid = $_POST["uid"];
        $pass = $_POST["pass"];
        $save = $_POST["save"];

        $myJSON = array();

        $sql = "SELECT uid, admin_flg, pass FROM t_account WHERE uid = '{$uid}' and pass = '{$pass}'";
    
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            while( $data = $result->fetch_assoc()) 
                {
                   $myJSON[count($myJSON)] = $data;
                }
                
            $_SESSION['dataLogin'] = $myJSON[0]["uid"];
            $_SESSION['flg_admin'] = $myJSON[0]["admin_flg"];
            

            if($save == "true")
            {
                setcookie(COOKIE_NAME,"uid=".$uid."&pass=".$pass,time() + $cookie_time,'/');
            }
            else
            {
                setcookie( COOKIE_NAME, "", time()- 60,'/');
            }
            echo true;            
        }
        else
        {
            echo false;
        }
               
    }
    
    DisconnectDB($conn);

?>