<?php   
    require '../config/router.php';
    require FILE_PHP_CONFIG;
    $output = '';


    $item_per_page =2;
    $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
    $content = !empty($_GET['content'])? $_GET['content']:""; 
   
    $offset = ($current_page - 1) * $item_per_page;
    $sql = "SELECT * FROM t_product WHERE name  LIKE '%{$content}%' LIMIT " . $item_per_page . " OFFSET " . $offset;

    $result = $mysqli->query($sql) ;       

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $img = !empty($row["image"]) ? $row["image"] : "../img/logoProduct.png";
            if (isset($_GET['name']) && $_GET['name'] == "add") {              
                $output .= '
                    <tr>
                        <td>' . $row["name"] . '</td>
                        <td>' . "<img style='width: 150px; height: 150px;' src='$img'>" . '</td>
                        <td>' . $row["price"] . '</td>
                        <td><input type="number" name="quantity" value="1" min="1"></td>
                        <td><button type="submit" class="btnAddProduct btn" name="btnAddProduct">Add</button></td>
                        <input type="hidden" name="productId" value="'.$row["id"].'">
                        <input type="hidden" name="productName" value="'.$row["name"].'">
                        <input type="hidden" name="productPrice" value="'.$row["price"].'">
                    </tr>
                ';
            } else {
                $output .= '
                    <tr>
                        <td>' . $row["name"] . '</td>
                        <td>' . "<img style='width: 150px; height: 150px;' src='$img'>" . '</td>
                        <td>' . $row["describe_product"] . '</td>
                        <td>' . $row["origin"] . '</td>
                        <td>' . $row["price"] . '</td>
                        <td>' . $row["capacity"] . '</td>
                        <td>' . $row["content"] . '</td>
                        <td>' . $row["del_flg"] . '</td>
                        <td><a class="btnEdit btn" href="./product_editing.php?id=' . $row['id'] . '">Edit</a> </td>
                        <td><a class="btnDelete btn" data-id=' . $row['id'] . '>Delete</a></td>
                    </tr>
                ';
            }
                
            }   
        } 
    else{
        $output .= '<tr><td colspan="11" align="center">Không tìm thấy dữ liệu!</td></tr>';
    }

    echo $output;  

    $mysqli -> close();
    
?>