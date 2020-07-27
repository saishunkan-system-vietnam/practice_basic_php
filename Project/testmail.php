<?php
$to = "phungnhan0935488044@gmail.com";
$subject = 'Email Test';
$mess = 'This is test';
$header  =  "From:shadowin1811@gmail.com \r\n";

$success= mail($to, $subject, $mess, $header);

if($success == true)
{
    var_dump(mail($to, $subject, $mess, $header));
    echo 'sucess';
}
else
{
    var_dump(mail($to, $subject, $mess, $header));
    echo 'fail';
}
?>