<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- <link href="./css/style.css" rel="stylesheet" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <?php require_once "./config/router.php"; ?>
    <?php require_once FILE_PHP_SESSION_COOKIE ?>
    <link href=<?php echo FILE_CSS_INDEX ?> rel="stylesheet" />
</head>

<body>
    <?php
    // $flg_login = false;
    // if(!empty($_SESSION['flg_login'])){
    //     $flg_login = true;
    // }
    include FILE_PHP_HEADER;
    ?>

    <div class="wrapper">
        <div class="main">
            <div class="banner">
                <img src="img/banner15.png" />
            </div>
            <!-- <div class="left">left</div> -->
            <div class="container" style="min-height : auto;">
                <div class="recruitment_header" style="display:none" id = "recruitment_header">
                    <ul>
                        <?php
                        require_once "./config/config.php";

                        // $sqlCount = "SELECT count(*) as total FROM data where del_flag = 0";
                        // $result = $connect->query($sqlCount);

                        // if ($result->num_rows > 0) {
                        //     while ($row = $result->fetch_assoc()) {
                        //         $total_records = $row['total'];
                        //     }
                        // }

                        // // Get số hàng hiện tại, số info tối đa hiển thị
                        // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // $limit = 12;

                        // $total_page = ceil($total_records / $limit);

                        // // Giới hạn số page
                        // if ($current_page > $total_page) {
                        //     $current_page = $total_page;
                        // } else if ($current_page < 1) {
                        //     $current_page = 1;
                        // }

                        // // Trang bắt đầu
                        // $start = ($current_page - 1) * $limit;

                        $sqlSelectData = "SELECT * FROM t_recruitment where del_flg = 0 order by deadline DESC LIMIT  0, 12 ";
                        $resultData = $connect->query($sqlSelectData);
                        if ($resultData->num_rows > 0) {
                            while ($rowData = $resultData->fetch_assoc()) {
                                echo "<li>";
                                //  echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                                if (isset($rowData["logo"])) {
                                    echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                                } else {
                                    echo '<img src="img/noimage.jpg" alt="Image">';
                                }
                                echo "<h2>" . $rowData["position"] . "</h2>";
                                echo "<p>" . $rowData["company"] . "</p>";
                                echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                                echo "<p>" . $rowData["address"] . "</p>";
                                echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                                echo "<input type='button' style = 'width:115px' class='btnapply' id='btnapply' name='btnapply' value='Ứng tuyển'></input>";
                                echo "</div>";
                                echo "</li>";
                            }
                        }
                        ?>
                    </ul>
                </div>

                <div style="background-color: white;" class="recruitment_header" id="recruitment_detail">
                    <!-- <div><img src="img/noimage.jpg" alt="Image"></div> -->
                    <!-- <div> -->
                    <!-- <ul> -->
                    <?php
                    echo "<div>";
                    echo "<ul>";
                    require_once "./config/config.php";
                    $sqlSelectData = "SELECT * FROM t_recruitment where del_flg = 0 order by deadline limit 1";
                    $resultData = $connect->query($sqlSelectData);
                    $detail = null;

                    if ($resultData->num_rows > 0) {
                        while ($rowData = $resultData->fetch_assoc()) {
                            $detail = $rowData["detail"];
                            echo "<div>";
                            echo "<li style= 'text-align:center;font-size: 15px;border-radius: 5px;margin-bottom: 20px !important;border-bottom:1px solid lightblue'>";

                            if (isset($rowData["logo"])) {
                                echo '<img style="Height:128px" src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                            } else {
                                echo '<img src="img/noimage.jpg" alt="Image">';
                            }

                            echo "<div style= 'font-weight:bold;color:blue'>" . $rowData["position"] . "</div>";
                            echo "<p>" . $rowData["company"] . "</p>";
                            echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                            echo "<p style='padding-left: 113px;'>" . "Địa điểm: " . $rowData["address"] . "</p>";
                            echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                            echo "<input type='button' id =" . $rowData["id"] . " style = 'width:20%;margin-left: 31.5%;border: 1px solid green; background:white;padding:3px' class='btnapply_dtl' id='btnapply_dtl' name='btnapply_dtl' value='Ứng tuyển'></input>";
                            echo "</div></li></div></ul></div>";
                            // echo "</li>";
                            // echo "</div>";
                        }
                    }

                    // echo "</ul>";
                    // echo "</div>";
                    // echo "</ul></div>";
                    echo "<div style='margin-bottom: 24px;padding:10px 10px;clear:both;padding-top:10px;background-color: #dfe9ec;border-radius:5px;box-shadow   : 0 4px 9px 0 #ccc !important;'>";
                    echo "<label id = 'detail'>";
                    echo $detail;
                    echo "<br></label>";
                    echo "</div>";

                    echo "<div style='padding-bottom: 0;text-align:center;margin-bottom:10px'>";
                    echo "<input style='width:88px' type='button' class='btnback' id='btnback' name='btnback' value='&#8678;   Back'></input>";
                    echo "</div>";
                    echo "</div>";

                    $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                    if (strpos($url, 'index.php') == true) {
                        echo 'Car exists.' . $url;
                    } else {
                        echo 'No cars.';
                    }
                    ?>
                    <!-- </div> -->
                    <!-- <div class="right">right</div> -->
                </div>
            </div>
            <?php include FILE_PHP_FOOTER ?>
            <script src="./js/index.js"></script>
</body>

</html>