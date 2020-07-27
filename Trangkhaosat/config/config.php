<?
define('COOKIE_NAME','lieu');

function ConnectDB()
{
  $conn = new mysqli('localhost', 'root','', 'survey');

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
            parse_str($_COOKIE[COOKIE_NAME]);

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
            parse_str($_COOKIE[COOKIE_NAME]);

            $result = $pass;
    }
    return $result;
}
?>