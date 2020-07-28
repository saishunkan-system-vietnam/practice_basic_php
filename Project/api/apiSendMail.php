<?php
session_start();
require('../config/router.php');
require(SITE_API_CONFIG);
$to =  trim($_POST['mail']);
$subject = 'Link đổi mật khẩu';

$message = "
<html>
<body>
<h2>Chào bạn,</h2>
        <p>Chúng tôi nhận được một yêu cầu của bạn về việc thay đổi mật khẩu.</p>
        <p>Để thay đổi mật khẩu bạn hãy nhấp vào link sau <a href='http://https://alantien.com/'>đây</a></p>
</body>
</html>
";

$header ="From: shadowin1811@gmail.com \r\n";

$success= mail($to, $subject, $message, $header);

$sql_select_mail = "SELECT * FROM taikhoan WHERE Email = '$to' AND Admin_Flg = 0";
$result_select_mail = mysqli_query($connect, $sql_select_mail);

if(!mysqli_num_rows($result_select_mail))
{
    echo false;
}
else
{
    if($success){
        echo true;
    }
    else{
        echo false;
    }
}
// else
