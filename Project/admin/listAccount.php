<?php 
    session_start();    
    require '../config/config.php';
    $output = '';


    $item_per_page =2;
    $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
    $content = !empty($_GET['content'])? $_GET['content']:""; //Trang hiện tại
   
    $offset = ($current_page - 1) * $item_per_page;
    $sql = "SELECT * FROM t_account WHERE fullname  LIKE '%{$content}%' LIMIT " . $item_per_page . " OFFSET " . $offset;

    // if (isset($POST['str'])) {
    //     $str = $POST['str'];
        $result = $mysqli->query($sql) ;       
    // }
    // else{
    //     $result = $mysqli->query("SELECT * FROM t_account LIMIT " . $item_per_page . " OFFSET " . $offset) ;
    // }
    
    // Đóng kết nối
    

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $sexStr = $row["sex"] =="1"?"Nam":"Nữ";
            $output .= '
            <tr>
                <td>'.$row["fullname"].'</td>
                <td>'.$sexStr.'</td>
                <td>'.$row["birthday"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["id"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["password"].'</td>
                <td>'.$row["del_flg"].'</td>
                <td>'.$row["role"].'</td>
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