<?php require_once "./config/router.php"; ?>
<link href=<?php echo FILE_CSS_APPLY ?> rel="stylesheet" />
<script src="<?= FILE_JS_APPLY ?>"></script>

<?php
if (isset($_POST["recruitment_id"]) && isset($_POST["position"]) && isset($_POST["user_email"])) {
    $recruitment_id = $_POST["recruitment_id"];
    $position = $_POST["position"];
    $user_email = $_POST["user_email"];
    require_once "./config/config.php";
    $sql = "SELECT id, username, tel FROM t_account where del_flg = 0 and id = '$user_email'";
    $resultData = $connect->query($sql);

    if ($resultData->num_rows > 0) {
        while ($rowData = $resultData->fetch_assoc()) {
            echo '<div class="apply-wrapper">
            <div class="apply-container">
                <div class="apply-header">
                    <button type="button" id="btnapply_close" class="close">×</button>
                    <h4 class="apply-title" id="apply_title" data-id=' . $_POST["recruitment_id"] . '> Bạn đang ứng tuyển cho vị trí
                        <strong style="color:blue">' . $position . '</strong><br>
                    </h4>
                </div>
    
                <div class="apply-resume-header">
                    <div class="content">
                        <div class="main">
                            <div>
                                <img id="avatar" src="img/user.png"/>
                            </div>
                        </div>
                    </div>
                    <div class="title">
                        <div class="username-title">
                            <div>' . $rowData["username"] . '</div>
                            <!-- <div style="margin-top:0px;font-size:15px" >
                                IT
                            </div> -->
                        </div>
                    </div>
                </div>
    
                <div class="apply-resume-body">
                    <div class="content">
                        <div>
                            <div class="label">
                                Email:
                            </div>
                            <div>' . $user_email . '</div>
                        </div>
                        <div>
                            <div class="label">
                                Số điện thoại:
                            </div>
                            <div>
                                <input type="text" id="tel" value="' . $rowData["tel"] . '" name="tel" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                            </div>
                            <div class="error_message" name="error_tel" id="error_tel"></div>
                        </div>                       
                    </div>
                </div>
                <div class="apply-footer">
                    <div class="content">
                        <button type="button" id="btnapply_popup" name="btnapply_popup" style="margin-right: 4px;">Nộp đơn</button>
                        <button type="button" id="btncancel">Trở Về</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
        }
    } else {
        echo "Error";
    }
    
    close_connect();
}
?>