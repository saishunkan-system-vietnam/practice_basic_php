<?php   
    require '../config/router.php';
    require FILE_PHP_CONFIG;
    $output = '';


    $item_per_page =2;
    $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
    $content = !empty($_GET['content'])? $_GET['content']:""; 
   
    $offset = ($current_page - 1) * $item_per_page;
    $sql = "SELECT * FROM t_order WHERE id  LIKE '%{$content}%' LIMIT " . $item_per_page . " OFFSET " . $offset;

    $result = $mysqli->query($sql) ;       

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            switch ($row["status"]) {
            case 0:
                $row["status"] = "Chờ xử lý";
                break;
            case 1:
                $row["status"] = "Đã tiếp nhận";
                break;
            case 2:
                $row["status"] = "Đang gửi";
                break;
            case 3:
                $row["status"] = "Đã nhận";
                break;
            case 4:
                $row["status"] = "Cancel";
                break;
            }

            ($row["del_flg"]==0)?$row["del_flg"] ="Off":$row["del_flg"]="On";
            $output .= '
            <tr>
                <td>'.$row["id"].'</td>
                <td>'.$row["recipient"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["payments"].'</td>
                <td>'.$row["status"].'</td>
                <td>'.$row["create_datetime"].'</td>
                <td>'.$row["del_flg"].'</td>
                <td><a class="btnEdit btn" href="./order_editing.php?id='.$row['id'].'">Edit</a> </td>
                <td><a class="btnDelete btn" data-id='.$row['id'].'>Delete</a></td>
            </tr>
        ';
        }   
    } 
    else{
        $output .= '<tr><td colspan="11" align="center">Không tìm thấy dữ liệu!</td></tr>';
    }

    echo $output;  

    $mysqli -> close();
    
?>