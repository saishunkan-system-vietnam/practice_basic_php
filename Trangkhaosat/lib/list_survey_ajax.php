<?

require("../config/config.php");

    $conn = ConnectDB();
  
        $myJSON = array();

        $content = array();

    if(isset($_POST["curentpage"]) && isset($_POST["limit"]))
    {

        $sql = "SELECT COUNT(*) as result FROM t_surveyhdr WHERE del_flg = 0";
        
    
        $row = $conn->query($sql);
        $data = $row->fetch_assoc();
        // Tổng số re cecord
        $total_records = $data['result'];
        
        // trang hiện tại
        $current_page = $_POST["curentpage"];

        $limit = $_POST["limit"];
    
        // tổng số trang
        $total_page = ceil($total_records / $limit);
        
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }

        

        $start = ($current_page - 1) *  $limit ;
        

        $sql = "with A AS (SELECT COUNT(id_hdr) as index_asw, id_hdr  from t_answer GROUP BY id_hdr),\n"
        . "B AS(\n"
        . "select DENSE_RANK() OVER(PARTITION BY 'a' ORDER by hdr.create_datetime DESC) num_row , hdr.create_datetime , ct.content as category,IFNULL(asw.index_asw,0) as index_asw, hdr.content from t_surveyhdr hdr \n"
        . "join t_category ct on hdr.id_category = ct.id\n"
        . "left join A asw on hdr.id = asw.id_hdr\n"
        . "where hdr.del_flg = 0)\n"
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


            // $content = ($total_page, json_encode($myJSON));
            // $content = ($total_page ,  $myJSON);
            // die ($content);
            //  header('Content-Type: application/json');  
            //  echo json_encode($myJSON);    
        }  
        else{
            echo ("err");
        }
    }

    DisconnectDB($conn);

?>