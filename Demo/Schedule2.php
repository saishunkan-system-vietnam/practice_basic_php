<?php
$checkNull = NULL;
$checkEmty = "";

// Hàm is_NULL
echo "1. Hàm is_NULL </br>";
echo "&emsp;Check isNull: "; 
var_dump(is_null($checkNull));
echo "</br></br>";

// Hàm empty
echo "2. Hàm empty </br>";
echo "&emsp;2.1 Check Empty có giá trị '': ";
var_dump(empty($checkEmty));
echo "</br>";
echo "&emsp;2.2 Check Empty có giá trị NULL: ";
var_dump(empty($checkNull));
echo "</br></br>";

// Hàm Isset: True nếu có tồn tại biến và có bất kỳ giá trị nào ngoài NULL. Ngược lại false
echo "3. Hàm Isset </br>";
echo "&emsp;3.1 Test Isset biến không tồn tại: ";
var_dump(isset($check));
echo "</br>";
echo "&emsp;3.2 Test Isset biến tồn tại và có giá trị '': ";
var_dump(isset($checkEmty));
echo "</br>";
echo "&emsp;3.3 Test Isset biến tồn tại và có giá trị NULL: ";
var_dump(isset($checkNull));
echo "</br></br>";

// Check kiểu dữ liệu: is_array, is_bool, is_string, is_numeric, is_int hoặc is_integer,is_float, is_double, 

// Hàm is_array
echo "4. Hàm is_array </br>";
$checkArray = array('N','H','A','N');
if (is_array($checkArray))
{
    echo '&emsp;This is an array: ';

    foreach($checkArray as $value)
    {
        echo "'$value' ";
    }
}
else
echo 'This is not an array....';

echo "</br></br>";

// Hàm is_bool
echo "5. Hàm is_bool </br>";
if(is_bool($checkNull))
{
    echo "&emsp;This is a boolean ";
}
else
echo "&emsp;This is not a boolean";
echo "</br></br>";

// Hàm is_string
echo "6. Hàm is_string </br>";
if(is_string($checkEmty))
{
    echo "&emsp;This is a string ";
}
else
echo "This is not a boolean";
echo "</br></br>";
// các hàm kiểm tra còn lại tương tự

// Sử dụng dấu =, ==, ===
echo "7. Sử dụng dấu =, ==, === </br>";
$A = 1;
$B = "1";
echo "&emsp;Giá trị ".$A." kiểu int </br>";
echo "&emsp;Giá trị ".$B." kiểu string </br>";
echo "</br>";

echo "&emsp;So sánh ==: ";

if($A == $B)
{
    echo "A==B </br>";
}
else
{
    echo "A không bằng B </br>";
}

echo "&emsp;So sánh ===: ";
if ($A === $B)
{
    echo "A===B";
}
else
{
    echo "A không bằng B";
}
echo '</br></br>';


// Define và const
echo '8. Define và const';
// Định nghĩa hằng số
define("name", "NhanVP");
echo '</br>';
// Giá trị hằng số
echo "&emsp;Cách lấy giá trị hằng số </br>";
echo "&emsp;Cách 1: Sử dụng Constant:  ";
echo constant("name");
echo "</br>";
echo "&emsp;Cách 2: Lấy hằng số bằng cách chỉ ra tên: ";
echo name;
echo "</br></br>";


// Chuỗi regex cơ bản
echo "9. Chuỗi regex cơ bản </br>";
// Hàm preg_match: hàm kiểm tra dữ liệu đầu vào và chuỗi regex có pass không và trả về kết quả (true, false)
echo "&emsp;9.1 Hàm preg_match </br>";
$regex = "/tôi code/";
$strTest = "tôi code PHP";

echo "- Chuỗi regex: ".$regex."</br>";
echo "- Chuỗi đầu vào: ".$strTest."</br>";

// So sánh 2 chuỗi
echo "Kết quả so sánh 2 chuỗi: ";
if(preg_match($regex, $strTest))
{
    echo "Chuỗi Match"; 
    echo "</br>";
}
else
{
    echo "Chuỗi không Match"; 
}

echo "</br>";

echo "&emsp;9.2 Các khuôn mẫu regex </br>";

$regex = "/^[a-z]$/";
$strTest = "s";
echo "- Chuỗi regex: ".$regex."</br>";
echo "- Chuỗi đầu vào: ".$strTest."</br>";

// So sánh 2 chuỗi
echo "Kết quả so sánh 2 chuỗi: ";
if(preg_match($regex, $strTest))
{
    echo "Chuỗi Match "; 
    echo "</br>";
    
}
else
{
    echo "Chuỗi không Match"; 
}

echo "</br>";

echo "&emsp;9.3 So sánh chuỗi và độ dài chuỗi </br>";
$regex = "/^[a-z]{3,5}$/";
//$regex = "/[^a-z0-9A-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u";
$strTest = "Võ Phụng Nhân";
echo "- Chuỗi regex: ".$regex."</br>";
echo "- Chuỗi đầu vào: ".$strTest."</br>";

// So sánh 2 chuỗi
echo "Kết quả so sánh 2 chuỗi: ";
if(preg_match($regex, $strTest))
{
    echo "Chuỗi Match"; 
    echo "</br>";
}
else
{
    echo "Chuỗi không Match"; 
    echo "</br>";
    
}
echo "</br>";

// Hàm preg_match_all: Trả về số kết quả tìm thấy trong chuỗi
echo "&emsp;9.4 Hàm preg_match_all </br>";

$strTest = "Visit systemVN";
$regex = "/s/i";
echo "- Chuỗi regex: ".$regex."</br>";
echo "- Chuỗi đầu vào: ".$strTest."</br>";

echo "Kết quả: ";
echo preg_match_all($regex, $strTest); 
echo "</br>";
echo "</br>";

// Hàm preg_replace: Tìm kiếm và thay thế
echo "&emsp;9.5 Hàm preg_replace </br>";

$strTest = "Visit SyStemVN";
$regex = "/S/";
echo "- Chuỗi regex: ".$regex."</br>";
echo "- Chuỗi đầu vào: ".$strTest."</br>";

echo "Kết quả: ";
echo preg_replace($regex,"s",$strTest); 
echo "</br>";
echo "</br>";

// Array
echo "10. Array </br>";

$name = array("Pikachu", "Mew", "Trecko");
$nameSearch = "Mew";
echo "Mảng đầu vào: ";
var_dump($name);
echo "</br>";
echo "&emsp;10.1 Hàm array_search </br>";

echo "Kết quả tìm kiếm: ";
echo array_search($nameSearch,$name);
echo "</br>";
echo "</br>";

echo "&emsp;10.2 Hàm count </br>";

echo "Độ dài mảng: ";
echo count($name);
echo "</br>";

// Sử dụng include, require
include "demo.php";
require "demo.php";


?>
