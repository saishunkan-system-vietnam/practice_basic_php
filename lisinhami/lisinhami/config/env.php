<?php
    define('SITE_URL',(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[SERVER_NAME]/");

    // ADMIN

    // Sản phẩm
    define('URL_SANPHAM',SITE_URL.'admin/sanpham/');
    define('URL_ADD_SANPHAM',SITE_URL.'admin/addsanpham');
    define('URL_EDIT_SANPHAM',SITE_URL.'admin/editsanpham/');
    define('URL_DEL_SANPHAM',SITE_URL.'admin/delsanpham/');

    // Đơn hàng
    define('URL_DONHANG',SITE_URL.'admin/order/');
    define('URL_PROC_ODR',SITE_URL.'admin/proc/');
    define('URL_CONTENT_ODR',SITE_URL.'admin/content-order/');

    // IMG
    define('URL_IMG',SITE_URL.'admin/image/');
    define('URL_DEL_IMG',SITE_URL.'admin/xoahinhanh/');
    define('URL_SETTOP_IMG',SITE_URL.'admin/settop/');
    

    // CLIENT
    define('URL_CHITIET_SANPHAM',SITE_URL.'chitiet/');
    define('URL_DANHMUC_SANPHAM',SITE_URL.'danhmuc/');
    define('URL_SEARCH',SITE_URL.'timkiem/');
    define('URL_LICHSUMUAHANG',SITE_URL.'lichsumuahang/');

    // login
    define('URL_LOGIN',SITE_URL.'login');
    define('URL_REGISTER',SITE_URL.'dangky');
    define('URL_LOGOUT',SITE_URL.'logout');

    // LIMIT
    define('LIMIT_PAGINATE',12);

?>