<?
    session_start();
    require_once("../config/config.php");
    $conn = ConnectDB();

    if(!isset($_SESSION['ss_id']))
    {
        $sql = "UPDATE `counter` SET `cnt` = `cnt` + 1 Where `id` = 9999";
        $conn->query($sql);
        
        $_SESSION['ss_id'] = $_SERVER['REMOTE_ADDR']. time();
    }

    $timeout=1;
    $id= $_SESSION['ss_id'];
    $user= isset($_SESSION['dataLogin']) ? $_SESSION['dataLogin'] : "";

    $sql= "SELECT * FROM user_online WHERE id='{$id}'";
    $result= $conn->query($sql);

    if ($result->num_rows > 0)
     {
     $sql="UPDATE user_online SET lastvisit = unix_timestamp(), user='{$user}' where id='{$id}'";
     $conn->query($sql);
    }
    else
    {
        $sql="INSERT INTO user_online VALUES ('{$id}', unix_timestamp(),'$user')";
        $conn->query($sql);
    }

    $sql="DELETE FROM user_online WHERE unix_timestamp() - lastvisit > $timeout * 60";
    $conn->query($sql);

    
    if(isset($_POST["get_info"]))
    {
        $myJSON = array();

        $online = 0;
        $mem = 0;
        $guest = 0;
        $cnt_access = 0;
        $question = 0;
        $answer = 0;
        $user = 0;

        $sql="SELECT count(*) as cnt from user_online";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $online = $data['cnt'];
        }


        $sql="select count(*) as cnt from user_online where user!=''";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $mem = $data['cnt'];
        }

        $sql="select count(*) as cnt from user_online where user=''";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $guest = $data['cnt'];
        }

        $sql="SELECT cnt from counter";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $cnt_access = $data['cnt'];
        }

        $sql="SELECT count(*) as cnt from t_surveyhdr WHERE del_flg = 0";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $question = $data['cnt'];
        }

        $sql="SELECT count(*) as cnt from t_answer WHERE del_flg = 0";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $answer = $data['cnt'];
        }

        $sql="SELECT count(*) as cnt from t_account WHERE del_flg = 0";
        $result=$conn->query($sql);
        
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $user = $data['cnt'];
        }
        
        $myJSON += ["online"=>$online];
        $myJSON += ["mem"=>$mem];
        $myJSON += ["guest"=>$guest];
        $myJSON += ["cnt_access"=>$cnt_access];
        $myJSON += ["question"=>$question];
        $myJSON += ["answer"=>$answer];
        $myJSON += ["user"=>$user];

        header('Content-Type: application/json');
        echo (json_encode($myJSON));
    }

    DisconnectDB($conn);
?>