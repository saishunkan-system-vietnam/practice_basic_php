<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Quên mật khẩu</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
    <input type="text" name="email" placeholder="email" autocomplete="off" id="txt_email">
    <br>
    <button id = "btn_run">Reset</button>
    <script>
        $(document).ready(function () {
            $(document).on("click", "#btn_run", function(){
                $.ajax({
                    type: "post",
                    url: "./lib/sendmail.php",
                    data: {
                        email: $("#txt_email").val(),
                    },
                    success: function (response) {
                        alert(response);
                    }
                });
            });
        });
    </script>
</body>
</html>