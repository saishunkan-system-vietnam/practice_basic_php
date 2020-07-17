<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=text],
        input[type=password] {
            width: 80%;
            /* padding: 12px 20px; */
            /* margin: 0 auto; */
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type=submit],
        input[type=button] {
            background-color: #4CAF50;
            color: white;
            padding: 6px 6px;
            /* margin: 8px 0; */
            /* cursor: pointer; */
            width: 100px;
            /* text-align: center;  
            margin: auto;           */
        }
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <form class="container" name="LogIn" onsubmit="return LogIn()" method="post">
        <h2 style="padding: 110px; "></h2>
        <table style="margin: auto;width: 400px;" cellpadding='10'>
            <tr>
                <td colspan="2" align="center">
                    <h1>LOG IN</h1>
                </td>
            </tr>
            <tr>
                <td>
                    User Name :
                </td>
                <td>
                    <input type='text' name='userName' id='userName' />
                </td>
            </tr>
            <tr>
                <td>
                    Password :
                </td>
                <td>
                    <input type='password' name='password' id='password' />
                </td>
            </tr>
            <tr>
                <td>
                <input type="checkbox" id="remember" name="remember" Value="remember">
                <label for="remember">Remember me</label><br>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <input type='button' id="SignIn" onClick="document.location.href='./index.php'" value='Sign in' />
                </td>
                <td align="right" style=" padding-right:56px;">
                    <input type='submit' id="Login" name="Login" value='Log in' />
                </td>
            </tr>
            <tr>
                <td class="error"><label id="error"></label></td>
            </tr>
        </table>
    </form>
    <?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'minhdb';

    // SESSION
    if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
        header("location: DisplayData.php");
    }

    if (isset($_COOKIE['userCookie']) && isset($_COOKIE['passCookie'])) {
        echo "User ".$_COOKIE['userCookie']." ".$_COOKIE['passCookie'];
           }
    else
    {
        echo "chưa có côkie";
    }
    
    if (isset($_POST['Login'])) {
        if (empty($_POST['userName'])) {
            echo "<script>document.getElementById('error').innerHTML = 'Please Enter User Name!'</script>";
            return false;
        }

        if (empty($_POST['password'])) {
            echo "<script>document.getElementById('error').innerHTML = 'Please Enter Password!'</script>";          
            return false;
        }

        $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

        if ($connect->connect_error) {
            die("Connect fail :" . $conn->connect_error);
            exit();
        }

        $userNameSql = $_POST['userName'];
        $passwordSql = $_POST['password'];
        $sqlSelectUser = "SELECT * FROM userdata where UserName='$userNameSql' and Password='$passwordSql' and DelFlag=0";
        $result = $connect->query($sqlSelectUser);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "The userName: " . $row["UserName"] . $row["Password"] . " is exist" . ". Login successfully!" . "<br>";

                $_SESSION['user'] = $_POST['userName'];
                $_SESSION['pass'] = $_POST['password'];

                if($_POST['remember'])    
                {
                    setcookie('userCookie',$_POST['userName'],time() + 180 ); // 86400 = 1day
                    setcookie('passCookie',$_POST['password'],time() + 180 );
                }

                header("location: DisplayData.php");
            }
        } else {
            echo "Username or password is incorrect. Please try again";
        }

        mysqli_close($connect);
    }

    ?>
</body>
<script>

</script>

</html>