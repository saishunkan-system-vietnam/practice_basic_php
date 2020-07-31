<?
require("../config/config.php");

    $conn = ConnectDB();
    if(isset($_POST["stt"]) && isset($_POST["id_hdr"]) )
    {
        $id_hdr = $_POST["id_hdr"];
        $stt = $_POST["stt"];

        if($stt =="Del")
        {
            $sql = "UPDATE t_surveyhdr SET del_flg = 1 WHERE id = '{$id_hdr}'";
            $conn->query($sql);

            $sql = "UPDATE t_surveydtl SET del_flg = 1 WHERE id_hdr = '{$id_hdr}'";
            $conn->query($sql);
        }
        else
        {
            if(isset($_POST["lst"]) && isset($_POST["content_hdr"]) && isset($_POST["id_ct"]))
            {
                $lst = $_POST["lst"];
                $content_hdr = $_POST["content_hdr"];
                $id_ct = $_POST["id_ct"];
                if($stt == "Add")
                {
                    $sql = "INSERT INTO t_surveyhdr(id, id_category, content) VALUES ('{$id_hdr}', '{$id_ct}', '{$content_hdr}')";
                    $conn->query($sql);
                    
                    foreach ($lst as $item) {
                        if($item[0]['del_flg']=="1")
                        {
                            continue;
                        }
                        else
                        {
                            $id_dtl = $item[0]['id'];
                            $content = $item[0]['cnt_asw'];
                            if($item[0]['del_flg'] == "0")
                            {
                                $sql = "INSERT INTO t_surveydtl(id, id_hdr, answer) VALUES('{$id_dtl}', '{$id_hdr}', '{$content}')";
                            }
                        $conn->query($sql);
                        }
                    }
                }
                else if($stt == "Upd")
                {
                    $sql = "UPDATE t_surveyhdr SET id_category = '{$id_ct}', content = '{$content_hdr}' \n"
                    . "WHERE id = '{$id_hdr}' and (id_category != '{$id_ct}' || content != '{$content_hdr}') and del_flg = 0";

                    $conn->query($sql);


                    //cnt_asw; "id": id, "db": "0",upd_flg "del_flg": "0"
                    foreach ($lst as $item) {
                        if($item[0]['db']=="0" && $item[0]['del_flg']=="1")
                        {
                            continue;
                        }
                        else
                        {
                            $id_dtl = $item[0]['id'];
                            $content = $item[0]['cnt_asw'];
                            if($item[0]['db'] == "1")
                            {
                                if($item[0]['del_flg'] =="1")
                                {
                                    $sql = "UPDATE t_surveydtl SET del_flg = 1 WHERE id = '{$id_dtl}'";
                                }
                                else
                                {
                                    if($item[0]['upd_flg'] =="1")
                                    {
                                        $sql = "UPDATE t_surveydtl SET answer = '{$content}'WHERE id = '{$id_dtl}'";
                                        // die $sql;
                                    }
                                }
                            }
                            else
                            {
                                if($item[0]['del_flg'] == "0")
                                {
                                    $sql = "INSERT INTO t_surveydtl(id, id_hdr, answer) VALUES('{$id_dtl}','{$id_hdr}', '{$content}')";
                                }
                            }
                        $conn->query($sql);
                        }
                    }
                }
            }
        }
    }

    if(isset($_POST['GetCbo']) && isset($_POST["id_ct"]))
    {
        $id_ct = $_POST['id_ct'];

        $sql = "SELECT ct.id, ct.content FROM t_category ct";

        $result = $conn->query($sql);
        

        if ($result->num_rows > 0)
        {
            while( $data = $result->fetch_assoc()) 
            {
                if($data['id'] == $id_ct)
                {
                    echo ('<option value="'. $data['id'] .'" selected> '. $data['content'] .'</option>');
                }
                else
                {
                    echo ('<option value="'. $data['id'] .'"> '. $data['content'] .'</option>');
                }
            }
        }                             
    }
    
    if(isset($_POST['GetRow']) && isset($_POST["id_hdr"]))
    {
        $myJSON = array();
        $content = array();
        $id_hdr = $_POST['id_hdr'];
        $hdr_content = "";

        $sql = "SELECT content FROM t_surveyhdr WHERE id = '{$id_hdr}' AND del_flg = 0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
            $data = $result->fetch_assoc();
            $hdr_content = $data['content'];
        }


        $sql = "SELECT id, answer as content FROM t_surveydtl WHERE id_hdr = '{$id_hdr}' AND del_flg = 0";
        $result = $conn->query($sql);       

        if ($result->num_rows > 0)
        {
            while( $data = $result->fetch_assoc()) 
            {
                $myJSON[count($myJSON)] = $data;
            }

            $content += ["hdr_content"=>$hdr_content];
            $content += ["data" => $myJSON];

            header('Content-Type: application/json');
            echo (json_encode($content));
        }                             
    }

    DisconnectDB($conn);
?>