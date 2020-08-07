<?php
require_once "./config/router.php";
?>
<link href=<?php echo FILE_CSS_SIGNUP ?> rel="stylesheet" />
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<?php

if (isset($_POST['title']) && isset($_POST['button']) && isset($_POST['value'])) {
    GenRegistUpdateForm($_POST['title'], $_POST['button'], $_POST['value']);
} else echo 0;

function GenRegistUpdateForm($title, $button, $value)
{
    if ($button == "btnsignup") {
        $style = "background-color:#b6e08a; color:black; border:none;font-size:16px";
        $bgr_color = ";background-color:#E5F8D1";
        $ttl_color = "color:#4A7E08";
        $company = $position = $address = $salary = $detail = "";
        $deadline = date("Y-m-d");
    } else if ($button == "btnupdate") {
        $style = "background-color:#c3deecdb; color:black; border:none;font-size:16px";
        $bgr_color = ";background-color:#e6f4fb";
        $ttl_color = "color:black";
        $id = $_POST['id'];
        // $data = GetData($id);
        // $company = $date["company"]

        require_once "./config/config.php";

        // $id = $_POST["id"];
        $sqlSelectData = "SELECT * FROM t_recruitment where id='$id'";
        $resultData = $connect->query($sqlSelectData);

        if ($resultData->num_rows > 0) {
            while ($rowData = $resultData->fetch_assoc()) {
                $company = $rowData["company"];
                $position = $rowData["position"];
                $address = $rowData["address"];
                $salary = $rowData["salary"];
                $deadline = $rowData["deadline"];
                $detail_data = $rowData["detail"];
            }
        } else {
            $company = $position = $address = $salary = $detail = "";
            $deadline = date("Y-m-d");
        }
    }

    echo '<div class="wrapper_signup" style="height:auto;">
    <div class="signup_page" style="max-width:2500px;width:680px;height:auto;' . $bgr_color . '">
        <div class="title" style="margin-top : 30px;font-size:22px;' . $ttl_color . '">
            ' . $title . '
        </div>
        <form class="form" id="myform" name="myform" method="post">
            <div class="label">
                Company:
            </div>
            <div style="margin-right: 6px;">
                <input type="text" value = "'.$company.'" id="company" name="company" onkeypress="ClearError(id)" onchange="ClearError(id)" placeholder="Nhập tên company" />
                <div class="error_message"><label style="color:red;" name="error_company" id="error_company"> </label></div>
            </div>
            <div class="label">
                Position Title:
            </div>
            <div style="margin-right: 6px;">
                <textarea id="pos_title" placeholder="Nhập position title" style="width:100%; text-align:left; overflow:auto; margin-top: 10px;"  rows="3"  onkeypress="ClearError(id)" onchange="ClearError(id)">
                '.$position.'</textarea>
                <div class="error_message"><label style="color:red" id="error_pos_title"></label></div>
            </div>
            <div class="label" >
                Address:
            </div>
            <div style="margin-right: 6px;"> 
                <input type="text" value = "' .$address. '" name="address" id="address" placeholder=" Nhập address" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_address"></label></div>
            </div>
            <div class="label">
                Salary:
            </div>
            <div style="margin-right: 6px;">
                <input type="text" name="salary" id="salary" value = "' .$salary. '" placeholder=" Nhập salary" onkeypress="ClearError(id)" onchange="ClearError(id)" />
                <div class="error_message"><label style="color:red" id="error_salary"></label></div>
            </div>
            <div class="label">
                Deadline:
            </div>
            <div style="margin-bottom:5px">
                <input type="date" id="deadline" class="deadline" style="text-align:left;width:169px;" value='.$deadline.' onkeypress="ClearError(id)" onchange="ClearError(id)"/>
                <div class="error_message"><label style="color:red;" id="error_deadline"></label></div>
            </div>
            <div class="label" style="clear: both; padding-top: 12px;">
                Detail:
            </div>
            <div style="margin-top:10px">
                <textarea id="detail" name="detail" rows="3" onkeypress="ClearError(id)" onchange="ClearError(id)">
                </textarea>                
                <div class="error_message"><label style="color:red" id="error_detail"></label></div>
            </div>
            <div style="clear: both;">
                <input type="button" style="' . $style . '" class="btnsignup" id="btnsignup" name=' . $button . ' value="' . $value . '"></input>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace("detail",{height:250});   
    alert("'.$company.'");
    CKEDITOR.instances["detail"].setData("'.$company.'");
</script>';
}

