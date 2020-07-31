<?php
require('./config/router.php');
include(SITE_MENUTOP);
include(SITE_BANNER);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách thiết bị</title>
</head>

<body>
    <?php
    $result = mysqli_query($connect, 'SELECT count(*) as total FROM t_device');
    $row = mysqli_fetch_assoc($result) or die("Lỗi truy vấn");;
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
    <div style="margin-top: 10px;">
        <table id="tbl" width="1000" border="1" align="center">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td align="center" style="width: 150px; height: 150px; padding: 5px;">
                        <?php 
                        !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
                        echo "<img style='width: 150px; height: 130px;' src='./img/" . $row['img'] . "'>" ?>
                    </td>
                    <td style="padding-left: 10px;">
                        <?php
                        echo "<b>" . "Tên thiết bị: " . "</b>";
                        echo $row['device_name'];
                        echo '</br></br>';
                        echo "<b>" . "Thể loại: " . "</b>";
                        echo $row['category_name'];
                        echo '</br></br>';
                        echo "<b>" . "Hãng sản xuất: " . "</b>";
                        echo $row['supplier_name']; ?>
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
                echo '<div><li><a href="' . SITE_DANHSACHTHIETBI . '?page=1"><<</a></li><li><a href="' . SITE_DANHSACHTHIETBI . '?page=' . ($current_page - 1) . '"><</a></li>';
            } else {
                echo '<div><li><a class="disabled" href="#"><<</a></li> <li><a class="disabled" href="#"><</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<li><a class="active" href=" ' . SITE_DANHSACHTHIETBI . '?page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '<li><a href="' . SITE_DANHSACHTHIETBI . '?page=' . $i . '">' . $i . '</a></li>';
                }
            }

            if ($current_page < $total_page && $total_page > 1) {
                echo '<li><a href="' . SITE_DANHSACHTHIETBI . '?page=' . ($current_page + 1) . '">></a></li><li><a href="' . SITE_DANHSACHTHIETBI . '?page=' . $total_page . '">>></a></li>';
            } else {
                echo  '<li><a class="disabled" href="#">></a></li><li><a class="disabled" href="#">>></a></li>';
            }
            ?>
        </div>
    </div>
    <div style=" margin-top: 5px; min-height: 17vh;" align="center">
    </div>
    <?php
    include(SITE_FOOTER);
    ?>
</body>

</html>