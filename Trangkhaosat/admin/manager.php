<?
session_start();
require_once('../config/router.php');
require_once(FILE_CONFIG);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link href=<?="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"?> rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="<?= FILE_CSS_ADMIN?>">
    <link rel="stylesheet" href="<?= FILE_CSS_SURVEY_MANAGER?>">
    <link rel="stylesheet" href="<?= FILE_CSS_STATISTIC?>">
    <link rel="stylesheet" href="<?= FILE_CSS_REGIST?>">
</head>

<body>
    <?
    if(empty($_SESSION['admin_flg']) || $_SESSION['admin_flg'] == "0" ){

        $homepage = "Location: ". SITE_URL;
        header($homepage);
    }?>
    <div class="admin_panel">
        <div class="slidebar">
            <ul>
                <li><a href="" name="tab1"><i class="fa fa-tachometer"></i>Dashboard</a></li>
                <li><a href="" name="tab2"><i class="fa fa-eyedropper"></i>Survey</a></li>
                <li><a href="" name="tab3"><i class="fa fa-users" aria-hidden="true"></i>User</a></li>
                <li><a href="" name="tab_index"><i class="fa fa-home" aria-hidden="true"></i></i>Home</a></li>
            </ul>
        </div>
        <div class="main">
            <div id="tab1" class="tab">
                <h2 class="header">Dashboard</h2>
                <div class="containner_statistic_visit">
                    <div class="box total">
                        <i class="fa fa-eye"></i>
                        <h3 id="tt_view">0</h3>
                        <p class="lead">Page Total Views</p>
                    </div>
                    <div class="box total">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h3 id="tt_user">0</h3>
                        <p class="lead">Total User</p>
                    </div>
                    <div class="box visit">
                        <i class="fa fa-plug" aria-hidden="true"></i>
                        <h3 id="tt_onl">0</h3>
                        <p class="lead">Online</p>
                    </div>
                    <div class="box visit">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h3 id="mem_onl">0</h3>
                        <p class="lead">Member-Online</p>
                    </div>
                    <div class="box visit">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                        <h3 id="guest_onl">0</h3>
                        <p class="lead">Guest-Online</p>
                    </div>
                </div>
                <div class="containner_statistic_survey">
                    <div class="box survey">
                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                        <h3 id="tt_question">0</h3>
                        <p class="lead">Survey Questions</p>
                    </div>
                    <div class="box survey">
                        <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        <h3 id="tt_answer">0</h3>
                        <p class="lead">Perform Survey</p>
                    </div>
                </div>

                <button class="btn_fresh" id="btn_fresh">Refresh</button>

            </div>
            <div id="tab2" class="tab">
                <h2 class="header">Survey</h2>
                <div class="warpper_ad_survey" id="warpper_ad_survey">
                    <div class="list_ad_survey">
                        <div class="find">
                            <button class="btn_ins" id="btn_ins">Thêm mới</button>
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
                                <option value="<?= $data['id']?>"><?= $data['content']?></option>
                                <?
                            }
                        }
                        DisconnectDB($conn);
                    ?>
                            </select>
                            <input type="text" id="txtfind" class="txt_find">
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
                <div id="report">
                    <div class="warpper_report">
                    </div>
                </div>
            </div>
            <div id="tab3" class="tab">
                <h2 class="header">User</h2>
                <div class="warpper-user">
                    <div class="list_user">
                        <div class="find">
                            <button class="btn_ins" id="btn_ins_user">Thêm mới</button>
                            <input type="text" id="txt_find_user" class="txt_find">
                            <button class="btn_find" id="btn_find_user">Tìm kiếm</button>
                        </div>
                        <div class="content_us" id="nd_us">
                        </div>

                        <div class="pg_nd">
                            <ul class="pagination" id="pg_us">
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="account">

                </div>
            </div>
        </div>
        <script src="<?= FILE_JS_SVMANAGER?>"></script>
        <script src="<?= FILE_JS_COMMON?>"></script>
        <script src="<?= FILE_JS_MANAGER?>"></script>
        <script>
        google.charts.load('current', {'packages':['corechart']});
        </script>
</body>

</html>