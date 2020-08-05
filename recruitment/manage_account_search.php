<?php
require_once "./config/config.php";
// require_once "./config/router.php";

$key = $_GET["key"];
$current_page = isset($_GET['current_page']) ?  $_GET['current_page'] : "";
$sqlCount = "SELECT count(*) as total FROM t_account where username  LIKE '%$key%' and del_flg = 0";
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

$sqlSelectData = "SELECT * FROM t_account where del_flg = 0 and username  LIKE '%$key%' order by id DESC LIMIT " . $limit . " OFFSET " . $start;
$resultData = $connect->query($sqlSelectData);

if ($resultData->num_rows > 0) {
    while ($rowData = $resultData->fetch_assoc()) {

        // $rowData["admin_flg"] == 0 ? $role = "user" :  $role  = "admin";
        $rowData["admin_flg"] == 0 ? $role = "0" :  $role  = "3";
        $rowData["del_flg"] == 0 ? $del_flg = "active" :  $del_flg  = "banned";
        echo ' <tr>
           <td id ="t_id">
               ' . $rowData["id"] . '
           </td>
           <td>
           ' . $rowData["username"] . '
           </td>
           <td>
           <input type="range" style="width:40px;" data-old = "0" id=' . $rowData["id"] . ' class="btnrole" name=' . $rowData["id"] . ' value=' . $role . ' min=0 max=3 step="3"></input>
           </td>
           <td >
           ' . $del_flg . '
           </td>
           <td class="action">
               <input  type="button" id="btnedit" name=' . $rowData["id"] . ' value="Edit"></input>
               <input  type="button" id="btndel" class="btndel" name=' . $rowData["id"] . ' value="Delete"></input>
           </td>
       </tr>';
    }
}

close_connect();
?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script> -->
<script>
    // $(document).ready(function() {
    //     alert("j");

    //     $("#btndel").on("click", function() {
    //         alert("ss");
    //     });

    //     $("#btnedit").on("click", function() {
    //         alert("ss");
    //     });
    // });

    // $(document).on("click", ".btndel", function() {
    //     alert("ss");
    // });

    // $(document).on("click", ".btnrole", function() {
    //     var name = $(this).attr("name");
    //     var id = $(this).attr("id");
    //     var old = $(this).data("old")
    //     alert(name);
    //     alert(id);
    //     alert(old);
    //     if (confirm("Bạn đã chắc chắn muốn thay đổi quyền admin của " + id))
    //     {
    //         alert($(this).val());
    //         alert($(this).data("old"))
    //     }
    //     else{
    //         $(this).val($(this).data("old"));
    //     }

    //     $(this).data("old", $(this).val());
    // });

    // function b() {
    //     var t_id = $("#btnrole").data("tid");
    //     alert($("#btnrole").data("old"));
    //     alert($("#btnrole").attr("name"));
    //     if (confirm("Bạn đã chắc chắn muốn thay đổi quyền admin của "+ t_id)) {
    //         alert($("#btnrole").val());
    //     } else {
    //         document.getElementById("btnrole").value = $("#btnrole").data("old");
    //     }

    //     $("#btnrole").data("old", document.getElementById("btnrole").value);
    // }

    // document.getElementById("btnrole").addEventListener("click", function(event) {

    //     alert($("#btnrole").data("old"));
    //     if (confirm("a u oke")) {

    //     } else {
    //         document.getElementById("points").value = $("#btnrole").data("old");
    //     }
    //     $("#btnrole").data("old", document.getElementById("btnrole").value);
    // });
</script>