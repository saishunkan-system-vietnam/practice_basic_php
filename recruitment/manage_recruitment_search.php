<?php
require_once "./config/config.php";
// require_once "./config/router.php";

$key = $_GET["key"];
$current_page = isset($_GET['current_page']) ?  $_GET['current_page'] : "";
$sqlCount = "SELECT count(*) as total FROM t_recruitment where position  LIKE '%$key%'";
$result = $connect->query($sqlCount);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $total_records = $row['total'];
    }
} else {
    close_connect();
    echo 0;
}

// Get số hàng hiện tại, số info tối đa hiển thị
// $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;

$total_page = ceil($total_records / $limit);

// Giới hạn số page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// Trang bắt đầu
$start = ($current_page - 1) * $limit;

// $sqlSelectData = "SELECT * FROM t_account where username  LIKE '%$key%' order by id DESC LIMIT " . $limit . " OFFSET " . $start;
$sqlSelectData = "WITH apl  as (SELECT 
id_recruitment, 
COUNT(*) candidates
FROM
t_apply
GROUP BY id_recruitment) 

SELECT rcm.id,  rcm.position, IFNULL(apl.candidates, 0) candidates, rcm.create_datetime, rcm.del_flg
FROM t_recruitment rcm
LEFT JOIN apl  ON rcm.id = apl.id_recruitment
WHERE rcm.position like '%nhan%'
order by rcm.create_datetime DESC LIMIT " . $limit . " OFFSET " . $start;
$resultData = $connect->query($sqlSelectData);

if ($resultData->num_rows > 0) {
    $index = 0;
    while ($rowData = $resultData->fetch_assoc()) {
        $index++;
        //     // $rowData["admin_flg"] == 0 ? $role = "user" :  $role  = "admin";
        //     $rowData["admin_flg"] == 0 ? $role = "0" :  $role  = "3";
        //     // $rowData["del_flg"] == 0 ? $del_flg = "active" :  $del_flg  = "<label style='color:red'>banned</label>";
        //     if ($rowData["del_flg"] == 0) {
        //         $btnid = "btndel";
        //         $btnvalue = "Delete";
        //         $del_flg = "active";
        //     } else {
        //         $btnid = "btnactive";
        //         $btnvalue = "Active";
        //         $del_flg  = "<label style='color:red'>banned</label>";
        //     }

        //     echo ' <tr>
        //        <td id ="t_id">
        //            ' . $rowData["id"] . '
        //        </td>
        //        <td>
        //        ' . $rowData["username"] . '
        //        </td>
        //        <td>
        //        <input type="range" style="width:40px;" data-old = "0" id=' . $rowData["id"] . ' class="btnrole"  value=' . $role . ' min=0 max=3 step="3"></input>
        //        </td>
        //        <td id = "stt' . $index . '">
        //        ' . $del_flg . '
        //        </td>
        //        <td class="action">
        //            <input  type="button" id="btnedit" email=' . $rowData["id"] . ' value="Edit"></input>
        //            <input  type="button" stt = "' . $index . '"  id="' . $btnid . '" class="' . $rowData["id"] . '" val =' . $rowData["del_flg"] . ' name="' . $rowData["id"] . '" value="' . $btnvalue . '"></input>
        //        </td>
        //    </tr>';
        echo '
        <tr>
            <td >
            ' . $rowData["id"] . '
            </td>
            <td>
            ' . $rowData["position"] . '
            </td>

            <td>
            ' . $rowData["candidates"] . '
            </td>

            <td>
            <input type="button" id="btnview"  value="View"></input>
            </td>
            
            <td>
            ' . $rowData["del_flg"] . '
            </td>
            <td>
            ' . $rowData["create_datetime"] . '
            </td>       
            <td class="action">
                <input type="button" id="btnedit" email=' . $rowData["id"] . ' value="Edit"></input>
                <input type="button" stt="btnedit" id="btndel" val=' . $rowData["del_flg"] . ' name="' . $rowData["id"] . '" value="Delete"></input>
            </td>
        </tr>';
    }
}

close_connect();
?>

<!-- <tr>
    <td >
    ' . $rowData["id"] . '
    </td>
    <td>
    ' . $rowData["username"] . '
    </td>
    <td>
    ' . $rowData["company"] . '
    </td>

    <td>
    ' . $rowData["candidate"] . '
    </td>
    <td>
    ' . $rowData["create_datetime"] . '
    </td>
    <td id="stt'. $index .'">
    ' . $rowData["del_flg"] . '
    </td>
    <td class="action">
        <input type="button" id="btnedit" email=' . $rowData["id"] . ' value="Edit"></input>
        <input type="button" stt="btnedit" id="btndel" val='.$rowData["del_flg"].' name="'. $rowData[" id"] .'" value="Delete"></input>
    </td>
</tr> -->