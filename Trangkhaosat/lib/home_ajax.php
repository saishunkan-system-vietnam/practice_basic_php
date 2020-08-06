<?
    require("../config/config.php");

    $conn = ConnectDB();
    $myJSON = array();

        $sql = "with A AS(\n"
        . "    SELECT ROW_NUMBER() OVER ( PARTITION BY ct.id ORDER BY ct.id, hdr.create_datetime DESC) row_num, hdr.content , ct.content as category, hdr.create_datetime, hdr.id FROM t_surveyhdr hdr join t_category ct on hdr.id_category = ct.id where hdr.del_flg = 0 and hdr.id = hdr.id_multi)\n"
        . "    Select * from A where row_num < 4";

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

    DisconnectDB($conn);
?>