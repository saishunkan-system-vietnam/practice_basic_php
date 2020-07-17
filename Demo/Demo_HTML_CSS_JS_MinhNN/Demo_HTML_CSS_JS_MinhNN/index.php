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

        /* .row #userNameErr {
            display: none;
        } */
    </style>
</head>

<body>
    <h2>Home Page</h2>
    <div style="font-size: 25px;color:red;text-align: left;width: 50%;"><b>Register Form</b></div><br>

    <form name="mainForm">
        <div class="row">
            <div style="float:left"><label>User Name:</label></div>
            <div style="float:right"><input type="text" placeholder="Enter username" id="userName" name="userName"></div><br><br>
        </div>


        <div class="row">
            <div style="float:left"><label>Password:</label></div>
            <div style="float:right"><input type="password" placeholder="Enter Passwword" id="password" name="password"></div><br><br>
        </div>

        <div class="row">
            <div style="float:left"><label>Confirm Password:</label></div>
            <div style="float:right"><input type="password" placeholder="Enter Passwword" id="confirmPassword" name="password"></div><br><br>
        </div>

        <div class="row">
            <div style="float:left"><label>Date of Birth:</label></div>
            <div style="float:right"><input type="date" id="dob" name="dob" style="text-align:left;width:172px;" value="<?php echo date("Y-m-d"); ?>"></div>
        </div><br><br>
        </div>

        <div class="row">
            <div style="float:left"><label>Identification Card</label></div>
            <div style="float:right"><input type="number" placeholder="Enter ID" id="id" name="id" min="0" max="10000000000" style="text-align:left;width:169px;"></div><br><br>
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
                <table>
                    <tr>
                        <th>Country:</th>
                        <th><input type="text" placeholder="Enter dountry" id="country" name="country" size=100%></th>
                    </tr>
                    <tr>
                        <th>District:</th>
                        <th><input type="text" placeholder="Enter District" id="district" name="district" size=100%></th>
                    </tr>
                    <tr>
                        <th>City/Town:</th>
                        <th><input type="text" placeholder="Enter City/Town" widghth id="cityTown" name="cityTown" size=100%></th>
                    </tr>
                    <th>Street:</th>
                    <th><input type="text" placeholder="Enter Street" id="street" name="street" size=100%></th>
                    </tr>
                </table><br>
            </div>

            <div>
                <label>Image:</label>
                <input type="file" id="chooseFile" name="chooseFile"><br><br>
            </div>

            <div>
                <label>Hobbies:</label><br><br>
                <textarea id="hobbies" name="hobbies" rows=4 cols="70">
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
                <button class="button-style" onclick="Validate()" type="submit" value="Sign in">Sign in</button><br><br>
            </div>

            <div>
                <label style="color:red;" id="errorMessage"></label>
            </div>
        </div>

        </div>
    </form>
</body>

</html>