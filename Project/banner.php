<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href=<?= FILE_CSS_BANNER ?>>
</head>

<body>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src=<?= IMG_BANNER1 ?> style="width: 1350px; height: 374px;">
        </div>
        <div class="mySlides fade">
            <img src=<?= IMG_BANNER2 ?> style="width: 1350px; height: 374px;">
        </div>
        <div class="mySlides fade">
            <img src=<?= IMG_BANNER3 ?> style="width: 1350px; height: 374px;">
        </div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script src=<?= FILE_JS_BANNER ?>></script>
</body>

</html>