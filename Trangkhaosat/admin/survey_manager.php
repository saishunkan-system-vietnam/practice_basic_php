<?session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý khảo sát</title>
    <?
    require_once('../config/router.php');

    $infoLogin = false;
    if(!empty($_SESSION['dataLogin'])){
        $infoLogin = true;
    }
    include_once(FILE_MENU);
    ?>

    <link rel="stylesheet" href="<?= FILE_CSS_SURVEY_MANAGER?>">

</head>

<body>
    <div class="warpper_ad_survey">
        <div class="find">
            <button class="btn_ins">Thêm mới</button>
            <select name="category" id="category">
                <option value="0">Tất cả</option>
                <option value="1">Cuộc sống</option>
                <option value="2">Gia đình</option>
                <option value="3">Du lịch</option>
                <option value="4">Thể thao</option>
            </select>
            <input type="text" id="txtfind" class="txt_find">
            <button class="btn_find">Tìm kiếm</button>
        </div>
        <div class="content_sv_mn">
            <table cellpadding="10px">
                <tr>
                    <th class="ff">STT</th>
                    <th class="ff">Loại khảo sát</th>
                    <th class="ff">Câu hỏi khảo sát</th>
                    <th colspan="2"></th>
                </tr>
                <tr>
                    <td class="ff">1</td>
                    <td class="ff">Cuộc sống</td>
                    <td class="ff">Bạn thích uống loại bia nào nhất?</td>
                    <td><button class="btn_edit"><span>edit</span>
                        </button></td>
                    <td><button class="btn_del">delete</button></td>
                </tr>
                <tr>
                    <td class="ff">2</td>
                    <td class="ff">Cuộc sống</td>
                    <td class="ff">Bạn nghĩ thế nào về sự thay đổi cửa các hình thức online - trực tuyến vào cuốc sống
                        toàn cầu sau
                        dịch Covid 19 toàn cầu vừa qua ?</td>
                    <td><button class="btn_edit">edit</button></td>
                    <td><button class="btn_del">delete</button></td>
                </tr>
                <tr>
                    <td class="ff">3</td>
                    <td class="ff">Cuộc sống</td>
                    <td class="ff">Ước mơ bạn chưa thực hiện được là gì?</td>
                    <td><button class="btn_edit">edit</button></td>
                    <td><button class="btn_del">delete</button></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>