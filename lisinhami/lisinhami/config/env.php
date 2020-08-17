<?php
    define('SITE_URL',(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[SERVER_NAME]/");

    // ADMIN
    define('URL_SANPHAM',SITE_URL.'admin/sanpham');
    define('URL_ADD_SANPHAM',SITE_URL.'admin/addsanpham');
    define('URL_EDIT_SANPHAM',SITE_URL.'admin/editsanpham');
    define('URL_DEL_SANPHAM',SITE_URL.'admin/delsanpham');
?>