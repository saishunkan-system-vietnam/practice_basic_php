<?php
function GenerateToken($len = 10)
{
    $str = "mncvbzxafsdgh12345ujkiolpqwertyui67890";
    $str_mixed = str_shuffle($str);
    $token = substr($str_mixed, 0, 10);
    return $token;
}
?>