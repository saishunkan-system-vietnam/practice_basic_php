<?
require("../config/config.php");

    $conn = ConnectDB();
    $myJSON = array();
    $content = array();

    if(isset($_POST['getdata']))
    {
        if(isset($_POST["curentpage"]) && isset($_POST["limit"]) && isset($_POST["fnd_content"]))
        {
            $fnd_content = $_POST["fnd_content"];
            
            $sql = "SELECT COUNT(*) as result FROM t_account WHERE del_flg = 0 AND (uid LIKE '%{$fnd_content}%' OR fname LIKE '%{$fnd_content}%' OR lname LIKE '%{$fnd_content}%'OR CONCAT( fname, ' ', lname ) LIKE '%{$fnd_content}%')";
    
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
            $start = (($current_page - 1) *  $limit );
    
            $sql = "SELECT uid, fname, lname, gender, CASE WHEN admin_flg = 1 THEN 'Admin' ELSE '' END AS admin FROM t_account
                    WHERE del_flg = 0 AND (uid LIKE '%{$fnd_content}%' OR fname LIKE '%{$fnd_content}%' OR lname LIKE '%{$fnd_content}%' OR CONCAT( fname, ' ', lname ) LIKE '%{$fnd_content}%')
                    ORDER BY create_datetime DESC LIMIT {$start} , {$limit}";
            // die($sql);
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
    }

    DisconnectDB($conn);
?>