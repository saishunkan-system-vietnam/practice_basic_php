<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="https://www.w3schools.com/tags/demo_icon.gif" type="image/gif" sizes="16x16">
    <title>Demo</title>
    <link rel="stylesheet" href="./style.css?<?echo time()?>">
</head>

<body>
    <? $isLogin = false?>
    <? include('./menu.php');?>
    <br>
    <? require('./query.php');?>
    <br>
    <style>
    input {
        color: green;
    }
    </style>
    <div id="Main">
        <?
        $arrColum = [
            'row1' => 'username',
            'row2' => 'pass',
            'row4' => 'gender',
            'row5' => 'name',
            'row6' => 'birthdate',
            'row7' => 'phone',
            'row8' => 'email',
            'row9' => 'question',
            'row10' => 'answer',
        ];
            if(!empty($_POST['row1'])){  
                $username = $_POST['row1'];
                $query = "Select count(*) as result from t_account where username = '{$username}'";
                $ischeck = Quyery($query, 'checkExist');
                if($ischeck != '0')
                {            
                    echo "<script type='text/javascript'>alert('Tài khoản này đã được đăng ký, vui lòng kiểm tra lại');setTimeout(function(){ SetWhenExistAccount(); }, 100);</script>";
                    $_POST = [];
                }
                else
                {
                    $query = "Insert into t_account (";
                    $insertStr = '';
                    $valueStr = '';
                    for ($i = 1 ; $i< 11; $i++)
                    {
                        if($i == 3)
                        continue;
                        if(!empty($_POST['row'.$i]))
                        {
                            if($insertStr == ''){
                                $insertStr.= $arrColum['row'.$i];
                                $valueStr.=  "'".$_POST['row'. $i]."'";
                            }else{
                                $insertStr.= ','.$arrColum['row'.$i];
                                $valueStr.=  ",'".$_POST['row'. $i]."'";
                            }
                        }
                    }                  
                    $query.= $insertStr . ") values (".$valueStr.")";
                    $resultInsert = Quyery($query, 'insert');
                    if($resultInsert){
                        $_POST = [];
                    }
                    echo "<script type='text/javascript'>" .( $resultInsert ? 
                     "alert('Đăng ký thành công');" 
                     :  "alert('Error');setTimeout(function(){ SetWhenExistAccount(); }, 100);") 
                     . '</script>';
                }   
            }
        ?>
        <form action="" method="POST" name="formRegist" id="formRegist">
            <table border="0" cellpadding="5">
                <caption>
                    <H3 style="color: blue;">ĐĂNG KÝ TÀI KHOẢN</H3>
                </caption>
                <span class="batbuoc">
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td><input type="text" name="row1" id="txtUser" onchange="validateObject(this)"
                                onkeypress="clearErrColor(this)">
                        </td>

                        <td>
                            <label class="custom-file-upload">
                                <input type="file" name="choseAvatar" accept=".jpg,.png" onChange="preview(this)" />
                                Chọn Avatar
                            </label>

                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td><input type="password" name="row2" id="txtPass" onchange="validateObject(this)"
                                onkeypress="clearErrColor(this)"></td>
                        <td rowspan="3">
                            <img id="imgAvatar" style="height: 100px;width: 100px;">
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Xác nhận mật khẩu</td>
                        <td><input type="password" name="row3" id="txtPassConfrm" onchange="validateObject(this)"
                                onkeypress="clearErrColor(this)"></td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <input type="radio" value="1" name="row4" id="radiMale" checked>
                            <label for="redioMale">Nam</label>
                            <input type="radio" value="0" name="row4" id="radiFemale">
                            <label for="readioFemmale">Nữ</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Tên hiển thị</td>
                        <td><input type="text" name="row5" id="txtName" onchange="validateObject(this)"
                                onkeypress="clearErrColor(this)">
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày Sinh</td>
                        <td><input type="date" name="row6" id="dateBirthdate" onchange="validateObject(this)"
                                onkeypress="clearErrColor(this)"></td>
                        <td rowspan="8"></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><input type="number" name="row7" id="txtPhone" onchange="validateObject(this)"
                                onkeypress="clearErrColor(this)"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="row8" id="txtEmail" onchange="validateObject(this)"
                                onkeypress="clearErrColor(this)"></td>
                    </tr>
                    <tr>
                        <td>Câu hỏi bí mật</td>
                        <td><select name="row9" id="cbQuest">
                                <option value="Con vật mà bạn yêu thích nhất?">Con vật mà bạn yêu thích nhất?</option>
                                <option value="Ngôi trường đầu tiên bạn đi học tên gì?">Ngôi trường đầu tiên bạn đi học tên gì?</option>
                                <option value="Tên thường gọi ở nhà của bạn là gì?">Tên thường gọi ở nhà của bạn là gì?</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Trả lời</td>
                        <td rowspan="2"><textarea onchange="validateObject(this)" onkeypress="clearErrColor(this)"
                                style="color:green" name="row10" id="txtAns" cols="34" rows="3"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </span>
                <input type="hidden" name="inputHidden" id="inputHidden"
                    value='<? echo isset($_POST["row1"])?json_encode($_POST):"[]"; ?>' />
                <span class="confirm">
                    <tr>
                        <td><input type="checkbox" onchange="validateForm()" name="chkConfrm" id="chkConfrm">
                            <label for="chkConfrm" style="color:black">Xác nhận</label>
                        </td>
                    </tr>
                </span>
                <tr>
                    <td></td>
                    <td><button type="button" name="btnRegist" onclick="Regist()" disabled>Đăng ký</button></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="./javascript.js"></script>
</body>

</html>