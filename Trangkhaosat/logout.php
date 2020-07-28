<?session_start();

    require_once('./config/router.php');

    unset($_SESSION['dataLogin'] );

    $homepage = "Location: ". SITE_URL;

    header($homepage);

?>