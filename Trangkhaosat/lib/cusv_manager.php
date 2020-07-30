<?
require("../config/config.php");

    $conn = ConnectDB();

    if(isset($_POST["lst"]))
    {
        $lst = $_POST["lst"];

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
                        $sql = "UPDATE t_surveydtl SET del_flg = 1 , update_count = update_count + 1 WHERE id = '{$id_dtl}'";
                    }
                    else
                    {
                        if($item[0]['upd_flg'] =="1")
                        {
                            $sql = "UPDATE t_surveydtl SET answer = '{$content}' , update_count = update_count + 1 WHERE id = '{$id_dtl}'";
                        }
                    }
                }
                else
                {
                    if($item[0]['del_flg'] == "0")
                    {
                        $sql = "INSERT INTO t_surveydtl(id, answer) VALUES('{$id_dtl}', '{$content}')";
                    }
                }
               $conn->query($sql);
            }
        }
    }

    echo true;
    DisconnectDB($conn);
?>