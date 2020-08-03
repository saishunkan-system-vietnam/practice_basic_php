<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuyển dụng</title>
    <?php require "./config/router.php"; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link href=<?php echo FILE_CSS_INDEX ?> rel="stylesheet" />
    <link href=<?php echo FILE_CSS_APPLY ?> rel="stylesheet" />
    <script src="<?= FILE_JS_COMMON ?>"></script>
</head>

<body>
    <?php include FILE_PHP_HEADER ?>
    <div class="wrapper">
        <div class="main">
            <div class="banner">
                <img src="img/banner15.png" />
            </div>
            <!-- <div class="left">left</div> -->
            <div class="container">
                <div class="recruitment_header" id="recruitment_header">
                    <ul>
                        <?php
                        require "./config/config.php";

                        $sqlCount = "SELECT count(*) as total FROM t_recruitment where del_flg = 0";
                        $result = $connect->query($sqlCount);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $total_records = $row['total'];
                            }
                        }

                        // Get số hàng hiện tại, số info tối đa hiển thị
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $limit = 12;

                        $total_page = ceil($total_records / $limit);

                        // Giới hạn số page
                        if ($current_page > $total_page) {
                            $current_page = $total_page;
                        } else if ($current_page < 1) {
                            $current_page = 1;
                        }

                        // Trang bắt đầu
                        $start = ($current_page - 1) * $limit;

                        $sqlSelectData = "SELECT * FROM t_recruitment where del_flg = 0 order by deadline DESC LIMIT  $start, $limit ";
                        $resultData = $connect->query($sqlSelectData);
                        if ($resultData->num_rows > 0) {
                            // while ($rowData = $resultData->fetch_assoc()) {
                            //     echo "<li>";
                            //     if (isset($rowData["logo"])) {
                            //         echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                            //     } else {
                            //         echo '<img src="img/noimage.jpg" alt="Image">';
                            //     }
                            //     echo "<h2>" . $rowData["position"] . "</h2>";
                            //     echo "<p>" . $rowData["company"] . "</p>";
                            //     echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                            //     echo "<p>" . $rowData["address"] . "</p>";
                            //     echo "</li>";
                            // }

                            // $i = 1;
                            // while ($rowData = $resultData->fetch_assoc()) {
                            //     echo "<li>";
                            //     //  echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                            //     if (isset($rowData["logo"])) {
                            //         echo '<img id = img' . $i . ' name =' . $rowData["id"] . ' src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                            //     } else {
                            //         echo '<img src="img/noimage.jpg" alt="Image">';
                            //     }
                            //     echo "<h2 id = position'.$i.' name ='" . $rowData["id"] . "'>" . $rowData["position"] . "</h2>";
                            //     echo "<p>" . $rowData["company"] . "</p>";
                            //     echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                            //     echo "<p>" . $rowData["address"] . "</p>";
                            //     echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                            //     echo "<input type='button' data-id = " . $rowData["id"] . " style = 'width:115px' class='btnapply' id='btnapply" . $i . "' name =" . $rowData["id"] . " value='Ứng tuyển'></input>";
                            //     echo "</div>";
                            //     echo "</li>";
                            //     $i++;
                            // }

                            // $i = 1;
                            // while ($rowData = $resultData->fetch_assoc()) {
                            //     echo "<li>";
                            //     echo "<a onclick='ShowData(this)' id = 'logo" . $i . "' data-id = " . $rowData["id"] . " href='#' >";

                            //     if (isset($rowData["logo"])) {
                            //         echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                            //     } else {
                            //         echo '<img src="img/noimage.jpg" alt="Image">';
                            //     }

                            //     echo "</a>";
                            //     echo "<a title='" . $rowData["position"] . "' id = 'position" . $i . "' data-id = " . $rowData["id"] . " href='#' onclick='ShowData(this)' style='text-decoration: none;'>";
                            //     echo "<h2 style='font-size: 16px'  name ='" . $rowData["id"] . "'>" . $rowData["position"] . "</h2></a>";
                            //     echo "<p>" . $rowData["company"] . "</p>";
                            //     echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                            //     echo "<p>" . "Địa điểm: ". $rowData["address"] . "</p>";
                            //     echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                            //     echo "<input type='button' data-id = " . $rowData["id"] . " style = 'width:115px' class='btnapply' id='btnapply" . $i . "' name =" . $rowData["id"] . " value='Ứng tuyển'></input>";
                            //     echo "</div>";
                            //     echo "</li>";
                            //     $i++;

                            $i = 1;
                            while ($rowData = $resultData->fetch_assoc()) {
                                echo "<li>";
                                echo "<a id = 'logo" . $i . "' data-id = " . $rowData["id"] . " href='http://minhnn.com/detail.php?job=".$rowData["id"]."'>";

                                if (isset($rowData["logo"])) {
                                    echo '<img src="data:image;base64,' . base64_encode($rowData["logo"]) . '" alt="Image">';
                                } else {
                                    echo '<img src="img/noimage.jpg" alt="Image">';
                                }

                                // echo "</a>";
                                // echo "<a title='" . $rowData["position"] . "' data-id = " . $rowData["id"] . "  href='http://minhnn.com/detail.php?job=".$rowData["id"]."' style='text-decoration: none;'>";
                                // echo "<h2 id = 'position" . $rowData["id"] . "' data-id = " . $rowData["id"] . "  style='font-size: 16px'  name ='" . $rowData["id"] . "'>" . $rowData["position"] . "</h2></a>";
                                // echo "<p>" . $rowData["company"] . "</p>";
                                // echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                                // echo "<p>" . "Địa điểm: ". $rowData["address"] . "</p>";
                                // echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                                // echo "<input  type='button' data-id = " . $rowData["id"] . " style = 'width:115px' class='btnapply' id='btnapply" . $i . "' name =" . $rowData["id"] . " value='Ứng tuyển'></input>";
                                // echo "</div>";
                                // echo "</li>";
                                // $i++;

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

                <div class="pagination" id="pagination_recruitment">
                    <?php
                    if ($current_page > 1 && $total_page > 1) {
                        echo '<a href="' . FILE_PHP_RECRUITMENT . '?page=' . ($current_page - 1) . '"><b>&#8678;</b></a> | ';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span style="color: #1a75ff;"><b>' . $i . '</b></span> | ';
                        } else {
                            echo '<a href="' . FILE_PHP_RECRUITMENT . '?page=' . $i . '">' . $i . '</a> | ';
                        }
                    }

                    if ($current_page < $total_page) {
                        echo '<a href="' . FILE_PHP_RECRUITMENT . '?page=' . ($current_page + 1) . '"><b>&#8680;</b></a>';
                    }
                    ?>
                </div>

                <div style="background-color: white;" class="recruitment_header" id="recruitment_detail">;
                </div>
            </div>
            <!-- <div class="right">right</div> -->
        </div>
    </div>
    <div id="apply_form" name="apply_form">
    </div>
    <?php include FILE_PHP_FOOTER ?>
    <script src="<?= FILE_JS_INDEX ?>"></script>
</body>

</html>