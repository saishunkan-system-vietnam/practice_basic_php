<?php 
    require_once '../config/router.php';
    require_once FILE_PHP_HEADERAD; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href=<?= LINK_ICON?>>
    <link rel="stylesheet" href=<?= FILE_CSS_STYLE_HEADER?>>
    <script src=<?= LINK_JQUERY?>></script>
</head>

<body>
<div class="main-content" id="statistic">
</div>
    <script src=<?= FILE_JS_STATISTIC ?>></script>
</body>

</html>