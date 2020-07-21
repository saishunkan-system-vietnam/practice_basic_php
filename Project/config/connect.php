<?php
     define('SERVERNAME','localhost');
     define('DATABASE','cosmetic_manager');
     define('USERNAME','root');
     define('PASSWORD','');
     
     $mysqli = new mysqli(SERVERNAME, USERNAME,PASSWORD, DATABASE) or die (mysqli_error($mysqli));
?>