<?session_start();

    require_once('./config/router.php');

    unset($_SESSION['dataLogin'] );
    unset($_SESSION['admin_flg'] );

    $homepage = "Location: ". SITE_URL;

    header($homepage);

?>