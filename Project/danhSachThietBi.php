<?php
require('./config/router.php');
include(SITE_MENUTOP);
include(SITE_BANNER);
include(SITE_POPUPMUONTB);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href=<?= FILE_CSS_IQLTHIETBI ?>>
    <title>Danh sách thiết bị</title>
</head>

<body>
    <?php
    $sql = 'SELECT count(*) as total FROM t_device WHERE del_flg = 0';
    $result = mysqli_query($connect, $sql);
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

    $result = mysqli_query($connect, "SELECT td.id, td.device_name, tc.category_name, ts.supplier_name, td.img 
                                      FROM t_category tc INNER JOIN t_device td ON tc.id = td.id_category 
                                                         INNER JOIN t_supplier ts on ts.id = td.id_supplier 
                                      WHERE td.del_flg = 0 ORDER BY td.create_datetime DESC LIMIT $start, $limit");
    mysqli_close($connect);
    ?>
    <div class="div_tbl div_new">
        <table class="tbl_new">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td class="td_second th_img" align="center" style="width: 150px; height: 150px; padding: 5px;">
                        <?php !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
                        echo "<img style='width: 150px; height: 130px;' src='./img/" . $row['img'] . "'>" ?>
                    </td>
                    <td class="td_second" style="padding-left: 10px;">
                        <?php
                        echo "<b>" . "Tên thiết bị: " . "</b>";
                        echo $row['device_name'];
                        echo '</br></br>';
                        echo "<b>" . "Thể loại: " . "</b>";
                        echo $row['category_name'];
                        echo '</br></br>';
                        echo "<b>" . "Nhà cung cấp: " . "</b>";
                        echo $row['supplier_name']; ?>
                    </td>
                    <td class="td_btn">
                        <button class="btnDetail btn" name="btnDetail" id="btnDetail<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" value="DETAIL">
                            <i class="fa fa-info-circle" aria-hidden="true"></i> Detail
                        </button>

                        <button class="btnAdd btn" name="btnMuon" id="btnMuon<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-sess="<?= (isset($_SESSION['txtUsername'])) ? $_SESSION['txtUsername'] : ''; ?>">
                            <i class="fa fa-plus-circle"></i> Mượn
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
    <script src=<?= FILE_JS_COMMOM ?>></script>
    <?php
    include(SITE_FOOTER);
    ?>

</body>

</html>