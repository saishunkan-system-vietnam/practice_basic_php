<?php
$varEmpty1 = 0;
$varEmpty2 = null;
$varEmpty3 = 1;
$varEmpty4;
$varIsSet1 = 0;
$varIsSet2 = null;
$varIsSet3;
$varInt = 2;
$varfloat = 1.23;
$varBool = true;

// CHECK
echo "CHECK<br>";
if (empty($varEmpty4)) 
{
    echo 'Biến $varEmpty4 empty .<br>';
}

if (empty($varEmpty1)) 
{
    echo "$varEmpty1 empty.<br>";
}
  
if (empty($varEmpty2)) 
{
    echo "$varEmpty2 empty.<br>";
}

if (empty($varEmpty3)) 
{
    echo "$varEmpty3 empty.<br>";
}
else
{
    echo "$varEmpty3 không empty.<br>";
}

if(is_null($varEmpty1))
{
    echo "varEmpty1 null.<br>";
}

if(is_null($varEmpty3))
{
    echo "varEmpty3 null.<br>";
}

if (isset($varIsSet1)) 
{
    echo "$varIsSet1 đã set.<br>";
}
else
{
    echo "$varIsSet1 chưa set.<br>";
}

if (isset($varIsSet2)) 
{
    echo "$varIsSet2 đã set.<br>";
}
else
{
    echo "$varIsSet2 chưa set.<br>";
}

if (isset($varIsSet3)) 
{
    echo '$varIsSet3 đã set .<br>';
}
else
{
    echo '$varIsSet3 chưa set .<br>';
}

if (is_int($varInt))
{
    echo "$varInt kiểu int.<br>";
}

if (is_int($varfloat))
{
    echo "$varfloat kiểu float.<br>";
}

if (is_bool($varBool))
{
    echo "$varBool kiểu bool.<br>";
}
echo "-------------<br>";

// Condition
echo 'CONDITION<br>';
$x = 100;  
$y = "100";

if($x == $y)  echo "x có cùng giá trị với y.<br>";
if($x === $y) 
{
    echo "x và y, cùng giá trị cùng kiểu.<br>";
}
else
{
    echo '$x === $y return false.<br>';
}
echo "-------------<br>";

// CONST, DEFINE
echo 'CONST, DEFINE<br>';
define("PI", 3.14);
echo PI."<br>";
const TWO = 2;
echo "const TWO =".TWO."<br>";

// Define khai báo được trong khi xử lí điều kiện còn const thì ko
if (true)
{
    define("MinhNN", "VNHU1008");
    echo "MinhNN có giá trị ".MinhNN."<br>";
}

// const tạo được trong class còn define thì ko
class abc
{
    const SIX = 6; 
}
echo "-------------<br>";

// REGEX
echo 'REGEX<br>';
$str = "This is a test";
$pattern = "/is/i";
echo "Pattern $pattern return ".preg_match($pattern, $str)."<br>"; // preg_match() return 1 nếu tìm thấy pattern

$pattern2 = "/s/i";
echo "Pattern $pattern2 return ".preg_match_all($pattern2, $str)."<br>"; ; // preg_match_all()  return soos matches tìm được ứng với pattern2

$pattern3 = "/test/i";
echo "Pattern $pattern3 return ".preg_replace($pattern3, "Demo", $str)."<br>"; ; // preg_replace() replace string

$pattern4 = "/(es)/i";
$match = null;
echo "Pattern $pattern4 return ".preg_match($pattern4, $str, $match)."<br>";
echo "Chuỗi match là ";
print_r($match);
echo "<br>";
echo "-------------<br>";

// ARRAY
echo 'ARRAY<br>';

// Tạo mảng, hiển thị data
$myArray = array("This", "is", "a", "test");
echo $myArray[0] . " " . $myArray[1] . " " . $myArray[2] . " ".$myArray[3]."<br>";

// Count số phần tử
if (0 < count($myArray))
{
echo "Số phần tử của mảng là ".count($myArray)."<br>";
}

//Associative Array
$num = array("ONE"=>"1", "TWO"=>"2");

echo "Tìm kiếm phần tử có giá trị là 2, Key là: ".array_search('2', $num)."<br>";

// Loop hiển thị các giá trị
foreach($num as $x => $x_value) {
  echo $x . " = " . $x_value;
  echo "<br>";
}

// Get một phần tử của mảng
echo "ONE có giá trị ".$num['ONE']."<br>";
echo "Biến varTwo có giá trị là ".$varTwo = $num['TWO']."<br>";

