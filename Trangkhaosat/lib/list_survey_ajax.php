<?

require("../config/config.php");

    $conn = ConnectDB();
  
        $myJSON = array();
        $content = array();

    if(isset($_POST["curentpage"]) && isset($_POST["limit"]))
    {
        $sql = "WITH A AS(SELECT id_multi FROM t_surveyhdr WHERE del_flg = 0 GROUP BY id_multi)
                SELECT COUNT(*) as result FROM A";
        
        $row = $conn->query($sql);
        $data = $row->fetch_assoc();

        $total_records = $data['result'];
        $current_page = $_POST["curentpage"];
        $limit = $_POST["limit"];
    
        $total_page = ceil($total_records / $limit);
        
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }

        $start = (($current_page - 1) *  $limit ) + 1;

        $sql = "with A AS (SELECT COUNT(id_hdr) as index_asw, id_hdr  from t_answer WHERE id_dtl IN (SELECT id from t_surveydtl where del_flg = 0) GROUP BY id_hdr ),\n"
        . "B AS(\n"
        . "select DENSE_RANK() OVER(PARTITION BY 'a' ORDER by hdr.create_datetime DESC) num_row , hdr.create_datetime , hdr.id, ct.content as category,IFNULL(asw.index_asw,0) as index_asw, hdr.content from t_surveyhdr hdr \n"
        . "join t_category ct on hdr.id_category = ct.id\n"
        . "left join A asw on hdr.id_multi = asw.id_hdr\n"
        . "where hdr.del_flg = 0 and hdr.id = hdr.id_multi)\n"
        . "SELECT * FROM B WHERE num_row >= {$start} LIMIT {$limit}";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while( $data = $result->fetch_assoc()) 
            {
                $myJSON[count($myJSON)] = $data;
            }  
              
            $content += ["current_page"=>$current_page];
            $content += ["total_page"=>$total_page];
            $content += ["data" => $myJSON];
            header('Content-Type: application/json');
            echo (json_encode($content));
        }  
        else{
            echo ("err");
        }
    }

    DisconnectDB($conn);

?>