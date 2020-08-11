<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
include(SITE_MENULEFT);
include(SITE_TOPNAV);

$is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');

$id_device = isset($_GET['id']) ? $_GET['id'] : '';

if (empty($id_device)) {
    $_SESSION['error'] = "Trang này không tồn tại. Vui lòng kiểm tra lại";
    header("location: qlloan.php");
}

$sql_check = "select * FROM t_loan_detail where id_device =$id_device";
$result_check = mysqli_query($connect, $sql_check);

if ($result_check->num_rows == 0) {
    $_SESSION['error'] = "Trang này không tồn tại. Vui lòng kiểm tra lại";
    header("location: qlloan.php");
} else {
    $content = isset($_GET['content']) ? $_GET['content'] : '';

    $sql_total = "SELECT count(*) as total 
                  FROM t_loan_detail tld INNER JOIN t_loan tl ON tld.id_loan = tl.id 
                                         INNER JOIN t_account tc ON tc.id = tl.id_account 
                  WHERE tld.del_flg = 0 AND tld.pay_flg = 0 AND tld.id_device = $id_device AND user_name LIKE '%{$content}%' ORDER by tl.id_account";

    $result_total = mysqli_query($connect, $sql_total);


    $row = mysqli_fetch_assoc($result_total);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 4;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;
    $stt = ($current_page - 1) * $limit + 1;

    $sql_select_acc = "SELECT tl.id_account, tc.avatar, tc.user_name, tld.amount, tl.loan_date, tl.intend_date, tld.reason, tld.pay_flg, tld.create_datetime 
                       FROM t_loan_detail tld INNER JOIN t_loan tl ON tld.id_loan = tl.id 
                                              INNER JOIN t_account tc ON tc.id = tl.id_account 
                       WHERE tld.del_flg = 0 AND tld.pay_flg = 0 AND tld.id_device = $id_device AND user_name LIKE '%{$content}%' ORDER by tl.id_account LIMIT $start, $limit ";
    $result_acc = mysqli_query($connect, $sql_select_acc);
    mysqli_close($connect);
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href=<?= LINK_JQUERY_AWESOM ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_QLTHIETBI ?>>
    <title>Quản lý Account</title>
</head>

<body>
    <script>
        var content = "<?= $content ?>";
        var site = "userloan";
        var id = "<?= $id_device?>";
    </script>
    <div class="content">

        <div>
            <div class="header">
                <button id="btnSearch" name='btnSearch' class="btnAdd btn fr"><i class="fa fa-search"></i> SEARCH</button>
                <input type="text" id="inpSearch" class="txt_find fr" style="width: 50%;" placeholder="Enter Username">
            </div>

            <table class="tbl_second">
                <tr>
                    <th class="th_second th_stt">STT</th>
                    <th class="th_second th_avatar">Avatar</th>
                    <th class="th_second th_user">User name</th>
                    <th class="th_second th_amount">Số lượng</th>
                    <th class="th_second th_loan_date">Ngày mượn</th>
                    <th class="th_second th_pay_date">Ngày hẹn trả</th>
                    <th class="th_second th_reason">Lý do</th>
                    <th class="th_second th_status">Trạng thái</th>
                    <th class="th_second th_pay_device">Trả thiết bị</th>
                </tr>
                <?php
                if (!$result_acc) : ?>
                    <tr>
                        <td class="td_second not_found" colspan="9">
                            <?php echo "Could Not Found!" ?>
                        </td>
                    </tr>
                    <?php else :
                    while ($row = mysqli_fetch_assoc($result_acc)) : ?>
                        <tr>
                            <td class="td_second td_stt">
                                <?php echo $stt; ?>
                            </td>
                            <td class="td_second td_avatar">
                                <?php !empty($row['avatar']) ? $row['avatar'] : $row['avatar'] = "avatar_null.png";
                                echo "<img style='width: 150px; height: 130px;' src='../img/" . $row['avatar'] . "'>" ?>
                            </td>
                            <td class="td_second td_user_name">
                                <?php echo $row['user_name']; ?>
                            </td>
                            <td class="td_second td_admin">
                                <?php echo $row['amount']; ?>
                            </td>
                            <td class="td_second td_admin">
                                <?php echo $row['loan_date']; ?>
                            </td>
                            <td class="td_second td_admin">
                                <?php echo $row['intend_date']; ?>
                            </td>
                            <td class="td_second">
                                <?php echo $row['reason']; ?>
                            </td>
                            <td class="td_second td_admin">
                                <?= $row['pay_flg'] == 0 ? "đang mượn" : "đã trả"; ?>
                            </td>
                            <td class="td_second td_admin">
                                <input class="checkbox" type="checkbox" name="pay" id="pay<?= $row['id_account']; ?>" data-name="<?= $row['user_name']; ?>" data-time="<?= $row['create_datetime']; ?>" <?= $row['pay_flg'] == 1 ? "checked" : ""; ?>>
                            </td>
                        </tr>
                <?php $stt++;
                    endwhile;
                endif; ?>

            </table>
        </div>
        <div>
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
                    echo '<div><li><a href="' . SITE_USERLOAN . '?id='. $id_device .'&page=1"><<</a></li><li><a href="' . SITE_USERLOAN . '?id='. $id_device .'&page=' . ($current_page - 1) . '"><</a></li>';
                } else {
                    echo '<div><li><a class="disabled" href="#"><<</a></li> <li><a class="disabled" href="#"><</a></li>';
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $current_page) {
                        echo '<li><a class="active" href=" ' . SITE_USERLOAN . '?id='. $id_device .'&page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li><a href="' . SITE_USERLOAN . '?id='. $id_device .'&page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li><a href="' . SITE_USERLOAN . '?id='. $id_device .'&page=' . ($current_page + 1) . '">></a></li><li><a href="' . SITE_USERLOAN . '?id='. $id_device .'&page=' . $total_page . '">>></a></li>';
                } else {
                    echo  '<li><a class="disabled" href="#">></a></li><li><a class="disabled" href="#">>></a></li>';
                }

                ?>
            </div>
        </div>
        <script src=<?= LINK_JQUERY ?>></script>
        <script src=<?= FILE_JS_COMMOMADMIN ?>></script>
        <script src=<?= FILE_JS_SEARCHPAGINATION ?>></script>
    </div>
</body>

</html>