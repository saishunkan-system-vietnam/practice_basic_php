<?php 
require('./config/router.php');
require(SITE_CONFIG);
if(isset($_POST["inpUser"]))
{
        //trim and lowercase username
    $username =  strtolower(trim($_POST["inpUser"]));
  
    //check username in db
    $results = mysqli_query($connect,"SELECT UserName FROM taikhoan WHERE Del_Flg=0 and UserName = '$username'");

    //return total count
    $username_exist = mysqli_num_rows($results); //total records
  
    //if value is more than 0, username is not available
    if($username_exist) {
        echo "UserName đã tồn tại";
    }
    //close db connection
    mysqli_close($connect);
}
?>