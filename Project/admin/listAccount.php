<?php 
    require '../config/router.php';
    $output = '';

    // Select dữ liệu
    $result = $mysqli->query("SELECT * FROM t_account");   
    if ($result->num_rows) {
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
        $output .= '<tr><td colspan="3" align="center">Not found!</td></tr>';
    }

    echo $output;  
    
    // Đóng kết nối
    $mysqli -> close();

?>