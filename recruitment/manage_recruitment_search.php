<?php
require_once "./config/config.php";

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

$limit = 12;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;

$sqlSelectData = "WITH apl  as (SELECT 
id_recruitment, 
COUNT(*) candidates
FROM
t_apply
WHERE del_flg = 0
GROUP BY id_recruitment) 

SELECT rcm.id,  rcm.position, IFNULL(apl.candidates, 0) candidates, rcm.create_datetime, rcm.del_flg
FROM t_recruitment rcm
LEFT JOIN apl  ON rcm.id = apl.id_recruitment 
WHERE rcm.position like '%$key%' 
order by rcm.create_datetime DESC LIMIT " . $limit . " OFFSET " . $start;


$resultData = $connect->query($sqlSelectData);

if ($resultData->num_rows > 0) {
    $index = 0;
    while ($rowData = $resultData->fetch_assoc()) {
        $index++;
        $rowData["del_flg"] == 0 ? $del_flg = "active" :  $del_flg  = "<label style='color:red'>banned</label>";

        echo '
        <tr>
            <td style=" Height: 26px;">
            ' . $rowData["id"] . '
            </td>

            <td class= "pos-row">
            ' . $rowData["position"] . '
            </td>

            <td>
            ' . $rowData["candidates"] . '
            </td>

            <td>
            <input type="button" pos = ' . $rowData["position"] . ' data=' . $rowData["id"] . ' id="btnview"  value="View"></input>
            </td>
            
            <td id = "stt'. $index .'">
            ' . $del_flg . '
            </td>

            <td>
            ' . $rowData["create_datetime"] . '
            </td> 
                  
            <td class="action">
                <input type="button" id="btnedit" data=' . $rowData["id"] . ' value="Edit"></input>
                <input type="button" id="btndel" stt = "'. $index .'" name="' . $rowData["id"] . '" value="Delete"></input>
            </td>
        </tr>';
    }
}

close_connect();
?>
