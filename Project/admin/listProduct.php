<?php   
    require_once '../config/router.php';
    require_once FILE_PHP_CONFIG;
    $output = '';


    $item_per_page =2;
    $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
    $content = !empty($_GET['content'])? $_GET['content']:""; 
   
    $offset = ($current_page - 1) * $item_per_page;

    // Kết nối DataBase
    connect();

    $sql = "SELECT * FROM t_product WHERE name  LIKE '%{$content}%' LIMIT " . $item_per_page . " OFFSET " . $offset;

    $result = $conn->query($sql) ;       

    
    if ($result->num_rows > 0) 
    {     
        while ($row = $result->fetch_assoc()) 
        { 
            $img = !empty($row["image"]) ? $row["image"] : "../img/logoProduct.png";
                $output .= '
                    <tr>
                        <td>'.$row["name"].'</td>
                        <td>'."<img style='width: 150px; height: 150px;' src='$img'>".'</td>
                        <td>'.$row["describe_product"].'</td>
                        <td>'.$row["origin"].'</td>
                        <td>'.$row["price"].'</td>
                        <td>'.$row["capacity"].'</td>
                        <td>'.$row["del_flg"].'</td>
                        <td><a class="btnEdit btn" href="./product_editing.php?id='.$row['id'].'">Edit</a> </td>
                        <td><a class="btnDelete btn" data-id='.$row['id'].'>Delete</a></td>
                    </tr>
                ';              
        }   
    } 
    else
    {
        $output .= '<tr><td colspan="11" align="center">Không tìm thấy dữ liệu!</td></tr>';
    }

    echo $output;  

    // Đóng kết nối
    disconnect();
    
?>