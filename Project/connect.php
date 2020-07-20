<?php
    const SERVERNAME ='localhost';
    const DATABASE = 'thuchanh';
    const USERNAME = 'root';
    const PASSWORD = '';

    $mysqli = new mysqli(SERVERNAME, USERNAME,PASSWORD, DATABASE) or die (mysqli_error($mysqli));
?>