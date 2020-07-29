<?

require("../config/config.php");

    $conn = ConnectDB();
  
        $myJSON = array();
        $content = array();

    if(isset($_POST["curentpage"]) && isset($_POST["limit"]) && isset($_POST["id_catogery"]) && isset($_POST["fnd_content"]))
    {
        $id_category = $_POST["id_catogery"];
        $fnd_content = $_POST["fnd_content"];
        
        
       
        if($id_category != "0")
        {
            $row = $conn->query("SELECT id FROM t_category WHERE del_flg = 0 and content = '{$id_category}' LIMIT 1");
            $data = $row->fetch_assoc();
            $id_category = $data['id'] ;
        }
        
        if($id_category != "0")
        {
            $sql = "SELECT COUNT(*) as result FROM t_surveyhdr WHERE del_flg = 0 and id_category = '{$id_category}' and content like '%{$fnd_content}%'";
        }
        else
        {
            $sql = "SELECT COUNT(*) as result FROM t_surveyhdr WHERE del_flg = 0 and content like '%{$fnd_content}%'";
        }

        

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

        if($id_category != "0")
        {
            $sql = "with A AS (SELECT COUNT(id_hdr) as index_asw, id_hdr  from t_answer GROUP BY id_hdr),\n"
            . "B AS(\n"
            . "select DENSE_RANK() OVER(PARTITION BY 'a' ORDER by hdr.create_datetime DESC) num_row , hdr.create_datetime , hdr.id, ct.content as category, IFNULL(asw.index_asw,0) as index_asw, hdr.content from t_surveyhdr hdr \n"
            . "join t_category ct on hdr.id_category = ct.id and ct.id = '{$id_category}'\n"
            . "left join A asw on hdr.id = asw.id_hdr\n"
            . "where hdr.del_flg = 0 and hdr.content like '%{$fnd_content}%'),\n"
            ."C AS (SELECT * FROM B WHERE num_row >= {$start} LIMIT {$limit}) \n"
            . "SELECT hdr.num_row, hdr.id, hdr.category, hdr.create_datetime, hdr.index_asw, hdr.content, dtl.answer FROM C hdr \n"
            ."LEFT JOIN t_surveydtl dtl on hdr.id = dtl.id_hdr\n"
            ."ORDER by hdr.create_datetime DESC";
        }
        else
        {
            $id_category = $_POST["id_catogery"] ;
            $sql = "with A AS (SELECT COUNT(id_hdr) as index_asw, id_hdr  from t_answer GROUP BY id_hdr),\n"
            . "B AS(\n"
            . "select DENSE_RANK() OVER(PARTITION BY 'a' ORDER by hdr.create_datetime DESC) num_row , hdr.create_datetime , hdr.id, ct.content as category,IFNULL(asw.index_asw,0) as index_asw, hdr.content from t_surveyhdr hdr \n"
            . "join t_category ct on hdr.id_category = ct.id\n"
            . "left join A asw on hdr.id = asw.id_hdr\n"
            . "where hdr.del_flg = 0 and hdr.content like '%{$fnd_content}%'),\n"
            ."C AS (SELECT * FROM B WHERE num_row >= {$start} LIMIT {$limit}) \n"
            . "SELECT hdr.num_row, hdr.id, hdr.category, hdr.create_datetime, hdr.index_asw, hdr.content, dtl.answer FROM C hdr \n"
            ."LEFT JOIN t_surveydtl dtl on hdr.id = dtl.id_hdr\n"
            ."ORDER by hdr.create_datetime DESC";
        }
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