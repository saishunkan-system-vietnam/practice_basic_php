<?
    require("../config/config.php");

    $myJSON = array();  

    $myJSON += ["uid"=>GetCookieUid()];
    $myJSON += ["pass"=>GetCookiePass()];
    header('Content-Type: application/json');
    echo (json_encode($myJSON));
?>