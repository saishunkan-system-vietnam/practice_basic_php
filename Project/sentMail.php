<?php 
    session_start();
    require './config/router.php';
    require FILE_PHP_CONFIG;

    require 'PHPMailer/PHPMailerAutoload.php';


    if (isset($_POST['email'])) {
        $uniqidStr = substr(md5(uniqid(rand(),1)),3,8);
        $_SESSION['uniqidStr'] = $uniqidStr;

        $nFrom = "ngotasinh.net";   
        $mFrom = 'ngotasinh@gmail.com';  
        $mPass = 'uoijckptvmbgltwm';       
        $nTo = 'Huudepzai'; 
        $mTo = $_POST['email'];  

        $resetPassLink = 'http://sinh.com/changePassword.php?email='.$_POST['email'];

        $mail             = new PHPMailer();
        $body             = 'Dear '.$_POST['email'].', 
                            <br/>Gần đây, một yêu cầu đã được gửi để thiết lập lại mật khẩu cho tài khoản của bạn. Nếu đây là một sai lầm, chỉ cần bỏ qua email này và sẽ không có gì xảy ra.
                            <br/>Để đặt lại mật khẩu của bạn, hãy truy cập liên kết sau: <a href="'.$resetPassLink.'">click vào đây</a>
                            <br/><br/>Trân trọng,
                            <br/>Ngô Tá Sinh';
        $title = 'Quên mật khẩu';  
        $mail->IsSMTP();             
        $mail->CharSet  = "utf-8";
        $mail->SMTPDebug  = 0;   
        $mail->SMTPAuth   = true;    
        $mail->SMTPSecure = "ssl";   
        $mail->Host       = "smtp.gmail.com";    
        $mail->Port       = 465; 

        // xong phan cau hinh bat dau phan gui mail
        $mail->Username   = $mFrom;  
        $mail->Password   = $mPass;             
        $mail->SetFrom($mFrom, $nFrom);
        $mail->AddReplyTo('ngotasinh@gmail.com', 'ngotasinh.net'); 
        $mail->Subject    = $title;
        $mail->MsgHTML($body);
        $mail->AddAddress($mTo, $nTo);

        // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo 'Có lỗi!';
         
    } else {
         
        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
    }

     }

?>