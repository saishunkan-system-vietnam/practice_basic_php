<?
    session_start();
    require_once("./config/router.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href="<?= FILE_CSS_FORGOT_PASS?>">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>
    <?
    $infoLogin = false;
    if(!empty($_SESSION['dataLogin'])){
        $infoLogin = true;
    }
    include_once(FILE_MENU);
    ?>
    <div class="warrper_forgot">
        <div class="container_forgot">
            <div class="content_forgot">
                <h1>Reset mật khẩu</h1>
                <input type="text" class="txt_email" name="email" placeholder="email" autocomplete="off" id="txt_email">
                <div class="btn_fg">
                    <button class="btn_run" id="btn_run">Reset</button>
                </div>
            </div>
            <div class="kq_fg" id="kq_fg"><span class = "sp_fg"></span></div>
            <div id="wait"
                style="display:none;width:130px;height:140px;border:0px solid black;position:absolute;top:10%;left:40%;padding:2px;">
                <img src='https://media.giphy.com/media/ZBQhoZC0nqknSviPqT/giphy.gif' width="120" height="120" /><br></div>

        </div>
    </div>

    <div class="footer">
        <?include(FILE_FOOTER)?>
    </div>

    <script src="<?= FILE_JS_FORGOT_PASS?>"></script>
</body>

</html>