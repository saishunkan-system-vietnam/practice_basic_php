<?php //ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <?php require_once "./config/config.php";
    require_once "./config/router.php"; ?>
    <link href=<?php echo FILE_CSS_INDEX ?> rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</head>

<body>
    <?php include FILE_PHP_HEADER; ?>
    <div class="wrapper">
        <div class="main">
        <div class="banner">
                <img src="img/banner15.png" />
            </div>
            <div class="container" style="min-height : auto;">
                <div style="background-color: white;" class="recruitment_header" id="recruitment_detail">
                    <div id='data_detail'>
                        <?php
                        if (isset($_GET['job']) || isset($_POST['recruitment_id'])) {
                            if(isset($_POST['recruitment_id']))
                            {
                                $job_id = $connect->real_escape_string($_POST['recruitment_id']);
                            }
                            else
                            $job_id = $connect->real_escape_string($_GET['job']);

                            echo "<div>";
                            echo "<ul>";
                            require_once "./config/config.php";
                            $sqlSelectData = "SELECT * FROM t_recruitment where del_flg = 0 and id = $job_id";
                            $resultData = $connect->query($sqlSelectData);
                            $detail = null;
                            if ($resultData && $resultData->num_rows > 0) {
                                while ($rowData = $resultData->fetch_assoc()) {
                                    $detail = $rowData["detail"];
                                    echo "<div><li style= 'text-align:center;font-size: 15px;border-radius: 5px;margin-bottom: 20px !important;border-bottom:1px solid lightblue'>";

                                    if (isset($rowData["logo"])) {
                                        echo "<img style='Height:128px' src='data:image;base64," . base64_encode($rowData["logo"]) . "' alt='Image'/>";
                                    } else {
                                        echo "<img src='img/noimage.jpg' alt='Image'/>";
                                    }

                                    echo "<div id = 'position" . $rowData["id"] . "' data-pos = '" . $rowData["position"] . "' style= 'font-size:18px;font-weight:bold;color:blue'>" . $rowData["position"] . "</div>";
                                    echo "<p>" . $rowData["company"] . "</p>";
                                    echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                                    echo "<p style='padding-left: 113px;'>" . "Địa điểm: " . $rowData["address"] . "</p>";
                                    echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                                    echo "<input type='button' data-id = " . $rowData["id"] . " style = 'width:20%;margin-left: 31.5%;border: 1px solid green; background:white;padding:3px' class='btnapply'  name =" . $rowData["id"] . " value='Ứng tuyển'></input>";
                                    echo "</div></li></div></ul></div>";
                                    echo("<title>".$rowData["position"]."</title>");
                                }
                            } else {
                                // header('location: index.php');
                                echo "<div style='font-size:40px;margin-bottom:15px ;color:red;text-align:center'>The page cannot be found<br></div>";
                                echo "<div style='font-size:22px;color:black;text-align:center; margin-bottom:10px'>We cannot find the page you are looking for.<br>";
                                echo " It might have been removed, had its name changed, or is temporarily unavailable.<br>";
                                echo "Please check that the Web site address is spelled correctly.";
                                echo " </div>";
                                return false;
                            }

                            echo "<div style='margin-bottom: 24px;padding:10px 10px;clear:both;padding-top:10px;background-color: #dfe9ec;border-radius:5px;box-shadow: 0 4px 9px 0 #ccc !important;'>";
                            echo "<label>" . $detail . "<br></label></div>";

                            // echo "<div id='back'  style='padding-bottom: 0;text-align:center;margin-bottom:10px'>";
                            // echo "<input style='width:88px' onclick ='BackToPreviousPage()' type='button' class='btnback' id='btnback' name='btnback' value='&#8678;   Back'></input>";
                            // echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="apply_form" name="apply_form">
    </div>
    <?php include FILE_PHP_FOOTER; ?>
    <script src="<?= FILE_JS_INDEX ?>"></script>
</body>

</html>