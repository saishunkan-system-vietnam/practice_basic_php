<?
session_start();
require_once('../config/router.php');
require_once(FILE_CONFIG);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý khảo sát</title>
    <link rel="stylesheet" href="<?= FILE_CSS_SURVEY_MANAGER?>">
</head>

<body>
    <?
    $infoLogin = false;
    if(!empty($_SESSION['dataLogin'])){
    $infoLogin = true;
    }
    include_once(FILE_MENU);
    $page = isset($_GET['page'])? $_GET['page'] : 1;
    $category = isset($_GET['category'])? $_GET['category'] : "0";
    $fnd_content = isset($_GET['fnd_content']) ? $_GET['fnd_content'] : "";
?>
    <div class="warpper_ad_survey" id = "warpper_ad_survey">
        <div class="list_ad_survey">
            <div class="find">
                <button class="btn_ins" id = "btn_ins">Thêm mới</button>
                <select name="category" id="category">
                    <option value="0">Tất cả</option>
                    <?
                        $conn = ConnectDB();
                        
                        $sql = "SELECT ct.id, ct.content FROM t_category ct";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0)
                        {
                            while( $data = $result->fetch_assoc()) 
                            {
                                ?>
                                <option value="<?= $data['id']?>" <? if($data['content'] == $category)echo "selected"?> ><?= $data['content']?></option>
                                <?
                            }
                        }
                        DisconnectDB($conn);
                    ?>
                </select>
                <input type="text" id="txtfind" value = "<?= $fnd_content ?>" class="txt_find">
                <button class="btn_find" id="btn_find">Tìm kiếm</button>
            </div>
            <div class="content_sv_mn" id="nd">
            </div>

            <div class="pg_nd">
                <ul class="pagination" id="pg">
                </ul>
            </div>
        </div>
    </div>

    <?include(FILE_FOOTER)?>

    <script>
    var page = <?= $page ?> ;
    var category = "<?= $category?>";
    var fnd_content = "<?= $fnd_content?>";
    </script>
    <script src="<?= FILE_JS_SVMANAGER?>"></script>
</body>

</html>