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
    <link href=<?php echo FILE_CSS_DASHBOARD ?> rel="stylesheet" />
    <link href=<?php echo FILE_CSS_MANAGE_ACCOUNT ?> rel="stylesheet" />
    <style>

    </style>
</head>

<body>
    <?php require_once FILE_PHP_SIDEBAR ?>

    <div id="wrapper_dashboard">
        <div class="wrapper-dashboard" id="wrapper-dashboard">
            <div class="container-dashboard">
                <div class="content-dashboard">
                    <div class="first-card">
                        <?php
                        require_once "./config/config.php";
                   
                        $sql = "SELECT user.total_user, admin.total_admin, recruitment.total_recruitment, apply.total_apply from (
                                select count(*) as total_user from t_account where admin_flg = 0
                                ) AS user,
                                (
                                select count(*) as total_admin from t_account where admin_flg = 1
                                ) AS admin,
                                (
                                select count(*) as total_recruitment from t_recruitment 
                                ) AS recruitment,
                                (select count(*) as total_apply from t_apply ) AS apply";

                        $resultData = $connect->query($sql);

                        if ($resultData->num_rows > 0) {
                            while ($rowData = $resultData->fetch_assoc()) {
                                $total_user = $rowData["total_user"];
                                $total_admin = $rowData["total_admin"];
                                $total_apply = $rowData["total_apply"];
                                $total_recruitment = $rowData["total_recruitment"];
                            }
                        } else {
                            $total_apply = $total_admin = $total_apply = $total_recruitment = 0;
                        }
                        ?>
                        
                        <div class="card total-user" >
                            <h1><?= $total_user ?></h1>
                            <h6>Tổng số user</h6>
                        </div>

                        <div class="card total-admin">
                            <h1><?= $total_admin ?></h1>
                            <h6>Tổng số admin</h6>
                        </div>

                        <div class="card total-recruitment">
                            <h1><?= $total_recruitment ?></h1>
                            <h6>Tổng số tin tuyển dụng</h6>
                        </div>

                        <div class="card total-apply">
                            <h1><?= $total_apply ?></h1>
                            <h6>Tổng số người ứng tuyển</h6>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <script>
        var page = <?= $current_page ?>;
        var key = '<?= $key ?>';
    </script>

    <script src="<?= FILE_JS_MANAGE_ACCOUNT ?>"></script>
    <script src="<?= FILE_JS_COMMON ?>"></script>
</body>

</html>