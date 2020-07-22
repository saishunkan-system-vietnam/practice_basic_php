<?
// Khai Báo hằng

define('COOKIE_NAME','lieu');



function ConnectDB()
{
    // Tạo đối tượng mysqli
    $conn = new mysqli('localhost', 'root','', 'survey');
   // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

function DisconnectDB($conn)
{
    mysqli_close($conn);
}
 
function GetCookieUid()
{
  $result = "";
  
    if(isset($_COOKIE[COOKIE_NAME]))
    { 
            //======
            parse_str($_COOKIE['lieu']);

            $result = $uid;
    }
    return $result;
}

function GetCookiePass()
{
  $result = "";
  
    if(isset($_COOKIE[COOKIE_NAME]))
    { 
            //======
            parse_str($_COOKIE['lieu']);

            $result = $pass;
    }
    return $result;
}


?>