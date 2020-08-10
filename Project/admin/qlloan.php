<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
include(SITE_MENULEFT);
include(SITE_TOPNAV);

if (isset($_SESSION['error'])) {
    echo "<script type='text/javascript'>alert('$_SESSION[error]');</script>";
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <script src=<?= LINK_JQUERY ?>></script>
    <link rel="stylesheet" href=<?= LINK_JQUERY_AWESOM ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_QLTHIETBI ?>>
    <title>Quản lý thiết bị</title>
</head>

<body>

    <?php

    $content = isset($_GET['content']) ? $_GET['content'] : '';

    $sql_total = "With total AS (SELECT tld.id_device, td.img, td.device_name, sum(tld.amount) as sum_amount, COUNT(distinct tl.id_account) as total_acc 
                  FROM t_loan tl INNER JOIN t_loan_detail tld ON tl.id = tld.id_loan 
                                 INNER JOIN t_device td ON td.id = tld.id_device 
                  WHERE tld.del_flg = 0 AND tld.pay_flg = 0 AND td.device_name LIKE '%{$content}%'
                  GROUP by tld.id_device, td.img, td.device_name)
                  SELECT COUNT(*) AS total FROM total";
    $result = mysqli_query($connect, $sql_total);
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
    $stt = ($current_page - 1) * $limit + 1;

    $sql_select_ds = "SELECT tld.id_device, td.img, td.device_name, sum(tld.amount) as sum_amount, COUNT(distinct tl.id_account) as total_acc 
                      FROM t_loan tl INNER JOIN t_loan_detail tld ON tl.id = tld.id_loan 
                                     INNER JOIN t_device td ON td.id = tld.id_device 
                      WHERE tld.del_flg = 0 AND tld.pay_flg = 0 AND td.device_name LIKE '%{$content}%'
                      GROUP by tld.id_device, td.img, td.device_name LIMIT $start, $limit ";
    $result = mysqli_query($connect, $sql_select_ds);
    mysqli_close($connect);
    ?>
    <script>
        var content = "<?= $content ?>";
        var site = "loan";
    </script>
    <div class="content">

        <div>
            <div class="header">
                <button id="btnSearch" name='btnSearch' class="btnAdd btn fr"><i class="fa fa-search"></i> SEARCH</button>
                <input type="text" id="inpSearch" class="txt_find fr" style="width: 50%;" placeholder="Enter device name">
            </div>

            <table class="tbl_second" align="center">
                <tr>
                    <th class="th_second th_stt">STT</th>
                    <th class="th_second th_img">Hình ảnh</th>
                    <th class="th_second th_device_name">Tên Thiết bị</th>
                    <th class="th_second th_sum_amount">Tổng số lượng</th>
                    <th class="th_second th_total_user">Tổng số user</th>
                    <th class="th_second th_func">Tác vụ</th>
                </tr>
                <?php
                if (!$result) : ?>
                    <tr>
                        <td class="td_second not_found" colspan="6">
                            <?php echo "Could Not Found!" ?>
                        </td>
                    </tr>
                    <?php else :
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td class="td_second td_stt">
                                <?php echo $stt; ?>
                            </td>
                            <td class="td_second td_img" align="center">
                                <?php !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
                                echo "<img style='width: 150px; height: 130px;' src='../img/" . $row['img'] . "'>" ?>
                            </td>
                            <td class="td_second">
                                <?php echo $row['device_name']; ?>
                            </td>
                            <td class="td_second td_sum_amount">
                                <?php echo $row['sum_amount']; ?>
                            </td>
                            <td class="td_second td_total_user">
                                <?php echo $row['total_acc']; ?>
                            </td>
                            <td class="td_btn">
                                <button class="btnEdit btn_loan" name="btnView" id="btnView<?= $row['id_device']; ?>" data-id="<?= $row['id_device']; ?>" value="VIEW">
                                    <i class="fa fa-eye" aria-hidden="true"></i> User
                                </button>

                                <button class="btnDel btn_loan" name="btnDel" id="btnDel<?= $row['id_device']; ?>" data-id="<?= $row['id_device']; ?>" value="DELETE">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> DELETE
                                </button>
                            </td>
                        </tr>
                <?php $stt++;
                    endwhile;
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
                    echo '<div><li><a href="' . SITE_LOAN . '?page=1"><<</a></li><li><a href="' . SITE_LOAN . '?page=' . ($current_page - 1) . '"><</a></li>';
                } else {
                    echo '<div><li><a class="disabled" href="#"><<</a></li> <li><a class="disabled" href="#"><</a></li>';
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $current_page) {
                        echo '<li><a class="active" href=" ' . SITE_LOAN . '?page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li><a href="' . SITE_LOAN . '?page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li><a href="' . SITE_LOAN . '?page=' . ($current_page + 1) . '">></a></li><li><a href="' . SITE_LOAN . '?page=' . $total_page . '">>></a></li>';
                } else {
                    echo  '<li><a class="disabled" href="#">></a></li><li><a class="disabled" href="#">>></a></li>';
                }

                ?>
            </div>
        </div>

        <script src=<?= FILE_JS_COMMOMADMIN ?>></script>
        <script src=<?= FILE_JS_SEARCHPAGINATION ?>></script>
    </div>
</body>

</html>