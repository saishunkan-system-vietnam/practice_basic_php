<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <?php require_once "./config/router.php"; ?>
    <?php require_once FILE_PHP_SESSION_COOKIE ?>
    <link href=<?php echo FILE_CSS_INDEX ?> rel="stylesheet" />
    <link href=<?php echo FILE_CSS_APPLY ?> rel="stylesheet" />
</head>

<body>
    <?php include FILE_PHP_HEADER; ?>

    <div class="wrapper">
        <div class="main">
            <div class="banner">
                <img src="img/banner15.png" />
            </div>
            <div class="container" style="min-height : auto;">
                <div class="recruitment_header" style="display:block" id="recruitment_header">
                    <ul>
                        <?php
                        require_once "./config/config.php";

                        $sqlSelectData = "SELECT * FROM t_recruitment where del_flg = 0 order by create_datetime DESC LIMIT  0, 12 ";
                        $resultData = $connect->query($sqlSelectData);
                        if ($resultData->num_rows > 0) {
                            $i = 1;
                            while ($rowData = $resultData->fetch_assoc()) {
                                echo "<li>";
                                echo "<a id = 'logo" . $i . "' data-id = " . $rowData["id"] . " href='http://minhnn.com/detail.php?job=" . $rowData["id"] . "'>";

                                if (isset($rowData["logo"])) {
                                    echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                                } else {
                                    echo '<img src="img/noimage.jpg" alt="Image">';
                                }

                                echo "</a>";
                                echo "<a title='" . $rowData["position"] . "'   href='http://minhnn.com/detail.php?job=" . $rowData["id"] . "' style='text-decoration: none;'>";
                                echo "<h2 id = 'position" . $rowData["id"] . "' data-pos = '" . $rowData["position"] . "'  style='font-size: 16px' >" . $rowData["position"] . "</h2></a>";
                                echo "<p>" . $rowData["company"] . "</p>";
                                echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                                echo "<p>" . "Địa điểm: " . $rowData["address"] . "</p>";
                                echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                                echo "<input  type='button' data-id = " . $rowData["id"] . " style = 'width:115px' class='btnapply' id='btnapply" . $i . "' name =" . $rowData["id"] . " value='Ứng tuyển'></input>";
                                echo "</div>";
                                echo "</li>";
                                $i++;
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="apply_form" name="apply_form">
    </div>

    <?php include FILE_PHP_FOOTER ?>
    <script src="<?= FILE_JS_INDEX ?>"></script>
    <script src="<?= FILE_JS_COMMON ?>"></script>
</body>

</html>