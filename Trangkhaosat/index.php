<?session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>KHẢO SÁT TRỰC TUYẾN</title>
    <?
    require_once('./config/router.php');
    
    $infoLogin = false;
    if(!empty($_SESSION['dataLogin'])){
        $infoLogin = true;
    }
    include_once(FILE_MENU);
    ?>
    <link rel="stylesheet" href="<?= FILE_CSS_INDEX?>">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>


    <div>
        <img class="banner" src="/image/banner.jpg" style="width:100%">
    </div>


    <div class="warpper-home">
        <div class="ks-fast">
            <div class="container-home">
                <div class="row" id="content">
                    <H1>KHẢO SÁT NHANH</H1>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $.ajax({
            async: false,
            type: "post",
            url: "./lib/home_ajax.php",
            data: {
                uid: 'test',
            },
            success: function(data) {
                console.log(data[0].row_num);
                console.log(data);
                var element = "";
                data.forEach(function(item) 
                {
                    element = element + (
                        (item.row_num == '1' ?
                            '<div class="col">' +
                            '<div class="col-r1">' +
                            '<div class="title"><b>' + item.category + '<b></div>' :
                            "\n") +
                        ' <div class="detail">' +
                        ' <span class="date">' + item.create_datetime + '</span>' +
                        ' <span class="text-nd-ksn">' + item.content + '</span>' +
                        '  <a href="<?= $infoLogin == true ? '#': ''?>" class="btn-reply"> Trả lời ngay' +
                        '</a></div>' +
                        (item.row_num == '3' ?
                            ' </div></div></div>' : "\n"));

                });
                console.log(element);
                $("#content").append(element);
            }
        });
    });
    </script>
</body>

<footer>
    <?include("./footer.php")?>
</footer>

</html>