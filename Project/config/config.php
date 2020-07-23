<?php
    // SESSION
    define('SESSION_USERNAME','username');

    // COOKIE
    define('COOKIE_PASSWORD','password');
    define('COOKIE_USERNAME','username');

    // PATTERN
    define('PATTERN_PHONE','"^(09|03|07|08|05)+([0-9]{8})"');
    define('PATTERN_EMAIL','"^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$"');
    define('PATTERN_PASSWORD','"(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"');

    // DB
    define('SERVERNAME','localhost');
    define('DATABASE','cosmetic_manager');
    define('USERNAME','root');
    define('PASSWORD','');
    
    $mysqli = new mysqli(SERVERNAME, USERNAME,PASSWORD, DATABASE) or die (mysqli_error($mysqli));

    if ($mysqli->connect_errno) {
        die("Lỗi kết nối tới MySQL: " . $mysqli->connect_error);
    }
?>