//GenRegistUpdateForm("Đăng ký", "btnsignup", "Đăng ký");
//GenRegistUpdateForm("Đăng nhập", "btnupdate", "Update");
function GetData($id)
{
    require_once "./config/config.php";

    // $id = $_POST["id"];
    $sqlSelectData = "SELECT * FROM t_recruitment where id='$id'";
    $resultData = $connect->query($sqlSelectData);

    if ($resultData->num_rows > 0) {
        while ($rowData = $resultData->fetch_assoc()) {
            // $field = array(
            //     "company"   => $rowData["company"],
            //     "position" => $rowData["position"],
            //     "address"  => $rowData["address"],
            //     "salary"   => $rowData["salary"],
            //     "deadline"  => $rowData["deadline"],
            //     "detail"   => $rowData["detail"],
            // );

            $field["company"] = $rowData["company"];
            $field["position"] = $rowData["position"];
            $field["address"] = $rowData["address"];
            $field["salary"] = $rowData["salary"];
            $field["deadline"] = $rowData["deadline"];
            $field["detail"] = $rowData["detail"];

            // $company = $rowData["gender"];
            // $position = $rowData["position"];
            // $address = $rowData["address"];
            // $salary = $rowData["salary"];
            // $deadline = $rowData["deadline"];
            // $detail = $rowData["detail"];
        }
    } else {
        $field = array(
            "company"   => "",
            "position" => "",
            "address"  => "",
            "salary"   => "",
            "deadline" => "",
            "detail"   => "",
        );
    }

    close_connect();
    return $field;
}


// function GenRegistUpdateForm($title, $button, $value)
// {
//     if ($button == "btnsignup") {
//         $style = "background-color:#b6e08a; color:black; border:none;font-size:16px";
//         $bgr_color = ";background-color:#E5F8D1";
//         $ttl_color = "color:#4A7E08";
//     } else if ($button == "btnupdate") {
//         $style = "background-color:#c3deecdb; color:black; border:none;font-size:16px";
//         $bgr_color = ";background-color:#e6f4fb";
//         $ttl_color = "color:black";
//     }
//     echo '<div class="wrapper_signup" style="height:auto;">
//     <div class="signup_page" style="max-width:2500px;width:680px;height:auto;' . $bgr_color . '">
//         <div class="title" style="margin-top : 30px;font-size:22px;' . $ttl_color . '">
//             ' . $title . '
//         </div>
//         <form class="form" id="myform" name="myform" method="post">
//             <div class="label">
//                 Company:
//             </div>
//             <div style="margin-right: 6px;">
//                 <input type="text" name="company" onkeypress="ClearError(id)" onchange="ClearError(id)" id="username" placeholder="Nhập tên company" />
//                 <div class="error_message"><label style="color:red;" name="error_company" id="error_company"> </label></div>
//             </div>
//             <div class="label">
//                 Position Title:
//             </div>
//             <div style="margin-right: 6px;">
//                 <textarea id="pos_title" placeholder="Nhập position title" style="width:100%; text-align:left; overflow:auto; margin-top: 10px;"  rows="3"  onkeypress="ClearError(id)" onchange="ClearError(id)"> </textarea>
//                 <div class="error_message"><label style="color:red" id="pos_title"></label></div>
//             </div>
//             <div class="label" >
//                 Address:
//             </div>
//             <div style="margin-right: 6px;"> 
//                 <input type="text" name="address" id="address" placeholder=" Nhập address" onkeypress="ClearError(id)" onchange="ClearError(id)" />
//                 <div class="error_message"><label style="color:red" id="error_address"></label></div>
//             </div>
//             <div class="label">
//                 Salary:
//             </div>
//             <div style="margin-right: 6px;">
//                 <input type="text" name="salary" id="salary" placeholder=" Nhập salary" onkeypress="ClearError(id)" onchange="ClearError(id)" />
//                 <div class="error_message"><label style="color:red" id="error_salary"></label></div>
//             </div>
//             <div class="label">
//                 Deadline:
//             </div>
//             <div style="margin-bottom:5px">
//                 <input type="date" id="deadline" class="deadline" style="text-align:left;width:169px;" value=' . date("Y-m-d") . ' onkeypress="ClearError(id)" onchange="ClearError(id)"/>
//                 <div class="error_message"><label style="color:red" id="error_deadline"></label></div>
//             </div>

//             <div class="label" style="clear: both; padding-top: 12px;">
//                 Detail:
//             </div>
//             <div style="margin-top:10px">
//                 <textarea id="detail" name="detail"  rows="3" onkeypress="ClearError(id)" onchange="ClearError(id)">
//                 </textarea>
//                 <div class="error_message"><label style="color:red; margin-bottom:5px;" id="error_address"></label></div>
//             </div>
//             <div style="clear: both;">
//                 <input type="button" style="' . $style . '" class="btnsignup" id=' . $button . ' value="' . $value . '"></input>
//             </div>
//         </form>
//     </div>
// </div>
// <script>
//     CKEDITOR.replace("detail",{height:250});
// </script>';
// }
?>
<script src="<?= FILE_JS_SIGNUP_RECRUITMENT ?>"></script>
<script>
       // CKEDITOR.instances["detail"].setData($detail);      
</script>