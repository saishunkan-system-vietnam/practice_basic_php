<?php
require('./config/router.php');
include(SITE_MENUTOP);
?>
<link rel="stylesheet" type="text/css" href=<?= FILE_CSS_SENDMAIL ?>>

<body>
    <form id='frm_send_mail' name="frm_send_mail" action='' method='POST'>
        <div class="send_mail">
            <img src=<?= IMG_LOGO ?> class="avatar">
            <h1>Lấy lại mật khẩu</h1>
            <form>
                <div class="frm_send">
                    <p>Vui lòng nhập email khôi phục</p>
                    <input id="inpMail" name="inpMail" type="text" placeholder="Enter Email" />
                </div>
                <div class="frm_send">
                    <button id="inpSub">Send</button>
                </div>
            </form>
        </div>
    </form>
</body>

<script src=<?= FILE_JS_SENDMAIL ?>></script>