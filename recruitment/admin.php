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
    <style>
        .wrapper-account {
            top: 0;
            bottom: 0;
            left: 196px;
            background-color: green;
            width: 100%;
            position: fixed;
            /* display: flex; */
            /* justify-content: center;
            align-items: center; */
            /* text-align: center; */
        }

        .wrapper-account .container-account {
            background-color: rgb(214, 214, 214);
            display: flex;
            justify-content: center;
            /* align-items: center; */
            /* text-align: center; */
            padding-top: 25px;
            width: 100%;
            height: 100%
        }

        .wrapper-account .container-account .content-account {
            background-color: #fff;
            width: 850px;
            height: fit-content;
            margin-left: -196px;
            box-shadow: 0 4px 9px 5px #ccc !important;
            border-radius: 10px;
            padding: 15px;
            /* align-items: center;
            text-align: center;
            /* display: flex; */
            /* justify-content: center;  */
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #bbb;
            border-collapse: collapse;
            padding-left: 10px;
            line-height: 26px;
            font-size: 20px;
        }

        .tbl-header {
            text-align: left;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 10px;
            color: #6772E5
        }

        #txtsearch {
            margin-right: 15px;
            background-color: #F7F7F7;
            border-radius: 3px;
            border: 0.5px solid #ccc;
            padding: 4px;
            width: 206px;
        }

        #btnsearch {
            float: right;
            width: 90px;
            border: 0;
            background-color: #f0f0f9;
            border-radius: 10px;
            border: 0.5px solid #ccc;
            /* padding: 0px; */
            font-size: 20px;
            font-family: Times New Roman;
            color: purple;
        }

        #btnadd {
            width: 90px;
            border: 0;
            background-color: #FFF3E0;
            border-radius: 10px;
            border: 0.5px solid #ccc;
            /* padding:0px; */
            font-size: 20px;
            font-family: Times New Roman;
            color: brown
        }

        #btnedit {
            float: left;
            border: 0;
            width: 60px;
            background-color: #E8F5E9;
            border-radius: 4px;
            margin-right: 5px
        }

        .wrapper-account #btndel {
            float: right;
            border: 0;
            width: 60px;
            background-color: #FFEBEE;
            border-radius: 4px;
            margin-right: 10px
        }

        .wrapper-account #btnactive {
            float: right;
            border: 0;
            width: 60px;
            background-color: #E5F8D1;
            border-radius: 4px;
            margin-right: 10px
        }

        .container-search {
            float: right;
            font-size: 20px;
        }

        .container-add {
            left: 0;
            margin-bottom: 15px;
            float: left;
        }

        .conatiner-table {
            clear: both;
        }

        #pgn_admin {
            /* width: 100%; */
            height: 20px;
            margin-top: 10px;
            float: right;
        }

        .msg-result {
            padding-top: 10px;
            float: left;
        }
    </style>
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
                        <!-- <tfoot>
                            <tr>
                                <td colspan="2" rowspan="2"></td>
                                <td colspan="3">Total products (tax incl.)</td>
                                <td colspan="2">122.38 €</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Total</strong>
                                </td>
                                <td colspan="2"><strong>122.38 €</strong>
                                </td>
                            </tr>
                        </tfoot> -->
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