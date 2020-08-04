<?php 
    session_start();    
    require '../config/config.php';
    $output = '';


    $item_per_page =2;
    $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
    $content = !empty($_GET['content'])? $_GET['content']:""; //Trang hiện tại
   
    $offset = ($current_page - 1) * $item_per_page;
    $sql = "SELECT * FROM t_product WHERE name  LIKE '%{$content}%' LIMIT " . $item_per_page . " OFFSET " . $offset;

    $result = $mysqli->query($sql) ;       

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
           $img = !empty($row["avarta"])?$row["avarta"]: "../img/logoProduct.png";
            $output .= '
            <tr>
                <td>'.$row["id"].'</td>
                <td>'.$row["name"].'</td>
                <td>'."<img style='width: 200px; height: 200px;' src='$img'>".'</td>
                <td>'.$row["describe_product"].'</td>              
                <td>'.$row["origin"].'</td>
                <td>'.$row["price"].'</td>            
                <td>'.$row["capacity"].'</td>
                <td>'.$row["note"].'</td>
                <td>'.$row["del_flg"].'</td>
                <td><button class="btn" id = "btnEdit" data-id="'.$row["id"].'"><span>Edit</span></button> </td>
                <td><button class="btn" id = "btnDelete" data-id="'.$row["id"].'"><span>Delete</span></button> </td>
            </tr>
        ';
        }   
    } 
    else{
        $output .= '<tr><td colspan="11" align="center">Not found!</td></tr>';
    }

    echo $output;  

    $mysqli -> close();
    
?>