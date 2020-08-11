<?php
require_once './config/router.php';
require_once FILE_PHP_MENUTOP;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quên mật khẩu</title>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_CHANGEPASS ?>>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_HEADER ?>>
</head>

<body>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src=<?= FILE_IMG_BANNER1 ?> style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src=<?= FILE_IMG_BANNER2 ?> style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src=<?= FILE_IMG_BANNER3 ?> style="width:100%">
        </div>

    </div>
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <div class="clear-both"></div>

    <div class="forgot">
        <form action='' id="form_forgotPass" method='post'>
            <h2>Forgot Password<h2>
                    <div class="input-container">
                        <i class="fa fa-envelope icon"></i>
                        <input type="text" placeholder="Nhập Email" name="email_confirm" id="email_confirm" pattern="<?= PATTERN_EMAIL ?>" required>
                    </div>
                    <button type="submit" class="btn" name='submit'>Submit</button>
        </form>
    </div>
    <div class="clear-both"></div>

    <!-- include footer -->
    <?php include FILE_PHP_FOOTER ?>

    <script src=<?= FILE_JS_SLIDESHOW ?>></script>
    <script src=<?= FILE_JS_COMMON ?>></script>
    <script src=<?= FILE_JS_FORGOTPASS ?>></script>
</body>
</html>