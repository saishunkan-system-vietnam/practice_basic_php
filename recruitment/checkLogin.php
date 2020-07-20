<?php
$hostName = 'localhost';
$userName = 'root';
$passWord = '';
$databaseName = 'recruitment';

$connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

if ($connect->connect_error) {
    die("Connect fail: " . $conn->connect_error);
    exit();
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $userNameSql = $_POST['email'];
    $passwordSql = $_POST['password'];
    echo $userNameSql . " " . $userNameSql;
    $sqlSelectUser = "SELECT * FROM usertbl where email='$userNameSql' and password='$passwordSql' and del_flag=0";
    $result = $connect->query($sqlSelectUser);

    if ($query == "SELECT") {
        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {
                // $myJSON = json_encode($data,true);
                $myJSON[count($myJSON)] = $data;
            }

            header("location: home.php");
            echo json_encode($myJSON);
        } else {
            echo "err";
        }
    }

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         // $_SESSION['user'] = $_POST['email'];
    //         // $_SESSION['pass'] = $_POST['password'];

    //         // if ($_POST['remember']) {
    //         //     setcookie('userCookie', $_POST['email'], time() + 180); // 86400 = 1day
    //         //     setcookie('passCookie', $_POST['password'], time() + 180);
    //         // }

    //         header("location: home.php");
    //     }
    // } else {
    //     echo "aaUsername or password is incorrect. Please try again";
    // }
}
?>