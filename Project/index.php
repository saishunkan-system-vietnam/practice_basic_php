<?php 
    require './config/router.php';
    require FILE_PHP_HEADER;
?>

<!-- Slideshow container -->
<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="./IMG/img1.png" style="width:100%">
        <div class="text">Caption Text</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="./IMG/img2.png" style="width:100%">
        <div class="text">Caption Two</div>
    </div>

    <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="./IMG/img3.jpg" style="width:100%">
        <div class="text">Caption Three</div>
    </div>

</div>
<br>

<div style="text-align:center">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>

<link rel="stylesheet" href=<?= FILE_CSS_STYLE ?>>
<script src="./JS/slideshow_auto.js"></script>
</body>

<!-- include footer -->
<?php require FILE_PHP_FOOTER ?>