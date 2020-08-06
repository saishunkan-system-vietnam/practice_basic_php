<?php 
require_once "./config/router.php";
require_once "./config/config.php";
 ?>
<link href=<?= FILE_CSS_SIGNUP ?> rel="stylesheet" />
<!-- <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> -->

<?php

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $sqlSelectData = "SELECT * FROM t_account where id='$id'";
    $resultData = $connect->query($sqlSelectData);

    if ($resultData->num_rows > 0) {
        while ($rowData = $resultData->fetch_assoc()) {
           $female = $rowData["gender"] == "Female" ? "checked" : "";
           $male = $rowData["gender"] == "Male" ? "checked" : "";
           $other = $rowData["gender"] == "Other" ? "checked" : "";
       
            echo '
            <div class="wrapper_signup" style="height:auto;">
    <div class="signup_page" style="background-color:#e6f4fb">
        <div class="title">
            Account
        </div>
        <form class="form" id="myform" name="myform" method="post">
            <div class="label">
                Họ và tên:
            </div>
            <div>
                <input type="text" name="username" onkeypress="ClearError(id)" onchange="ClearError(id)" id="username" value = "'.$rowData["username"].'" />
                <div class="error_message"><label style="color:red;" name="error_username" id="error_username"> </label></div>
            </div>
            <div class="label">
                Email:
            </div>
            <div>
                <input type="text" readonly value = "'.$rowData["id"].'"  name="email" id="email" placeholder="Nhập Email" onkeypress="ClearError(id)" onchange="ClearError(id)" />              
                <div class="error_message"><label style="color:red" id="error_email"></label></div>
            </div>
            <div class="label">
                Password:
            </div>
            <div>
                <input type="password" value = '.$rowData["password"].' name="password" id="password" placeholder=" Nhập Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_password"></label></div>
            </div>
            <div class="label">
                Xác nhận Password:
            </div>
            <div>
                <input type="password" value = '.$rowData["password"].' name="confirm_password" id="confirm_password" placeholder=" Nhập lại Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />                
                <div class="error_message"><label style="color:red" id="error_confirm_password"></label></div>
            </div>
            <div class="label">
                Ngày sinh:
            </div>
            <div>
                <input type="date" value='.$rowData["birthdate"].' id="birthdate" name="birthdate" onkeypress="ClearError(id)" onchange="ClearError(id)" />                
                 <div class="error_message"><label style="color:red" id="error_birthdate"></label></div>
            </div>
            <div class="label">
                Giới tính:
            </div>
            <div class="gender-content">
                <div style="float:left; padding-left:0px;"><input type="radio" id="Male" name="gender" value="Male" '.$male.'/>
                    <label for="Male">Male</label><br>
                </div>

                <div style="float:left;padding-left:20px;">
                    <div><input type="radio" id="female" name="gender" value="Female"  '.$female.'/>
                        <label for="Female">Female</label><br>
                    </div>
                </div>

                <div style="float:left;padding-left:20px;">
                    <div><input type="radio" id="other" name="gender" value="Other" '.$other.'/>
                        <label for="Other">Other</label><br>
                    </div>
                </div>

            </div>
            <div class="label">
                Số điện thoại:
            </div>
            <div>
                <input type="number" value = '.$rowData["tel"].' placeholder="Nhập số điện thoại" id="tel" name="tel" onkeypress="ClearError(id)" onchange="ClearError(id)">                
                <div class="error_message"><label style="color:red" id="error_tel"></label></div>
            </div>
            <div class="label" style="clear: both; padding-top: 12px;">
                Địa chỉ:
            </div>
            <div style="margin-top:5px;">
                <textarea id="address" name="address" rows="3" onkeypress="ClearError(id)" onchange="ClearError(id)">                
                '.$rowData["address"].'
                </textarea>
                <div class="error_message"><label style="color:red; margin-bottom:5px;" id="error_address"></label></div>
            </div>

            <div style="clear: both;">
                <input type="button" class="btnsignup" id="btnsignup" name="btnupdate" value="Update"></input>
            </div>
        </form>
    </div>
</div>';
        }
    }
}
?>
<script src="<?= FILE_JS_SIGNUP ?>"></script>
<!-- <div class="wrapper_signup" style="height:auto">
    <div class="signup_page">
        <div class="title">
            Account
        </div>
        <form class="form" id="myform" name="myform" method="post">
            <div class="label">
                Họ và tên:
            </div>
            <div>
                <input type="text" name="username" onkeypress="ClearError(id)" onchange="ClearError(id)" id="username" placeholder="Nhập họ tên đầy đủ" />
                <div class="error_message"><label style="color:red;" name="error_username" id="error_username"> </label></div>
            </div>
            <div class="label">
                Email:
            </div>
            <div>
                <input type="text" name="email" id="email" placeholder="Nhập Email" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_email"></label></div>
            </div>
            <div class="label">
                Password:
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder=" Nhập Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_password"></label></div>
            </div>
            <div class="label">
                Xác nhận Password:
            </div>
            <div>
                <input type="password" name="confirm_password" id="confirm_password" placeholder=" Nhập lại Password" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_confirm_password"></label></div>
            </div>
            <div class="label">
                Ngày sinh:
            </div>
            <div>
                <input type="date" id="birthdate" name="birthdate" value="<?php echo date("Y-m-d"); ?>" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_birthdate"></label></div>
            </div>
            <div class="label">
                Giới tính:
            </div>
            <div class="gender-content">
                <div style="float:left; padding-left:0px;"><input type="radio" id="Male" name="gender" value="Male" checked />
                    <label for="Male">Male</label><br>
                </div>

                <div style="float:left;padding-left:20px;">
                    <div><input type="radio" id="female" name="gender" value="Female" />
                        <label for="Female">Female</label><br>
                    </div>
                </div>

                <div style="float:left;padding-left:20px;">
                    <div><input type="radio" id="other" name="gender" value="Other" />
                        <label for="Other">Other</label><br>
                    </div>
                </div>

            </div>
            <div class="label">
                Số điện thoại:
            </div>
            <div>
                <input type="number" placeholder="Nhập số điện thoại" id="tel" name="tel" onkeypress="ClearError(id)" onchange="ClearError(id)">
                <div class="error_message"><label style="color:red" id="error_tel"></label></div>
            </div>
            <div class="label" style="clear: both; padding-top: 12px;">
                Địa chỉ:
            </div>
            <div style="margin-top:5px;">
                <textarea id="address" name="address" rows="3" onkeypress="ClearError(id)" onchange="ClearError(id)">
                    </textarea>
                <div class="error_message"><label style="color:red; margin-bottom:5px;" id="error_address"></label></div>
            </div>

            <div style="clear: both;">
                <input type="button" class="btnsignup" id="btnupdate" name="btnupdate" value="Update"></input>
            </div>
        </form>
    </div>
</div> -->
<!-- <script>
    //  CKEDITOR.replace("address");
</script> -->