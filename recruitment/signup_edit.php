<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_SIGNUP ?> rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper_signup" style="height:auto;">
        <div class="signup_page" style="max-width:2500px;width:680px;height:auto; background-color:#E5F8D1">
            <div class="title" style="margin-top : 30px;font-size:20px;color:#4A7E08">
                xxx
            </div>
            <form class="form" id="myform" name="myform" method="post">
                <div class="label">
                    Company:
                </div>
                <div style="margin-right: 6px;">
                    <input type="text" name="company" onkeypress="ClearError(id)" onchange="ClearError(id)" id="username" placeholder="Nhập tên company" />
                    <div class="error_message"><label style="color:red;" name="error_company" id="error_company"> </label></div>
                </div>
                <div class="label">
                    Position Title:
                </div>
                <div style="margin-right: 6px;">
                    <textarea id="pos_title" style="width:100%; text-align:left; overflow:auto; margin-top: 10px;"  rows="3" onkeypress="ClearError(id)" onchange="ClearError(id)"> </textarea>
                    <div class="error_message"><label style="color:red" id="pos_title"></label></div>
                </div>
                <div class="label" >
                    Address:
                </div>
                <div style="margin-right: 6px;"> 
                    <input type="text" name="address" id="address" placeholder=" Nhập address" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_address"></label></div>
                </div>
                <div class="label">
                    Salary:
                </div>
                <div style="margin-right: 6px;">
                    <input type="text" name="salary" id="salary" placeholder=" Nhập salary" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_salary"></label></div>
                </div>
                <div class="label">
                    Deadline:
                </div>
                <div style="margin-bottom:5px">
                    <input type="date" id="deadline" class="deadline" style="text-align:left;width:169px;" value="<?php echo date("Y-m-d"); ?>" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                    <div class="error_message"><label style="color:red" id="error_deadline"></label></div>
                </div>

                <div class="label" style="clear: both; padding-top: 12px;">
                    Detail:
                </div>
                <div style="margin-top:10px">
                    <textarea id="detail" name="detail"  rows="3" onkeypress="ClearError(id)" onchange="ClearError(id)">
                    </textarea>
                    <div class="error_message"><label style="color:red; margin-bottom:5px;" id="error_address"></label></div>
                </div>
                <div style="clear: both;">
                    <input type="button" class="btnsignup" id="btnsignup" value="Đăng ký"></input>
                </div>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace("detail",{height:250});
    </script>
</body>

</html>

