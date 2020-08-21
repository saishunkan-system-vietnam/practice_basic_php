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
    define('URL_LICHSU_MUAHANG',SITE_URL.'lichsumuahang/');
    define('URL_CHITIET_DONHANG',SITE_URL.'chitietdonhang/');

    // login
    define('URL_LOGIN',SITE_URL.'login');
    define('URL_REGISTER',SITE_URL.'dangky');
    define('URL_LOGOUT',SITE_URL.'logout');

    // LIMIT
    define('LIMIT_PAGINATE',12);

    // Cookie
    define('COOKIE_LOGIN','cookie_login');

    // Cart
    define('SESSION_CART_ID','cart.');
    define('URL_CART',SITE_URL.'giohang/');
    define('URL_DEL_CART',SITE_URL.'delgiohang/');
    define('URL_UPD_CART',SITE_URL.'updgiohang/');
    define('URL_CLEAR_CART',SITE_URL.'cleargiohang/');

    // Seesion
    define('SESSION_ERROR', 'error');
    define('SESSION_EMAIL', 'email');
    define('SESSION_ADMIN', 'admin');
    define('SESSION_CART','cart.');

?>