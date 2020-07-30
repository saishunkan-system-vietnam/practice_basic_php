<?php
require('../config/router.php');
session_start();
require(SITE_API_CONFIG);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    $result = mysqli_query($connect, "SELECT td.device_name, tc.category_name, ts.supplier_name, td.img FROM t_category tc INNER JOIN t_device td ON tc.id = td.id_category INNER JOIN t_supplier ts on ts.id = td.id_supplier LIMIT $start, $limit  ");
    mysqli_close($connect);
    ?>

    <div id="">
        <table id="tbl_first" align="center" border="0">
            <tr>
                <td>
                    <button id="btnAdd"><i class="fa fa-plus-circle"></i> ADD</button></td>
                <td>

                </td>
            </tr>
        </table>
        <table id="tbl_second" align="center">
            <tr>
                <th class="th_second">Tên Thiết bị</th>
                <th class="th_second">Thể loại</th>
                <th class="th_second">Nhà cung cấp</th>
                <th class="th_second">Hình ảnh</th>
                <th class="th_second">Tác vụ</th>
            </tr>
            <tr>
                <td class="td_second">Jill</td>
                <td class="td_second">Smith</td>
                <td class="td_second">50</td>
                <td class="td_second" align="center" style="width: 150px; height: 150px;">
                    <?php isset($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
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
        </table>
    </div>
    <div class="pagination" style=" margin-top: 5px; min-height: 17vh;" align="center">
        <?php
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        if ($current_page > 1 && $total_page > 1) {
            echo '<div><li><a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=' . ($current_page - 1) . '">Prev</a></li>';
        }
        else{
            echo '<div><li><a class="disabled" href="#"><<</a></li>';
        }

        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) {
                echo '<span>' . $i . '</span> | ';
            } else {
                echo '<a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=' . $i . '">' . $i . '</a> | ';
            }
        }

        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="' . SITE_DANHSACHQANLYTHIETBI . '?page=' . ($current_page + 1) . '">Next</a>';
        }
        ?>
    </div>
</body>

</html>