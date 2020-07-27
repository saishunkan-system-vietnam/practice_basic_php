<?php 
    require './config/router.php';
    require FILE_PHP_HEADER;
    
?>

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
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>

<h1>Forgot Password<h1>
        <form action='' id ="form_forgotPass" method='post'>
            <table cellspacing='5' align='center'>
                <tr>
                    <td>Email:</td>
                    <td><input type='text' name='email_confirm' id ="email_confirm" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' name='submit' value='Submit' /></td>
                </tr>
            </table>
        </form>

    <link rel="stylesheet" href=<?= FILE_CSS_STYLE ?>>
    <script src=<?= FILE_JS_SLIDESHOW ?>></script>
    <script src=<?= FILE_JS_COMMON ?>></script>
    <script src=<?= FILE_JS_FORGOTPASS ?>></script>
    </body>
    <!-- include footer -->
    <?php require FILE_PHP_FOOTER ?>