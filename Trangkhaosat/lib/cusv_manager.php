<?
require("../config/config.php");

    $conn = ConnectDB();
    if(isset($_POST["stt"]) && isset($_POST["id_hdr"])  && isset($_POST["id_hdr_multi"]) )
    {
        $id_hdr = $_POST["id_hdr"];
        $id_hdr_multi = $_POST["id_hdr_multi"];
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
                    $sql = "INSERT INTO t_surveyhdr(id, id_multi, id_category, content) VALUES ('{$id_hdr}', '{$id_hdr_multi}', '{$id_ct}', '{$content_hdr}')";
                    $conn->query($sql);
                    
                    foreach ($lst as $item) {
                        // if($item[0]['del_flg']== 1)
                        // {
                        //     continue;
                        // }
                        // else
                        // {
                            $id_dtl = $item['id'];
                            $content = $item['cnt_asw'];
                            // if($item[0]['del_flg'] == "0")
                            // {
                                $sql = "INSERT INTO t_surveydtl(id, id_hdr, answer) VALUES('{$id_dtl}', '{$id_hdr}', '{$content}')";
                            // }
                        $conn->query($sql);
                        // }
                    }
                }
                else if($stt == "Upd")
                {
                    $sql = "UPDATE t_surveyhdr SET id_category = '{$id_ct}', content = '{$content_hdr}' \n"
                    . "WHERE id = '{$id_hdr}' AND (id_category != '{$id_ct}' OR content != '{$content_hdr}') AND del_flg = 0";

                    $conn->query($sql);


                    //cnt_asw; "id": id, "db": "0",upd_flg "del_flg": "0"
                    foreach ($lst as $item) {
               
                            $id_dtl = $item['id'];
                            $content = $item['cnt_asw'];
                            if($item['db'] == "1")
                            {
                                if($item['del_flg'] =="1")
                                {
                                    $sql = "UPDATE t_surveydtl SET del_flg = 1 WHERE id = '{$id_dtl}'";
                                }
                                else
                                {
                                    if($item['upd_flg'] =="1")
                                    {
                                        $sql = "UPDATE t_surveydtl SET answer = '{$content}'WHERE id = '{$id_dtl}'";
                                        // die $sql;
                                    }
                                }
                            }
                            else
                            {
                               $sql = "INSERT INTO t_surveydtl(id, id_hdr, answer) VALUES('{$id_dtl}','{$id_hdr}', '{$content}')";
                            }
                        $conn->query($sql);
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


        $sql = "SELECT id, answer as content FROM t_surveydtl WHERE id_hdr = '{$id_hdr}' AND del_flg = 0 ORDER BY stt";
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

    if(isset($_POST["del_all"]) && isset($_POST["id_multi"]))
    {
        $id_multi = $_POST["id_multi"];

        $sql = "SELECT hdr.id as 'id_hdr' FROM t_surveyhdr hdr WHERE hdr.id_multi = '{$id_multi}'";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while( $data = $result->fetch_assoc()) 
            {
                $id_hdr = $data["id_hdr"];

                $sql = "UPDATE t_surveyhdr SET del_flg = 1 WHERE id = '{$id_hdr}'";
                $conn->query($sql);

                $sql = "UPDATE t_surveydtl SET del_flg = 1 WHERE id_hdr = '{$id_hdr}'";
                $conn->query($sql);
            }
        }  
    }

    DisconnectDB($conn);
?>