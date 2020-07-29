<?php 
    require './config/router.php';
    require FILE_PHP_MENUTOP;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quên mật khẩu</title>
</head>
<body>
    
</body>
</html>

<!-- Slideshow container -->
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src=<?= FILE_IMG_BANNER1 ?> style="width:100%">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src=<?= FILE_IMG_BANNER2 ?> style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src=<?= FILE_IMG_BANNER3 ?> style="width:100%">
        <div class="text">Caption Three</div>
    </div>

</div>
<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

h2 {
    text-align: center;
}

.input-container {
    width: 80%;
    margin-bottom: 15px;
    display: flex;
}

.icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
    margin: 8px 1px 8px 70px;
}

.forgotPass {
    /* position: absolute; */
    width: 30%;
    margin: 5% 35%;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
    background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 20%;
    opacity: 0.9;
    position: sticky;
    left: 45%;
}

.btn:hover {
    opacity: 1;
}
</style>

<div class="forgotPass">
    <form action='' id="form_forgotPass" method='post'>
        <h2>Forgot Password<h2>
                <div class="input-container">
                    <i class="fa fa-envelope icon"></i>
                    <input type="text" placeholder="Nhập Email" name="email_confirm" id="email_confirm"
                        pattern=<?= PATTERN_EMAIL ?> required>
                </div>
                <button type="submit" class="btn" name='submit'>Submit</button>
    </form>
</div>

<link rel="stylesheet" href=<?= FILE_CSS_STYLE ?>>
<script src=<?= FILE_JS_SLIDESHOW ?>></script>
<script src=<?= FILE_JS_COMMON ?>></script>
<script src=<?= FILE_JS_FORGOTPASS ?>></script>
</body>
<!-- include footer -->
<?php include FILE_PHP_FOOTER ?>