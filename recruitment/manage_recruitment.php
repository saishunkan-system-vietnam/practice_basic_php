<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_MANAGE_RECRUITMENT ?> rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</head>

<body>
    <?php require_once FILE_PHP_SIDEBAR ?>
    <div class="wrapper-mng-rcm" id="wrapper-mng-rcm">
        <div class="container-mng-rcm">
            <div class="content-mng-rcm">
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
                                <th class="tbl-header">Position Title</th>
                                <th class="tbl-header">Candidates</th>
                                <th class="tbl-header">View</th>
                                <th class="tbl-header">Status</th>
                                <th class="tbl-header">Create at</th>
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
                            $sqlCount ="WITH apl  as (SELECT 
                            id_recruitment, 
                            COUNT(*) candidates
                            FROM
                            t_apply
                            GROUP BY id_recruitment) 
                            
                            SELECT count(*) as total
                            FROM t_recruitment rcm
                            LEFT JOIN apl  ON rcm.id = apl.id_recruitment
                            WHERE rcm.position like '%nhan%'";
                            // $sqlCount = "SELECT count(*) as total FROM t_account where  del_flg = 0";
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
                    The total number of records is <?php echo $total_records ?>
                </div>

                <div class="pgn_admin" id="pgn_admin">
                    <?php
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<a href="manage_recruitment.php?page=' . ($current_page - 1) . '&key=' . $key . '"><b>&#8678;</b></a> | ';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span style="color: #6772E5;"><b>' . $i . '</b></span> | ';
                        } else {
                            echo '<a href="manage_recruitment.php?page=' . $i . '&key=' . $key . '">' . $i . '</a> | ';
                        }
                    }

                    if ($current_page < $total_page) {
                        echo '<a href="manage_recruitment.php?page=' . ($current_page + 1) . '&key=' . $key . '"><b>&#8680;</b></a>';
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
    <script>
        var page = <?= $current_page ?>;
        var key = '<?= $key ?>';
    </script>
    <script src="<?= FILE_JS_MANAGE_RECRUITMENT ?>"></script>
    <script src="<?= FILE_JS_COMMON ?>"></script>
</body>

</html>