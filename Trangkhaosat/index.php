<?
    session_start();
    require_once('./config/router.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>KHẢO SÁT TRỰC TUYẾN</title>
    <link rel="stylesheet" href="<?= FILE_CSS_INDEX?>">
    <link rel="stylesheet" href="<?= FILE_CSS_STYLESHEET?>">
    <link rel="stylesheet" href="<?= FILE_CSS_SURVEY?>">
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
    <div>
        <img class="banner" src="<?= FILE_IMG_BANNER?>" style="width:100%">
    </div>
    <div class="warpper-home">
        <div class="ks-fast">
            <div class="container-home">
                <div class="row" id="content">
                    <H1>KHẢO SÁT NHANH</H1>
                </div>
            </div>
        </div>
    </div>

    <div class="warpper-survey">
        <div class="container-survey" id="container-survey">
        </div>
    </div>

    <script>
    var infoLogin = '<?= empty($_SESSION['dataLogin']) ? "login" : "survey" ?>';
    </script>

    <script src="<?= FILE_JS_INDEDX?>"></script>
    <footer>
        <?include(FILE_FOOTER)?>
    </footer>
</body>

</html>