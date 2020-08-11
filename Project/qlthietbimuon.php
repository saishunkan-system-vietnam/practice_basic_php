<?php
require('./config/router.php');
include(SITE_MENUTOP);
include(SITE_BANNER);


if (!isset($_SESSION['txtUsername']) && !isset($dataSaveUser['usr'])) {
    $_SESSION['error'] = "Vui lòng đăng nhập để sử dụng chức năng này";
    header('location: ./dangNhap.php');
} else if (!isset($_SESSION['txtUsername'])) {
    $dataSaveUser = json_decode($_COOKIE[COOKIE_LOGIN], true);
    $_SESSION['txtId'] =  $dataSaveUser['id'];
};

include(SITE_POPUPMUONTB);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href=<?= FILE_CSS_IQLTHIETBI ?>>
    <title>Quản lý thiết bị mượn</title>
</head>

<body>
    <?php

    
    $result_total = mysqli_query($connect, "SELECT count(*) as total FROM t_loan tl 
                                                                INNER JOIN t_loan_detail tld ON tl.id = tld.id_loan 
                                                                INNER JOIN t_device td ON td.id = tld.id_device  
                                                                WHERE tld.del_flg = 0 AND tld.pay_flg = 0 AND tl.id_account = $_SESSION[txtId]");
    $row_total = mysqli_fetch_assoc($result_total) or die("Lỗi truy vấn");
    $total_records = $row_total['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 12;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;



    $sql = "SELECT td.img, td.device_name, tld.amount, tl.loan_date, tl.intend_date, tld.reason 
            FROM t_loan tl INNER JOIN t_loan_detail tld ON tl.id = tld.id_loan 
                           INNER JOIN t_device td ON td.id = tld.id_device 
            WHERE tld.del_flg = 0 AND tld.pay_flg = 0 AND tl.id_account = $_SESSION[txtId] LIMIT $start, $limit";
    $result = mysqli_query($connect, $sql);
    mysqli_close($connect);
    ?>
    <div class="div_tbl div_new">
        <div>
            <table width="100%" border="0" cellpadding="12" align="center">
                <tr style="float: right;">
                    <td> <button class="btn_add btn" name="btnAdd_loan" data-sess="<?= (isset($_SESSION['txtUsername'])) ? $_SESSION['txtUsername'] : ''; ?>"><i class="fa fa-plus-circle"></i> Mượn thiết bị</button></td>
                </tr>
            </table>
        </div>
        <table class="tbl_new">
            <tr style="background-color: #2196F3;">
                <th class="th_second" align="center">
                    Ảnh thiết bị
                </th>
                <th class="th_second th_device_name" align="center">
                    Tên thiết bị
                </th>
                <th class="th_second th_amount" align="center">
                    Số lượng
                </th>
                <th class="th_second th_date_loan" align="center">
                    Ngày mượn
                </th>
                <th class="th_second th_intend_date" align="center">
                    Ngày hẹn trả
                </th>
                <th class="th_second th_reason" align="center">
                    Lý do mượn
                </th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td class="td_second td_img">
                        <?php !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
                        echo "<img style='width: 150px; height: 130px;' src='./img/" . $row['img'] . "'>" ?>
                    </td>
                    <td class="td_second">
                        <?php echo $row['device_name']; ?>
                    </td>
                    <td class="td_second td_amount">
                        <?php echo $row['amount']; ?>
                    </td>
                    <td class="td_second td_loan_date">
                        <?php echo $row['loan_date']; ?>
                    </td>
                    <td class="td_second td_intend_date">
                        <?php echo $row['intend_date']; ?>
                    </td>
                    <td class="td_second">
                        <?php echo $row['reason'] ?>
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
                echo '<div><li><a href="' . SITE_QLTHIETBIMUON . '?page=1"><<</a></li><li><a href="' . SITE_QLTHIETBIMUON . '?page=' . ($current_page - 1) . '"><</a></li>';
            } else {
                echo '<div><li><a class="disabled" href="#"><<</a></li> <li><a class="disabled" href="#"><</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<li><a class="active" href=" ' . SITE_QLTHIETBIMUON . '?page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '<li><a href="' . SITE_QLTHIETBIMUON . '?page=' . $i . '">' . $i . '</a></li>';
                }
            }

            if ($current_page < $total_page && $total_page > 1) {
                echo '<li><a href="' . SITE_QLTHIETBIMUON . '?page=' . ($current_page + 1) . '">></a></li><li><a href="' . SITE_QLTHIETBIMUON . '?page=' . $total_page . '">>></a></li>';
            } else {
                echo  '<li><a class="disabled" href="#">></a></li><li><a class="disabled" href="#">>></a></li>';
            }
            ?>
        </div>
    </div>
    <div style=" margin-top: 5px; min-height: 17vh;" align="center">
    </div>
    <script src=<?= FILE_JS_COMMOM ?>></script>

    <?php include(SITE_FOOTER); ?>
</body>

</html>