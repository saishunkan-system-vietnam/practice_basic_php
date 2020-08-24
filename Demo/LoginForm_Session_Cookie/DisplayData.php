<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            background: lightgray;
            color: black;
            height: 40px;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }
    </style>
</head>

<body>
    <!-- <div style="background: lightgray;Height:30px;">
        <nav >
            <ul>
                <a href="#">Trang chủ</a>
                <a href="#">Dịch vụ</a>
                <a href="#">Giới thiệu</a>
            </ul>
        </nav>
    </div> -->

    <h2>HOME</h2>
    <?php
    $hostName = 'localhost';
    $userName = 'root';
    $passWord = '';
    $databaseName = 'minhdb';

    $connect = mysqli_connect($hostName, $userName, $passWord, $databaseName);

    if (!$connect) {
        exit('Connect fail!');
    }

    // Get total records
    $sqlCount = "SELECT count(UserName) as total FROM userdata where DelFlag=0";
    $result = $connect->query($sqlCount);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total_records = $row['total'];
        }
    }

    // Get current page, number page
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 3;

    $total_page = ceil($total_records / $limit);

    // Giới hạn số page
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    // Trang bắt đầu
    $start = ($current_page - 1) * $limit;

    $sqlSelectData = "SELECT * FROM userdata where  DelFlag=0 LIMIT $start, $limit ";
    ?>
    <div style="text-align:center;">
        <table align="center" style="width:600px;line-height:40px;" border='1'>
            <tr>
                <th colspan="6">
                    <h3> List Users</h3>
                </th>
            </tr>
            <tr>
                <th>User Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>City/Town</th>
                <th>Street</th>
                <th>Hobbies</th>
            </tr>
            <?php
            $resultData = $connect->query($sqlSelectData);
            if ($resultData->num_rows > 0) {
                while ($rowData = $resultData->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $rowData["UserName"] . "</td>";
                    echo "<td>" . $rowData["DOB"] . "</td>";
                    echo "<td>" . $rowData["Gender"] . "</td>";
                    echo "<td>" . $rowData["CityTown"] . "</td>";
                    echo "<td>" . $rowData["Street"] . "</td>";
                    echo "<td>" . $rowData["Hobbies"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <div style="padding: 15px;"></div>
    <div style="position: fixed;">
        <?php

        // Phân trang
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="DisplayData.php?page=' . ($current_page - 1) . '"><b>&#8678;</b></a> | ';
        }

        for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $current_page) {
                echo '<span style="color: #1a75ff;"><b>' . $i . '</b></span> | ';
            } else {
                echo '<a href="DisplayData.php?page=' . $i . '">' . $i . '</a> | ';
            }
        }
        mysqli_close($connect);

        ?>
    </div>

</body>

</html>