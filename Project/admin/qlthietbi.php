<?php
require('../config/router.php');
session_start();
require(SITE_API_CONFIG);
include(SITE_POPUPADMIN);

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href=<?= LINK_JQUERY_AWESOM ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_QLTHIETBI ?>>
</head>

<body>
    <?php

    $content = isset($_GET['content']) ? $_GET['content'] : '';

    $result = mysqli_query($connect, "SELECT count(*) as total FROM t_device WHERE del_flg = 0 AND device_name LIKE '%{$content}%' ");
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 12;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $sql_select_ds = "SELECT td.id, td.device_name, tc.category_name, ts.supplier_name, td.img 
                    FROM t_category tc INNER JOIN t_device td ON tc.id = td.id_category 
                                       INNER JOIN t_supplier ts on ts.id = td.id_supplier 
                    WHERE td.del_flg = 0 AND device_name LIKE '%{$content}%' ORDER BY td.create_datetime DESC LIMIT $start, $limit ";
    $result = mysqli_query($connect, $sql_select_ds);
    mysqli_close($connect);
    ?>
    <script>
        var content = "<?= $content ?>";
    </script>

    <div class="div_tbl">
        <div class="header">
            <button class="btnAdd btn fl" name="btnAdd"><i class="fa fa-plus-circle"></i> ADD</button>
            <button id="btnSearch" name='btnSearch' class="btnAdd btn fr"><i class="fa fa-search"></i> SEARCH</button>
            <input type="text" id="inpSearch" class="txt_find fr" style="width: 50%;">
        </div>

        <table class="tbl_second" align="center">
            <tr>
                <th class="th_second th_devicename">Tên Thiết bị</th>
                <th class="th_second th_category">Thể loại</th>
                <th class="th_second th_supplier">Nhà cung cấp</th>
                <th class="th_second th_img">Hình ảnh</th>
                <th class="th_second th_func">Tác vụ</th>
            </tr>
            <?php
            if (!$result) : ?>
                <tr>
                    <td class="td_second not_found" colspan="5">
                        <?php echo "Could Not Found!" ?>
                    </td>
                </tr>
                <?php else :
                while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td class="td_second td_devicename">
                            <?php echo $row['device_name']; ?>
                        </td>
                        <td class="td_second td_category">
                            <?php echo $row['category_name']; ?>
                        </td>
                        <td class="td_second td_supplier">
                            <?php echo $row['supplier_name']; ?>
                        </td>
                        <td class="td_second td_img" align="center">
                            <?php !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
                            echo "<img style='width: 150px; height: 130px;' src='../img/" . $row['img'] . "'>" ?>
                        </td>
                        <td class="td_btn">
                            <button class="btnEdit btn" aria-hidden="true" name="btnEdit" id="btnEdit<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" value="EDIT">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT
                            </button>

                            <button class="btnDel btn" name="btnDel" id="btnDel<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" value="DELETE">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> DELETE
                            </button>
                        </td>
                    </tr>
            <?php endwhile;
            endif; ?>

        </table>
    </div>
    <div class="pg_nd">
        <div class="pagination" style=" margin-top: 15px;">
            <?php
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }

            if ($current_page > 1 && $total_page > 1) {
                echo '<div><li><a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=1"><<</a></li><li><a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=' . ($current_page - 1) . '"><</a></li>';
            } else {
                echo '<div><li><a class="disabled" href="#"><<</a></li> <li><a class="disabled" href="#"><</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<li><a class="active" href=" ' . SITE_DANHSACHQANLYTHIETBI . '?page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '<li><a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=' . $i . '">' . $i . '</a></li>';
                }
            }

            if ($current_page < $total_page && $total_page > 1) {
                echo '<li><a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=' . ($current_page + 1) . '">></a></li><li><a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=' . $total_page . '">>></a></li>';
            } else {
                echo  '<li><a class="disabled" href="#">></a></li><li><a class="disabled" href="#">>></a></li>';
            }

            ?>
        </div>
    </div>

    <script src=<?= FILE_JS_COMMOMADMIN ?>></script>
    <script src=<?= FILE_JS_SEARCHPAGINATION ?>></script>

</body>

</html>