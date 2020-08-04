<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_SIDEBAR ?> rel="stylesheet" />
    <style>
        .wrapper-account {
            top: 0;
            bottom: 0;
            left: 196px;
            background-color: green;
            width: 100%;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            /* text-align: center; */
        }

        .wrapper-account .container-account {
            background-color: rgb(214, 214, 214);
            display: flex;
            justify-content: center;
            /* align-items: center; */
            /* text-align: center; */
            padding-top: 45px;
            width: 100%;
        }

        .wrapper-account .container-account .content-account {
            background-color: #fff;
            width: 850px;
            height: auto;
            margin-left: -196px;
            box-shadow: 0 4px 9px 5px #ccc !important;
            border-radius: 10px;
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
            border: 1px solid black;
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
    </style>
</head>

<body>
    <?php require_once FILE_PHP_SIDEBAR ?>
    <div class="wrapper-account">
        <div class="container-account">
            <div class="content-account" style="padding: 15px;">
                <div style="left:0;margin-bottom:15px;float:left">
                    <input type="button" style="width:70px;border:0;background-color:#FFF3E0;border-radius: 12px;padding:5px;font-size:20px;" class="btnadd" id="btnadd" name="btnadd" value="+ Add"></input>
                </div>
                <div style="float:right;font-size:20px;">
                    <label>Search:
                        <input type="search" style="background-color:#F5FFFF;border-radius: 10px;border:0.5px solid;padding:5px;width:206px;" class="" placeholder="">
                    </label>
                </div>
                <div style="clear:both;">
                    <table>
                        <thead>
                            <tr>
                                <th class="tbl-header">ID</th>
                                <th class="tbl-header">Username</th>
                                <th class="tbl-header">Role</th>
                                <th class="tbl-header">Status</th>
                                <th class="tbl-header" style="width:140px">actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            require_once "./config/config.php";

                            $sqlCount = "SELECT count(*) as total FROM t_account where del_flg = 0";
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

                            // Trang bắt đầu
                            $start = ($current_page - 1) * $limit;

                            $sqlSelectData = "SELECT * FROM t_account where del_flg = 0 order by id DESC LIMIT  $start, $limit ";
                            $resultData = $connect->query($sqlSelectData);
                            if ($resultData->num_rows > 0) {
                                while ($rowData = $resultData->fetch_assoc()) {
                                    $a = null;
                                    if ($rowData["admin_flg"] == 0)
                                        $a = "user";
                                    else  $a = "admin";
                                    echo ' <tr>
                                    <td>
                                        ' . $rowData["id"] . '
                                    </td>
                                    <td>
                                    ' . $rowData["username"] . '
                                    </td>
                                    <td>
                                    ' . $a . '
                                    </td>
                                    <td >
                                    ' . $rowData["del_flg"] . '
                                    </td>
                                    <td class="action">
                                        <input style="float:left;border:0;width:60px;background-color:#E8F5E9;border-radius: 12px;margin-right:5px" type="button" class="btnlogin" id="btnlogin" name="btnlogin" value="Edit"></input>
                                        <input style="float:right;border:0;width:60px;background-color:#FFEBEE;border-radius: 12px;margin-right:10px" type="button" class="btnlogin" id="btnlogin" name="btnlogin" value="Delete"></input>
                                    </td>
                                </tr>';
                                }
                            }
                            ?>

                            <tr>
                                <td>
                                    nguyenminh15cdt1@gmail.com
                                </td>
                                <td class="cart_description">
                                    uuiiii
                                </td>
                                <td class="cart_avail"><span class="label label-success">In stock</span>
                                </td>
                                <td class="qty">
                                    yes
                                </td>
                                <td class="action">
                                    <input style="float:left;border:0;width:60px;background-color:#E8F5E9;border-radius: 12px;margin-right:5px" type="button" class="btnlogin" id="btnlogin" name="btnlogin" value="Edit"></input>
                                    <input style="float:right;border:0;width:60px;background-color:#FFEBEE;border-radius: 12px;margin-right:10px" type="button" class="btnlogin" id="btnlogin" name="btnlogin" value="Delete"></input>
                                </td>
                            </tr>
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

                <div style="background:red;width:100%;height:40px;margin-top:10px" class="pgn_admin" id="pgn_admin">

                    <!-- // if ($current_page > 1 && $total_page > 1) {
                    //     echo '<a href="' . FILE_PHP_RECRUITMENT . '?page=' . ($current_page - 1) . '"><b>&#8678;</b></a> | ';
                    // }

                    // for ($i = 1; $i <= $total_page; $i++) {
                    //     if ($i == $current_page) {
                    //         echo '<span style="color: #1a75ff;"><b>' . $i . '</b></span> | ';
                    //     } else {
                    //         echo '<a href="' . FILE_PHP_RECRUITMENT . '?page=' . $i . '">' . $i . '</a> | ';
                    //     }
                    // }

                    // if ($current_page < $total_page) {
                    //     echo '<a href="' . FILE_PHP_RECRUITMENT . '?page=' . ($current_page + 1) . '"><b>&#8680;</b></a>';
                    // } -->

                </div>
            </div>
        </div>
    </div>
</body>

</html>