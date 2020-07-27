<?php
    require './config/router.php';
    require FILE_PHP_HEADER;

?>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

h2 {
    text-align: center;
}

.input-container {
    width: 80%;
    margin-bottom: 15px;
    display: flex;
}

.icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
    margin: 8px 1px 8px 70px;
}

.changePass {
    position: absolute;
    width: 30%;
    top: 10%;
    left: 40%;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
    background-color: dodgerblue;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 20%;
    opacity: 0.9;
    position: sticky;
    left: 50%;
}

.btn:hover {
    opacity: 1;
}
</style>



<div class="changePass">
    <form action="" id="form_changePass">
        <h2>Đổi mật khẩu</h2>
        <div class="input-container">
            <input class="input-field" type="hidden" placeholder="Email" name="email" id="email_changePass"
                value="<?= $_REQUEST['email']?>">
        </div>
        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" placeholder="Mật khẩu mới" name="new_password" id="new_password"
                require>
        </div>

        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" placeholder="Xác nhận mật khẩu mới" name="re_new_password"
                id="re_new_password" require>
        </div>

        <button type="submit" class="btn">Lưu</button>
    </form>
</div>
<script src=<?= FILE_JS_CHANGEPASS ?>></script>
</body>

<!-- include footer -->