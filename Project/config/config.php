<?php

    // SESSION
    define('SESSION_USERNAME','username');

    // COOKIE
    define('COOKIE_PASSWORD','password');
    define('COOKIE_USERNAME','username');

    // PATTERN
    define('PATTERN_PHONE','^(09|03|07|08|05)+([0-9]{8})');
    define('PATTERN_EMAIL','^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$');
    define('PATTERN_PASSWORD','(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}');

    // DB
    define('SERVERNAME','localhost');
    define('DATABASE','cosmetic_manager');
    define('USERNAME','root');
    define('PASSWORD','');

    session_start();

    
    global $conn;

    // Hàm kết nối database
    function connect()
    {
        global $conn;
        $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE) or die(mysqli_error($conn));

        if ($conn->connect_errno) {
            die("Lỗi kết nối tới MySQL: " . $conn->connect_error);
        }
    }

    // Hàm đóng kết nối
    function disconnect(){
        global $conn;
        if ($conn){
            $conn-> close();
        }
    }
?>