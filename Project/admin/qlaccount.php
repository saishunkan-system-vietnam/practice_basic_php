<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
include(SITE_MENULEFT);
include(SITE_POPUPACCOUNT);
include(SITE_TOPNAV);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href=<?= LINK_JQUERY_AWESOM ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_QLTHIETBI ?>>
    <title>Quản lý Account</title>
</head>

<body>

    <?php
    $content = isset($_GET['content']) ? $_GET['content'] : '';

    $result = mysqli_query($connect, "SELECT count(*) as total FROM t_account WHERE del_flg=0 AND user_name LIKE '%{$content}%' ");
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

    $sql_select_acc = "SELECT * FROM t_account WHERE del_flg=0 AND user_name LIKE '%{$content}%' ORDER BY create_datetime DESC LIMIT $start, $limit ";
    $result_acc = mysqli_query($connect, $sql_select_acc);
    mysqli_close($connect);
    ?>
    <script>
        var content = "<?= $content ?>";
        var site = "account";
    </script>
    <div class="content">

        <div>
            <div class="header">
                <button class="btnAdd btn_admin fl" name="btnAdd"><i class="fa fa-plus-circle"></i> ADD</button>
                <button id="btnSearch" name='btnSearch' class="btnAdd btn fr"><i class="fa fa-search"></i> SEARCH</button>
                <input type="text" id="inpSearch" class="txt_find fr" style="width: 50%;" placeholder="Enter Username">
            </div>

            <table class="tbl_second">
                <tr>
                    <th class="th_second th_stt">STT</th>
                    <th class="th_second th_user_name">User name</th>
                    <th class="th_second th_email">Email</th>
                    <th class="th_second th_avatar">Avatar</th>
                    <th class="th_second th_admin">Admin</th>
                    <th class="th_second th_func_acc">Tác vụ</th>
                </tr>
                <?php
                if (!$result_acc) : ?>
                    <tr>
                        <td class="td_second not_found" colspan="7">
                            <?php echo "Could Not Found!" ?>
                        </td>
                    </tr>
                    <?php else :
                    while ($row = mysqli_fetch_assoc($result_acc)) : ?>
                        <tr>
                            <td class="td_second td_stt">
                                <?php echo $stt; ?>
                            </td>
                            <td class="td_second td_user_name">
                                <?php echo $row['user_name']; ?>
                            </td>
                            <td class="td_second td_email">
                                <?php echo $row['email']; ?>
                            </td>
                            <td class="td_second td_avatar">
                                <?php !empty($row['avatar']) ? $row['avatar'] : $row['avatar'] = "avatar_null.png";
                                echo "<img style='width: 150px; height: 130px;' src='../img/" . $row['avatar'] . "'>" ?>
                            </td>
                            <td class="td_second td_admin">
                                <input class="checkbox" type="checkbox" name="admin" id="admin<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" data-name="<?= $row['user_name']; ?>" <?php echo !$row['admin_flg'] == 0 ? "checked" : ""; ?>>
                            </td>
                            <td class="td_btn">
                                <button class="btnEdit btn_admin" aria-hidden="true" name="btnEdit" id="btnEdit<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" value="EDIT">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT
                                </button>

                                <button class="btnDel btn_admin" name="btnDel" id="btnDel<?= $row['id']; ?>" data-id="<?= $row['id']; ?>" value="DELETE">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> DELETE
                                </button>
                            </td>
                        </tr>
                <?php $stt++; endwhile;
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
                    echo '<div><li><a href="' . SITE_QLACCOUNT . '?page=1"><<</a></li><li><a href="' . SITE_QLACCOUNT . '?page=' . ($current_page - 1) . '"><</a></li>';
                } else {
                    echo '<div><li><a class="disabled" href="#"><<</a></li> <li><a class="disabled" href="#"><</a></li>';
                }

                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $current_page) {
                        echo '<li><a class="active" href=" ' . SITE_QLACCOUNT . '?page=' . $i . '">' . $i . '</a></li>';
                    } else {
                        echo '<li><a href="' . SITE_QLACCOUNT . '?page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                if ($current_page < $total_page && $total_page > 1) {
                    echo '<li><a href="' . SITE_QLACCOUNT . '?page=' . ($current_page + 1) . '">></a></li><li><a href="' . SITE_QLACCOUNT . '?page=' . $total_page . '">>></a></li>';
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