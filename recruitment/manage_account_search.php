<?php
require_once "./config/config.php";

$key = $_GET["key"];
$current_page = isset($_GET['current_page']) ?  $_GET['current_page'] : "";
$sqlCount = "SELECT count(*) as total FROM t_account where username  LIKE '%$key%'";
$result = $connect->query($sqlCount);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $total_records = $row['total'];
    }
} else {
    close_connect();
    echo 0;   
}

$limit = 10;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;

$sqlSelectData = "SELECT * FROM t_account where username  LIKE '%$key%' order by create_datetime DESC LIMIT " . $limit . " OFFSET " . $start;
$resultData = $connect->query($sqlSelectData);

if ($resultData->num_rows > 0) {
    $index = 0;
    while ($rowData = $resultData->fetch_assoc()) {
    $index ++;
        $rowData["admin_flg"] == 0 ? $role = "0" :  $role  = "3";
        if ($rowData["del_flg"] == 0)
        {
            $btnid = "btndel";
            $btnvalue = "Delete";
            $del_flg = "active";
        }
        else
        {
            $btnid = "btnactive";
            $btnvalue = "Active";
            $del_flg  = "<label style='color:red'>banned</label>";
        }

        echo ' <tr>
           <td id ="t_id">
               ' . $rowData["id"] . '
           </td>
           <td>
           ' . $rowData["username"] . '
           </td>
           <td>
           <input type="range" style="width:40px;" data-old = "0" id=' . $rowData["id"] . ' class="btnrole"  value=' . $role . ' min=0 max=3 step="3"></input>
           </td>
           <td id = "stt'. $index .'">
           ' . $del_flg . '
           </td>
           <td class="action">
               <input  type="button" id="btnedit" email=' . $rowData["id"] . ' value="Edit"></input>
               <input  type="button" stt = "'. $index .'"  id="'.$btnid.'" class="'.$rowData["id"].'" val ='.$rowData["del_flg"].' name="'. $rowData["id"] .'" value="'.$btnvalue.'"></input>
           </td>
       </tr>';
    }
}

close_connect();
?>
