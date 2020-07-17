<?session_start();

    $cookie_name = 'lieu';
    $cookie_time = (3600 * 24 * 30);
    unset($_SESSION['dataLogin'] );
    if(isset($_COOKIE[$cookie_name]))
    { 
        //======
        parse_str($_COOKIE[$cookie_name]);

        setcookie($cookie_name,'usr='.$usr."&pass=".$pass."&flg=logout",time() + $cookie_time);    
    }

    header("Location: https://lieu.com");

?>