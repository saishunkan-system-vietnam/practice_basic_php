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
    $result = mysqli_query($connect, 'SELECT count(*) as total FROM t_device');
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

    $result = mysqli_query($connect, "SELECT td.id, td.device_name, tc.category_name, ts.supplier_name, td.img FROM t_category tc INNER JOIN t_device td ON tc.id = td.id_category INNER JOIN t_supplier ts on ts.id = td.id_supplier ORDER BY td.create_datetime DESC LIMIT $start, $limit  ");
    mysqli_close($connect);
    ?>

    <div class="div_tbl">
        <table border="0">
            <tr>
                <td>
                    <button id="btnAdd" onclick="Openform('btnAdd')"><i class="fa fa-plus-circle"></i> ADD</button></td>
                <td>
                </td>
            </tr>
        </table>
        <table id="tbl_second" align="center">
            <tr>
                <th id='th_devicename' class="th_second">Tên Thiết bị</th>
                <th id='th_category' class="th_second">Thể loại</th>
                <th id='th_supplier' class="th_second">Nhà cung cấp</th>
                <th id='th_img' class="th_second">Hình ảnh</th>
                <th id='th_func' class="th_second">Tác vụ</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td hidden>
                        <?php echo $row['id']; ?>
                    </td>
                    <td class="td_second">
                        <?php echo $row['device_name']; ?>
                    </td>
                    <td class="td_second">
                        <?php echo $row['category_name']; ?>
                    </td>
                    <td class="td_second">
                        <?php echo $row['supplier_name']; ?>
                    </td>
                    <td class="td_second" align="center">
                        <?php !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
                        echo "<img style='width: 150px; height: 130px;' src='../img/" . $row['img'] . "'>" ?>
                    </td>
                    <td class="td_btn">
                        <button id="btnEdit" value="EDIT">
                            EDIT
                        </button>
                        <button id="btnDel" value="DELETE">
                            DELETE
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
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
</body>

</html>