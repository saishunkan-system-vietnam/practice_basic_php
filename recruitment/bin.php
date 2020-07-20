<?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'recruitment';

    // SESSION
    if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
        header("location: home.php");
    }

    if (isset($_COOKIE['userCookie']) && isset($_COOKIE['passCookie'])) {
        echo "User " . $_COOKIE['userCookie'] . " " . $_COOKIE['passCookie'];
    } else {
        echo "chưa set cookies";
    }

    if (isset($_POST['Login'])) {
        $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

        if ($connect->connect_error) {
            die("Connect fail: " . $conn->connect_error);
            exit();
        }

        $userNameSql = $_POST['email'];
        $passwordSql = $_POST['password'];
        $sqlSelectUser = "SELECT * FROM usertbl where email='$userNameSql' and password='$passwordSql' and del_flag=0";
        $result = $connect->query($sqlSelectUser);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "The userName: " . $row["UserName"] . $row["Password"] . " is exist" . ". Login successfully!" . "<br>";

                $_SESSION['user'] = $_POST['email'];
                $_SESSION['pass'] = $_POST['password'];

                if ($_POST['remember']) {
                    setcookie('userCookie', $_POST['email'], time() + 180); // 86400 = 1day
                    setcookie('passCookie', $_POST['password'], time() + 180);
                }

                header("location: home.php");
            }
        } else {
            echo "Username or password is incorrect. Please try again";
        }

        mysqli_close($connect);
    }

    ?>


<script type="text/javascript">
    $(document).ready(function() {
        $("#Login").on("click", function() {
            var email = $("#email").val();
            var password = $("#password").val();
            var error = $("#error");

            if (email == "") {
                document.getElementById("email").style.background = "red";
                document.getElementById("errorMessage").innerHTML = "Please Enter Email";
                return false;
            }

            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                return (true)
            } else {
                alert("Email không hợp lệ!")
                return (false)
            }

            if (password == "") {
                document.getElementById("password").style.background = "red";
                document.getElementById("errorMessage").innerHTML = "Please Enter Password";
                return false;
            }

            $.ajax({
                url: "checkLogin.php",
                method: "POST",
                data: {
                    email: email,
                    password: password
                },
                success: function(response) {
                    // if (response == "1") {
                    //     ok.html("Đăng nhập thành công");
                    // } else {
                    //     error.html("Tên đăng nhập hoặc mật khẩu không chính xác !");
                    // }
                    alert(response);
                }
            });

        });
    });
</script>