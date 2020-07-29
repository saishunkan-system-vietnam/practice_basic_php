<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>

<body>
    <?php
    require('./config/router.php');
    include(SITE_MENUTOP);
    include(SITE_BANNER);
    include(SITE_DANHSACHNEW);
    include(SITE_FOOTER);

    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>alert('$_SESSION[error]');</script>";
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>alert('$_SESSION[success]');</script>";
        unset($_SESSION['success']);
    }
    ?>
</body>

</html>