<?
    session_start();   
    require_once('./config/router.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Giới thiệu</title>
    <link rel="stylesheet" href="<?= FILE_CSS_STYLESHEET?>">
    <link rel="stylesheet" href="<?= FILE_CSS_INTRODUCE?>">
</head>

<body>
    <? 
        $infoLogin = false;
        if(!empty($_SESSION['dataLogin'])){
            $infoLogin = true;
        }
        include_once(FILE_MENU);
    ?>
    <div class="warrper_intro">
        <div class="container_intro">
            <div class="title_intro">
                <span class="dtl_intro">Giới thiệu về SSV-Survey</span>
            </div>
            <div class="content_intro">
                <div class="dtl_content">
                    <span><b>SSV-Survey</b> là một trong những cộng đồng lớn mạnh hàng đầu Việt Nam
                        về khảo sát thị trường trực tuyến.
                        Ra đời cách đây không lâu, chỉ trong một thời gian ngắn,
                        website www.lieund.com đã nhận được sự quan tâm của đông đảo các thành viên ở mọi lứa tuổi,
                        mọi thành phần và từ khắp nơi trên mọi miền đất nước.
                        Đây cũng là nơi để các thành viên có thể giao lưu,
                        học hỏi, chia sẻ các kinh nghiệm về nghiên cứu thị trường cũng như lĩnh vực marketing, tham gia
                        các
                        hoạt động ngoại khóa bổ ích, thiết thực, gắn kết cộng đồng. Hơn nữa, các thành viên sẽ được nói
                        lên
                        mong muốn, thị hiếu của mình và tác động tích cực đến việc xây dựng và cải tiến các sản phẩm,
                        dịch
                        vụ thỏa mãn nhu cầu và phục vụ thiết thực cho cuộc sống.</span>
                </div>
                <p class="last">Hãy tận hưởng những lợi ích mà <b>SSV-Survey</b> mang lại cho bạn bằng việc đăng kí
                    thành viên ngay!</p>
            </div>
        </div>
    </div>
    <footer><?include(FILE_FOOTER)?></footer>
</body>

</html>