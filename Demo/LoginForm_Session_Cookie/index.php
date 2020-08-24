<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="style.css" rel="stylesheet" />
    <script src="./validate.js"></script>
    <style>
        table {
            width: 70%;
            border: #ff0000;
        }

        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        td {
            border: 0px solid #ff0000"

        }

        .row {
            width: 500px;
            border-color: coral;
            background: white;
        }

        .inputCustom {
            width: 100%;
            padding: 1px 1px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <h2>Home Page</h2>
    <div style="font-size: 25px;color:red;text-align: left;width: 50%;"><b>Register Form</b></div><br>

    <form name="mainForm" onsubmit="return Validate()" method="post">
        <div class="row">
            <div style="float:left"><label>User Name:</label></div>
            <div style="float:right"><input type="text" placeholder="Enter username" id="userName" name="userName" onkeypress="ClearError(id)" onchange="ClearError(id)"></div><br><br>
        </div>


        <div class="row">
            <div style="float:left"><label>Password:</label></div>
            <div style="float:right"><input type="password" placeholder="Enter Passwword" id="password" name="password" onkeypress="ClearError(id)" onchange="ClearError(id)"></div><br><br>
        </div>

        <div class="row">
            <div style="float:left"><label>Confirm Password:</label></div>
            <div style="float:right"><input type="password" placeholder="Enter Passwword" id="confirmPassword" name="confirmPassword" onkeypress="ClearError(id)" onchange="ClearError(id)"> </div><br><br>
        </div>

        <div class="row">
            <div style="float:left"><label>Date of Birth:</label></div>
            <div style="float:right"><input type="date" id="dob" name="dob" style="text-align:left;width:172px;" value="<?php echo date("Y-m-d"); ?>"></div>
        </div><br><br>
        </div>

        <div class="row">
            <div style="float:left"><label>Identification Card</label></div>
            <div style="float:right"><input type="number" placeholder="Enter ID" id="id" name="id" min="0" max="10000000000" style="text-align:left;width:169px;" onkeypress="ClearError(id)" onchange="ClearError(id)"></div><br><br>
        </div>

        <div class="row">
            <div style="float:left"><label>Gender:</label></div>
            <div style="float:right;width: 35%;"><input type="radio" id="male" name="radioGender" value="Male" checked>
                <label for="Male">Male</label><br>
            </div>

            <div style="clear:both">
                <div style="float:right;width: 35%;"><input type="radio" id="female" name="radioGender" value="Female">
                    <label for="Female">Female</label><br>
                </div>
            </div>

            <div style="clear:both">
                <div style="float:right;width: 35%;"><input type="radio" id="other" name="radioGender" value="Other">
                    <label for="Other">Other</label><br>
                </div>
            </div>

        </div>

        <div style="clear: both;">

            <div>
                <lable>Address:</lable>
                <table cellspacing='0'>
                    <tr>
                        <th>Country:</th>
                        <th><input class="inputCustom" type="text" placeholder="Enter dountry" id="country" name="country" size=100% onkeypress="ClearError(id)" onchange="ClearError(id)"></th>
                    </tr>
                    <tr>
                        <th>District:</th>
                        <th><input class="inputCustom" type="text" placeholder="Enter District" id="district" name="district" size=100% onkeypress="ClearError(id)" onchange="ClearError(id)"></th>
                    </tr>
                    <tr>
                        <th>City/Town:</th>
                        <th><input class="inputCustom" type="text" placeholder="Enter City/Town" widghth id="cityTown" name="cityTown" size=100% onkeypress="ClearError(id)" onchange="ClearError(id)"></th>
                    </tr>
                    <th>Street:</th>
                    <th><input class="inputCustom" type="text" placeholder="Enter Street" id="street" name="street" size=100% onkeypress="ClearError(id)" onchange="ClearError(id)"></th>
                    </tr>
                </table><br>
            </div>

            <div>
                <label>Image:</label>
                <input type="file" id="path" accept="image/*" name="path"><br><br>
            </div>

            <div>
                <label>Hobbies:</label><br><br>
                <textarea id="hobbies" name="hobbies" rows=4 cols="70" onkeypress="ClearError(id)" onchange="ClearError(id)">
                </textarea><br><br>
            </div>

            <div>
                <input type="checkbox" id="confirm" name="confirm" value="confirm">
                <lable for="Confirm">
                    <span style="color:blue;font-weight:bold">I agree</span> to
                    <span style="color:Red;font-weight:bold">the terms</span> of service<br><br>
                </lable>
            </div>

            <div>
                <button class="button-style" type="submit" name="Signin" id="Signin" value="Sign in">Sign in</button><br><br>
                <input style="margin: 10px;background: whitesmoke;border-color:whitesmoke;" class="button-style2" type="button" value="Back to Login" onClick="document.location.href='./Login.php'" />
            </div>
            <div>
                <label style="color:red;" id="errorMessage"></label>
            </div>
        </div>

        </div>
    </form>
    <?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'minhdb';
    $dob = null;
    $idCard = null;
    $gender = null;
    $country = null;
    $district = null;
    $cityTown = null;
    $street = null;
    $hobbies = null;
    $path = null;

    $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

    if ($connect->connect_error) {
        die("Connect fail: " . $conn->connect_error);
        exit();
    }

    if (isset($_POST['Signin'])) {
        $userName = $_POST['userName'];
        $passWord = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $dob = $_POST['dob'];
        $idCard = $_POST['id'];
        $gender = $_POST['radioGender'];
        $country = $_POST['country'];
        $district = $_POST['district'];
        $cityTown = $_POST['cityTown'];
        $street = $_POST['street'];
        $hobbies = $_POST['hobbies'];
        $path = $_POST['path'];

        // echo $userName . " " . $passWord . " " . $confirmPassword . " " . $dob . " " . $idCard . " " . $gender . " " . $country . " " . $district . " " . $cityTown . " " . $street . " " . $hobbies . " " . $path . "<br>" . "<br>";

        $sqlSelectUser = "SELECT userName FROM userdata where userName='$userName' and DelFlag=0";
        $result = $connect->query($sqlSelectUser);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "The userName: " . $row["userName"] . " is exist" . "<br>";
            }
        } else {
            echo "This user is not exist!";
            $sqlInsert = "INSERT INTO `userdata` (`UserName`, `Password`, `DOB`, `IDCard`, `Gender`, `Country`, `District`, `CityTown`, `Street`, `ImagePath`, `Hobbies`) 
                VALUES ('$userName', '$passWord', '$dob', '$idCard', '$gender', '$country', '$district', '$cityTown', '$street', '$path', '$hobbies')";

            if (mysqli_query($connect, $sqlInsert)) {
                echo "Insert record successfully";
            } else {
                echo "Error: " . $sqlInsert . "<br>" . mysqli_error($connect);
            }
        }

        mysqli_close($connect);
    }
    ?>
</body>

</html>