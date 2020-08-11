<?
    session_start();
    require_once('./config/router.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách khảo sát</title>

    <link rel="stylesheet" href=<?= FILE_CSS_STYLESHEET?>>
    <link rel="stylesheet" href=<?= FILE_CSS_LISTSURVEY?>>
    <link rel="stylesheet" href=<?= FILE_CSS_SURVEY?>>

</head>

<body>
<?
    $infoLogin = false;
    if(!empty($_SESSION['dataLogin'])){        
        $infoLogin = true;
    }
    include_once(FILE_MENU);

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }
?>
    <div class="warpper-sv">
        <H1>DANH SÁCH KHẢO SÁT</H1>
        <div class="container-sv" id = "tl">
            <div class="detail" id="nd">
            </div>
            <div class="pg_nd">
            <ul class="pagination" id="pg">
            </ul>
            </div>
        </div>
    </div>

    <div class="warpper-survey">
        <div class="container-survey" id = "container-survey">
        </div> 
    </div>
    <div class="footer"><?include_once(FILE_FOOTER)?></div>
    
    <script>
    var infoLogin = '<?= empty($_SESSION['dataLogin']) ? "login" : "survey" ?>';
    var page = <?= $page?>;
    </script>
    <script src="<?= FILE_JS_LISTSURVEY?>"></script>
</body>

</html>