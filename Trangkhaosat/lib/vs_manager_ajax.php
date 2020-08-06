<?

require("../config/config.php");

    $conn = ConnectDB();
  
        $myJSON = array();
        $content = array();

    if(isset($_POST["curentpage"]) && isset($_POST["limit"]) && isset($_POST["id_catogery"]) && isset($_POST["fnd_content"]))
    {
        $id_category = $_POST["id_catogery"];
        $fnd_content = $_POST["fnd_content"];
        
        $sql = "WITH A AS(SELECT id_multi FROM t_surveyhdr WHERE del_flg = 0 AND id_category = CASE WHEN '{$id_category}' = '0' THEN id_category ELSE '{$id_category}' END
                AND content like '%{$fnd_content}%' GROUP BY id_multi)
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
        $limit = $start -1  + $limit;


            $sql = "WITH A_HDR AS(SELECT id_multi, max(`create_datetime`) as create_datetime  FROM t_surveyhdr WHERE del_flg = 0
            and id_category = CASE WHEN '{$id_category}' = '0' THEN id_category ELSE '{$id_category}' END  and content like '%{$fnd_content}%'
            GROUP BY id_multi),
            B_HDR AS(
            select  DENSE_RANK() OVER( ORDER BY `create_datetime` DESC) num_row ,id_multi
            from  A_HDR),
            A AS (SELECT COUNT(id_hdr) as index_asw, id_hdr  from t_answer where id_dtl IN ( select id from t_surveydtl where del_flg = 0) GROUP BY id_hdr ),
            B AS(
            select  b_hdr.num_row ,b_hdr.id_multi, hdr.stt as stt_hdr, hdr.create_datetime , hdr.id_category, hdr.id, ct.content as category, IFNULL(asw.index_asw,0) as index_asw, hdr.content 
            from t_surveyhdr hdr
            JOIN B_HDR b_hdr on hdr.id_multi = b_hdr.id_multi
            join t_category ct on hdr.id_category = ct.id
            left join A asw on hdr.id_multi = asw.id_hdr
            where hdr.del_flg = 0),
            C AS (SELECT * FROM B  WHERE num_row >= {$start} AND num_row <= {$limit}) 
            SELECT hdr.num_row, hdr.id,hdr.id_multi, hdr.id_category, hdr.category, hdr.create_datetime, hdr.index_asw, hdr.content, dtl.answer FROM C hdr 
            LEFT JOIN t_surveydtl dtl on hdr.id = dtl.id_hdr and dtl.del_flg = 0
            ORDER by hdr.num_row, hdr.stt_hdr, dtl.stt";
           
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

    if(isset($_POST["id_multi"]) && isset($_POST["get_sv"]))
    {
        $myJSON = array();
       
        $id_multi = $_POST["id_multi"];

        $sql = "SELECT hdr.id as 'id_hdr', hdr.content FROM t_surveyhdr hdr WHERE hdr.id_multi = '{$id_multi}' and del_flg = 0 ORDER BY stt";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while( $data = $result->fetch_assoc()) 
            {
                $myJSON[count($myJSON)] = $data;
            }  
 
            header('Content-Type: application/json');
            echo (json_encode($myJSON));
        }  
        else{
            echo ("err");
        }
    }

    if(isset($_POST["id_multi"]) && isset($_POST["report"]))
    {
        $myJSON = array();
       
        $id_multi = $_POST["id_multi"];

        $sql = "SELECT hdr.id, hdr.content, dtl.answer, (SELECT COUNT(*) from t_answer  where id_dtl = dtl.id) as indexasw FROM t_surveyhdr hdr 
        LEFT JOIN 
        t_surveydtl dtl on hdr.id = dtl.id_hdr and dtl.del_flg = 0 
        WHERE hdr.del_flg = 0 AND hdr.id_multi = '{$id_multi}'
        ORDER BY hdr.stt, dtl.stt";

        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            while( $data = $result->fetch_assoc()) 
            {
                $myJSON[count($myJSON)] = $data;
            }  
 
            header('Content-Type: application/json');
            echo (json_encode($myJSON));
        }  
        else{
            echo ("err");
        }
    }
    
    DisconnectDB($conn);

?>