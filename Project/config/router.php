<?php
    define('BASE_PATH',dirname(__FILE__,2));

    // URL SITE
    define('SITE_URL','http://sinh.com');

    // SITE
    define('SITE_LOGOUT',SITE_URL.'/login_logout.php?type=logout');
    define('SITE_PRODUCT',SITE_URL.'/product.php');
    define('SITE_FORGOTPASS',SITE_URL.'/forgotpass.php');
    
    // PHP
    define('FILE_PHP_CONFIG',BASE_PATH.'/config/config.php');
    define('FILE_PHP_REGISTER',BASE_PATH.'/register.php');
    define('FILE_PHP_FUNCTION',BASE_PATH.'/function.php');
    define('FILE_PHP_MENUTOP',BASE_PATH.'/menuTop.php');
    define('FILE_PHP_FOOTER',BASE_PATH.'/footer.php');
    define('FILE_PHP_CART',SITE_URL.'/cart.php');
    define('FILE_PHP_ADDTOCART',BASE_PATH.'/addToCart.php');
    define('FILE_PHP_PAGINATION',BASE_PATH.'/pagination.php');
    define('FILE_PHP_PAGINATIONAD',BASE_PATH.'/admin/pagination.php');
    define('FILE_PHP_HEADERAD',BASE_PATH.'/admin/ad_header.php');


    // CSS
    define('FILE_CSS_STYLE_HEADER',SITE_URL.'/css/style_header.css');
    define('FILE_CSS_STYLE',SITE_URL.'/CSS/style.css');
    define('FILE_CSS_STYLE_PRODUCTDETAIL',SITE_URL.'/CSS/style_productDetail.css');
    define('FILE_CSS_STYLE_CHANGEPASS',SITE_URL.'/CSS/style_changePass.css');
    define('FILE_CSS_STYLE_ADMIN',SITE_URL.'/CSS/style_admin.css');

    // JS
    define('FILE_JS_LOGIN',SITE_URL.'/JS/login.js');
    define('FILE_JS_REGISTER',SITE_URL.'/JS/register.js');
    define('FILE_JS_COMMON',SITE_URL.'/JS/common.js');
    define('FILE_JS_FORGOTPASS',SITE_URL.'/JS/forgotpass.js');
    define('FILE_JS_SLIDESHOW',SITE_URL.'/JS/slideshow_auto.js');
    define('FILE_JS_CHANGEPASS',SITE_URL.'/JS/changePassword.js');
    define('FILE_JS_ACCOUNTAD',SITE_URL.'/JS/ad_Account.js');
    define('FILE_JS_PRODUCTAD',SITE_URL.'/JS/ad_Product.js');
    define('FILE_JS_ORDERAD',SITE_URL.'/JS/ad_Order.js');
    define('FILE_JS_CKEDITOR',SITE_URL.'/JS/ckeditor/ckeditor.js');
    define('FILE_JS_STATISTIC',SITE_URL.'/JS/statistic.js');


    // IMG
    define('FILE_IMG_AVARTA','../img/avatar.png');
    define('FILE_IMG_LOGO','./img/logo.png');
    define('FILE_IMG_BANNER1','./IMG/img1.png');
    define('FILE_IMG_BANNER2','./IMG/img2.png');
    define('FILE_IMG_BANNER3','./IMG/img3.png');

    // LINK
    define('LINK_ICON','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    define('LINK_JQUERY','https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
?>