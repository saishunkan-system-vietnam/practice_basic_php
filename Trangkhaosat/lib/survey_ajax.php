<?
    session_start();
    require("../config/config.php");

    $conn = ConnectDB();
  
    $myJSON = array();
    $uid = "";
    $id = "";

    if(isset($_SESSION['dataLogin']))
    {
        $uid = $_SESSION['dataLogin'];
    }

    if(isset($_POST['getInfoSurvey']) && isset($_POST['id']))
    {  
        $id = $_POST['id'];

        $sql = "SELECT hdr.content, dt.answer, hdr.id_multi, hdr.id as id_hdr, dt.id as id_dtl, dt.sl_asw, dt.id_asw \n"
            ."FROM t_surveyhdr hdr \n" 
            ."LEFT JOIN \n"
            ."( \n"
            ."SELECT IFNULL(asw.id,'N/A') as id_asw, dt.id, dt.stt, dt.id_hdr, dt.answer, CASE WHEN asw.id is null then 0 else 1 END as sl_asw \n"
            ."FROM t_surveydtl dt \n"
            ."LEFT JOIN t_answer asw on dt.id = asw.id_dtl and asw.del_flg = 0 and asw.usr_id = '{$uid}' \n"
            ."where dt.del_flg = 0\n"
            .") \n"
            ."dt on hdr.id = dt.id_hdr\n"
            ."where hdr.del_flg = 0 and hdr.id_multi = '{$id}'
            ORDER BY hdr.stt,  dt.stt";

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

    if(isset($_POST['GetIndexSvMulti']) && isset($_POST['id_multi']))
    {    
        $id_multi = $_POST['id_multi'];
        $sql = "SELECT COUNT(*) as result FROM t_surveyhdr WHERE del_flg = 0 AND id_multi = '{$id_multi}'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            echo  ($data['result']);
        }
    }

    if(isset($_POST['createSurvey']) && isset($_POST['id_hdr']) && isset($_POST['id_dtl']) && isset($_POST['id']))
    {
        $id_hdr = $_POST['id_hdr'];
        $id_dtl = $_POST['id_dtl'];
        $id =  $_POST['id'];
            
        $sql = "SELECT id FROM t_answer where usr_id = '{$uid}' and del_flg = 0 and id_hdr = '{$id_hdr}' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $id = $data["id"];
            $sql = "UPDATE t_answer SET id_dtl = '{$id_dtl}' WHERE id = '{$id}'";                    
            $result_upd = $conn->query($sql);
            echo $result_upd;
        }
        else
        {   
            $sql = "INSERT INTO t_answer(id, id_hdr ,id_dtl, usr_id) VALUES ('{$id}','{$id_hdr}','{$id_dtl}','{$uid}')";
            $result = $conn->query($sql);
            echo $result;
        }
            
    }
    
    DisconnectDB($conn);
?>