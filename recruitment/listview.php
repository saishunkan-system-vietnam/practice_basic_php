<?= require_once "./config/router.php"; ?>
<link href=<?php echo FILE_CSS_LISTVIEW ?> rel="stylesheet" />

<?php
if (isset($_POST['id']) && isset($_POST['current_page'])) {
    $id = $_POST['id'];
    $current_view = isset($_POST['current_page']) == true? $_POST['current_page'] : 1;

    require_once "./config/config.php";
    $sqlCount = "SELECT count(*) as total FROM t_apply where id_recruitment = '$id' and del_flg = 0";

    $result = $connect->query($sqlCount);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total_view_records = $row['total'];
        }

    $limit = 10;

    $total_views = ceil($total_view_records / $limit);
   
    if ($current_view > $total_views && $total_views >= 1) {
        $current_view = $total_views;
    } else if ($current_view < 1) {
        $current_view = 1;
    }

    $start = ($current_view - 1) * $limit;

    echo '<div class="wrapper-view" id ="wrapper-view" style="height:auto;">
               <div class="container-view">
                  <div class="content-view">
                     <div class="container-table">
                        <button type="button" id="btnclose"  style="float:right" class="close">x</button>
                        <div style="text-align:left">ID: <span style="color:blue">'.$id.'</span></div>
                        <table>
                            <thead>
                                <tr>
                                    <th class="tbl-header" style="color:brown">ID</th>
                                    <th class="tbl-header" style="color:brown">Username</th>
                                    <th class="tbl-header" style="color:brown">Telephone</th>
                                </tr>
                            </thead>
                         <tbody>';

    $sqlSelectData = "SELECT act.id, IFNULL(act.username, '') username, IFNULL(act.tel, '') tel
    FROM t_apply apl
    LEFT JOIN t_account act  ON apl.id_user = act.id
    WHERE apl.id_recruitment = '$id' and apl.del_flg = 0
    order by act.id
    DESC LIMIT " . $limit . " OFFSET " . $start;

    $resultData = $connect->query($sqlSelectData);

    if ($resultData->num_rows > 0) { 
        while ($rowData = $resultData->fetch_assoc()) {
    echo    '<tr>
                <td>
                    ' . $rowData["id"] . '
                </td>
                <td>
                    ' . $rowData["username"] . '
                </td>
                <td>
                    ' . $rowData["tel"] . '
                </td>
            </tr>';
          }
       }
       else
       {
           close_connect();
           return false;
       }

        echo  '</tbody>
               </table>
               </div>';

    echo '<div style="clear:both;" class="msg-result">
            The total number of records is '.$total_view_records.'
          </div>';
    echo  '<div class="pgn_admin" id="pgn_admin">';

    if ($current_view > 1 && $total_views > 1) {
        echo '<a href="#" id_rcm='.$id.' class="pgn_view_number" name="pgn_view_number" id='.($current_view - 1).'><b>&#8678;</b></a> | ';
    }

    for ($i = 1; $i <= $total_views; $i++) {
        if ($i == $current_view) {
            echo '<span style="color: #6772E5;"><b>' . $i . '</b></span> | ';
        } else {
            echo '<a id_rcm='.$id.' href="#" class="pgn_view_number" name="pgn_view_number" id =' . $i . '>' . $i . '</a> | ';
        }
    }

    if ($current_view < $total_views) {
        echo '<a id_rcm='.$id.' href="#" class="pgn_view_number" name="pgn_view_number" id='.($current_view +1).'><b>&#8680;</b></a>';
    }

    echo ' </div>
           </div>
           </div>';
           
    close_connect();
    }
    else
    {
        close_connect();
        return false;
    }  
}
?>