// Tạo fucntion so sánh các số  với 10, return true nếu $var < 10, return false nếu $var>=10
function CompareToTen($var)
  {
  if ($var < 10)
  {
      return true;
  }
  else
  {
    return false;
  }
  }

// Tạo array, lọc các phần tử
$arrayTest = array(5,12,1,32,4);
print_r(array_filter($arrayTest,"CompareToTen"));

echo "<br>-------------<br>";

// PHP String Functions
echo 'PHP String Functions<br>';

// Nối chuỗi
echo "This "."is "."a "."Test "."<br>";

echo "Tách chuỗi :";
// Split chuỗi thàng từng kí tự 
print_r(str_split("MinhNN", 1)); 
echo "<br>";

// Xóa kí tự cuối cùng của chuỗi
echo chop("PHP programming language", "language")."<br>";

// Count số kí tự
echo "Số kí tự cuả chuỗi MinhNN là ".strlen("MinhNN")."<br>";

// Relace chuỗi
echo "Thay thế 123 thành 456 trong chuỗi gốc MinhNN 123: ".str_replace("123","456","MinhNN 123")."<br>";

// Get chuỗi từ một vị trí vs số kí tự chỉ định
// Get chuỗi world
echo "Chuỗi lấy được là : ".substr("Hello world", 6) . "<br>";

// Get chuỗi PHP
echo "Chuỗi lấy được là : ".substr("PHP programming language", 0, 3) . "<br>";

// Trim các khoảng trắng ở đầu và cuối của chuỗi
echo "Trim các khoảng tắng ở đàu và cuối của chuỗi \" PHP programming language \": "."\"".trim(" PHP programming language ")."\"". "<br>";

echo "-------------<br>";

// LOOP
echo "LOOP<br>";

// for
echo "for loop<br>";
for ($i = 0; $i < 5; $i++)
{
    if ($i == 3)
    {
    break;
    }
    else if ($i == 2)
    {
        continue;
    }
    echo $i ."<br>";
}

echo "while loop<br>";
// While
$dem = 1; 
while ( $dem <= 5) {
    $dem++;
    echo "$dem <br>";
}

// do while loop
echo "do while loop<br>";
$dem2 = 2; 
do {
    $dem2++;
    echo "$dem2 <br>";
} while ( $dem2 <= 4 );

// for each
echo "for each<br>";
$language = array(
    'PHP', 'CSS', 'HTML', 'JS'
);
 
foreach( $language as $lang ) {
    echo "$lang <br>";
}

// Switch case
echo "Switch case <br>";
$colorBlue = "blue";
echo "blue là màu: ";
switch ($colorBlue) {
  case "red":
    echo "Mùa đỏ<br>";
    break;
  case "blue":
    echo "Màu xanh<br>";
    break;
  case "green":
    echo "Màu xanh là<br>";
    break;
  default:
    echo "Một màu gì đó";
}

// IF ELSE
echo "IF ELSE<br>";
echo 'xét $colorBlue == "blue" --> ';
if ($colorBlue == "blue")
{
    echo "Màu xanh<br>";
}
else
{
    echo "Một màu gì đó<br>";
}
echo "-------------<br>";

// CLASS
echo "CLASS<br>";
class Fruit {
    public $name;
    public $color;
  
    // Method
    function set_name($name) 
    {
      $this->name = $name;
    }
    function get_name() {
      return $this->name;
    }
  }

  $apple = new Fruit();
  $apple -> set_name('Apple');
  echo 'Name của $apple là '.$apple -> get_name();
  echo "<br>";
  echo "-------------<br>";

  // sử dụng  require ,require_once , include , include_once
  echo "sử dụng  require ,require_once , include , include_once<br>";
  
  // import một file PHP khác vào file hiện tại
  echo 'require<br>';
  require "minhnn.php";
  echo "My user code is $userCode<br>";

  // Nếu sử dụng require nhiều lần thì PHP vẫn thực thi
  echo 'Khai báo reuire "minhnn.com" nhiều lần --> result: <br>';
  echo "---<br>";
  require "minhnn.php";
  require "minhnn.php";
  echo "---<br>";

  // Nếu dùng require thì khi tập tin nhập vào không tồn tại --> thông báo lỗi
  echo 'Lỗi khi sử dụng require để import vào một file không tồn tại<br>';
  // require "abc.php";

  echo 'require_once<br>';

// lệnh require_once chỉ import đúng một lần
   require_once "minhnn.php";

// Tương tự require, nếu import file ko tồn tại sẽ có cảnh báo 
echo 'include<br>';
include "minhnn.php";

echo 'include lỗi';
//include "abc.php";
echo '<br>';

//  include_once
echo ' include_once<br> ';
include_once "minhnn.php";
?>