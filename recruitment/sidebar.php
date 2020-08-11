<?php require_once "./config/router.php"; ?>
<link href=<?php echo FILE_CSS_SIDEBAR ?> rel="stylesheet" />

<div class="sidebar">
    <div class="sidebar-content">
        <div class="home">
            <button class="btnsidebar" type="button" id="btnmanage_home">🏠 Home</button>
        </div>

        <div class="account">
            <button class="btnsidebar" type="button" id="btnmanage_account">🙍‍♂️ Manage account</button>
        </div>

        <div class="recruitment">
            <button class="btnsidebar" type="button" id="btnmanage_recruitment">📄 Manage Recruitment</button>
        </div>
    </div>
</div>

<script src="<?= FILE_JS_SIDEBAR ?>"></script>