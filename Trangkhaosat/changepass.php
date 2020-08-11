<?
    session_start();
    require_once("./config/router.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="<?= FILE_CSS_CHANGE_PASS?>">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</head>

<body>
    <?
    if(empty($_GET['uid']) && empty($_GET['token']))
    {
        $homepage = "Location: ". SITE_URL;
        header($homepage);
    }
    $uid = $_GET['uid'];
    $token = $_GET['token'];

    $infoLogin = false;
    if(!empty($_SESSION['dataLogin'])){
        $infoLogin = true;
    }
    include_once(FILE_MENU);
    ?>

    <div class="warrper_changepass">
        <div class="container_changepass">
            <div class="content_changepass">
                <h1>Đổi mật khẩu</h1>
                <label for="pass">Mật khẩu mới</label>
                <input type="password" class="txt_pass" name="pass" placeholder="pass" autocomplete="off" id="txt_pass">
                <label for="rpass">Xác nhận mật khẩu</label>
                <input type="password" class="txt_pass" name="rpass" placeholder="confirm" autocomplete="off"
                    id="txt_rpass">
                <div class="btn_fg">
                    <button class="btn_run" id="btn_changepass">Change</button>
                </div>
            </div>
        </div>
    </div>

    <div class="footer"  style="position: absolute;"><?include_once(FILE_FOOTER)?></div>
    <script>
    var uid = '<?= $uid?>';
    var token = '<?= $token?>';
    </script>
    <script src="<?= FILE_JS_CHANGE_PASS?>"></script>
    <script src="<?= FILE_JS_COMMON?>"></script>
</body>

</html>