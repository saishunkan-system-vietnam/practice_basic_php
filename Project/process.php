<?php
    if (isset($_POST["save"])) {
        $name = $_POST['uname'];

        if (isset($_POST["sex"])) {
            $sex = $_POST["sex"];
        }

        $bDay = $_POST['bday'];
        $skill = $_POST['skill'];
        $mail = $_POST['mail'];
        $address = $_POST['address'];
        $file = $_POST['file'];

        include 'connect.php';
        $sql = "INSERT INTO employee (name, sex, bDay, skill, mail, address) VALUES ('$name',$sex,'$bDay',$skill,'$mail','$address')"; 
        
        $mysqli->query($sql) or die ($mysqli->error);

        // Đóng kết nối
        $mysqli -> close();

        header("location: index.php");
    }
?>