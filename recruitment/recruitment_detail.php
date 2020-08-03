    <?php
    if (isset($_POST["recruitment_id"])) {
        $recruitment_id = $_POST["recruitment_id"];
        // echo "<div style='background-color: white;' class='recruitment_header' id='recruitment_detail'>";
        
        echo "<div>";
        echo "<ul>";
        require_once "./config/config.php";
        $sqlSelectData = "SELECT * FROM t_recruitment where del_flg = 0 and id = $recruitment_id";
        $resultData = $connect->query($sqlSelectData);
        $detail = null;
        if ($resultData->num_rows > 0) {
            while ($rowData = $resultData->fetch_assoc()) {
                $detail = $rowData["detail"];
                echo "<div><li style= 'text-align:center;font-size: 15px;border-radius: 5px;margin-bottom: 20px !important;border-bottom:1px solid lightblue'>";

                if (isset($rowData["logo"])) {
                    echo "<img style='Height:128px' src='data:image;base64," . base64_encode($rowData["logo"]) . "' alt='Image'/>";
                    //echo "<img src='img/noimage.jpg' alt='Image'>";
                } else {
                    echo "<img src='img/noimage.jpg' alt='Image'/>";
                }

                echo "<div style= 'font-weight:bold;color:blue'>" . $rowData["position"] . "</div>";
                echo "<p>" . $rowData["company"] . "</p>";
                echo "<p>" . "Lương: " . $rowData["salary"] . "</p>";
                echo "<p style='padding-left: 113px;'>" . "Địa điểm: " . $rowData["address"] . "</p>";
                echo "<div style = 'text-align: left;padding-left:11px; width:100%'>";
                echo "<input type='button' id =" . $rowData["id"] . " style = 'width:20%;margin-left: 31.5%;border: 1px solid green; background:white;padding:3px' class='btnapply_dtl' id='btnapply_dtl' name='btnapply_dtl' value='Ứng tuyển'></input>";
                echo "</div></li></div></ul></div>";
            }
        }

        echo "<div style='margin-bottom: 24px;padding:10px 10px;clear:both;padding-top:10px;background-color: #dfe9ec;border-radius:5px;box-shadow: 0 4px 9px 0 #ccc !important;'>";
        echo "<label>" . $detail . "<br></label></div>";

        echo "<div id='back'  style='padding-bottom: 0;text-align:center;margin-bottom:10px'>";
        echo "<input style='width:88px' onclick ='BackToPreviousPage()' type='button' class='btnback' id='btnback' name='btnback' value='&#8678;   Back'></input>";
        echo "</div>";
        echo "</div>";
        // echo "</div></div>";
    }
    ?>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="./js/index.js"></script> -->
    <!-- </div> -->

    <!-- // $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    // if (strpos($url, 'recruitment.php') == true) {
    //     // echo 'Car exists.' . $url;
    //     echo 1;
    // } else {
    //     // echo 'No cars.';
    //     echo 0;
    // } -->