<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php require_once "./config/router.php"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link href=<?php echo FILE_CSS_SIDEBAR ?> rel="stylesheet" />
    <link href=<?php echo FILE_CSS_MANAGE_ACCOUNT ?> rel="stylesheet" />
</head>

<body>
    <?php require_once FILE_PHP_SIDEBAR ?>
    <div class="wrapper-account" id="wrapper_account">
        <div class="container-account">
            <div class="content-account">
                <div class="container-add">
                    <input type="button" class="btnadd" id="btnadd" name="btnadd" value="+ Add"></input>
                </div>
                <div class="container-search">
                    <label>
                        <input type="text" id="txtsearch" class="" placeholder="">
                    </label>
                    <input type="button" class="btnsearch" id="btnsearch" value="Search"></input>
                </div>
                <div class="conatiner-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="tbl-header">ID</th>
                                <th class="tbl-header">Username</th>
                                <th class="tbl-header">Role</th>
                                <th class="tbl-header">Status</th>
                                <th class="tbl-header" style="width:140px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $key = isset($_GET['key']) ?  $_GET['key'] : "";
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                            ?>
                            <?php
                            require_once "./config/config.php";
                            $sqlCount = "SELECT count(*) as total FROM t_account where username  LIKE '%$key%'";

                            $result = $connect->query($sqlCount);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $total_records = $row['total'];
                                }
                            }

                            // Get số hàng hiện tại, số info tối đa hiển thị
                            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 10;

                            $total_page = ceil($total_records / $limit);

                            // Giới hạn số page
                            if ($current_page > $total_page) {
                                $current_page = $total_page;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="msg-result">
                    Tổng số records là <?php echo $total_records ?>
                </div>
                <div class="pgn_admin" id="pgn_admin">
                    <?php
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<a href="admin.php?page=' . ($current_page - 1) . '&key=' . $key . '"><b>&#8678;</b></a> | ';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span style="color: #6772E5;"><b>' . $i . '</b></span> | ';
                        } else {
                            echo '<a href="admin.php?page=' . $i . '&key=' . $key . '">' . $i . '</a> | ';
                        }
                    }

                    if ($current_page < $total_page) {
                        echo '<a href="admin.php?page=' . ($current_page + 1) . '&key=' . $key . '"><b>&#8680;</b></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div id="wrapper_edit" style="margin-left: 196px;">
    </div>

    <script>
        var page = <?= $current_page ?>;
        var key = '<?= $key ?>';
    </script>
    
    <script src="<?= FILE_JS_MANAGE_ACCOUNT ?>"></script>
    <script src="<?= FILE_JS_COMMON ?>"></script>
</body>

</html>