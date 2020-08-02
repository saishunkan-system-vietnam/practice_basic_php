<?

define('BASE_PATH',dirname(__FILE__,2));

// URL SITE
define('SITE_URL','http://lieund.com');

define('FILE_MENU',BASE_PATH.'/menu.php');
define('FILE_FOOTER',BASE_PATH.'/footer.php');
define('URL_LOGOUT',SITE_URL.'/logout.php');
define('URL_INTRODUCE',SITE_URL.'/introduce.php');
define('URL_LISTSURVEY',SITE_URL.'/listsurvey.php');
define('SURVEY_MANAGER',SITE_URL.'/admin/manager.php');

//CSS
define('FILE_CSS_LOGIN',SITE_URL.'/css/login.css');
define('FILE_CSS_MENU',SITE_URL.'/css/menu.css');
define('FILE_CSS_REGIST',SITE_URL.'/css/regist.css');
define('FILE_CSS_STYLESHEET',SITE_URL.'/css/stylesheet.css');
define('FILE_CSS_INDEX',SITE_URL.'/css/index.css');
define('FILE_CSS_LISTSURVEY',SITE_URL.'/css/listsurvey.css');
define('FILE_CSS_INTRODUCE',SITE_URL.'/css/introduce.css');
define('FILE_CSS_SURVEY',SITE_URL.'/css/survey.css');
define('FILE_CSS_SURVEY_MANAGER',SITE_URL.'/css/survey_manager.css');
define('FILE_CSS_STATISTIC',SITE_URL.'/css/statistic.css');

//JS
define('FILE_JS_LOGIN',SITE_URL.'/js/login.js');
define('FILE_JS_REGIST',SITE_URL.'/js/regist.js');
define('FILE_JS_COMMON',SITE_URL.'/js/common.js');
define('FILE_JS_INDEDX',SITE_URL.'/js/index.js');
define('FILE_JS_LISTSURVEY',SITE_URL.'/js/listsurvey.js');
define('FILE_JS_SVMANAGER',SITE_URL.'/js/sv_manager.js');

//LIB
define('FILE_LIB_LOGIN',BASE_PATH.'/lib/login_ajax.php');
define('FILE_LIB_REGIST',BASE_PATH.'/js/regist_ajax.php');
define('FILE_LIB_HOME',BASE_PATH.'/js/home_ajax.php');

// IMAGE
define('FILE_IMG_LOGO',SITE_URL."/image/logo.png");

//CONFIG
define('FILE_CONFIG',BASE_PATH.'/config/config.php');
?>