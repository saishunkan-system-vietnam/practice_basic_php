$(document).ready(function () {
    $("#Login").on("click", function () {
        var email = $("#email").val();
        var password = $("#password").val();
        var error = $("#error");
        // alert (Validate());
        // alert(email);

        if (Validate()) {
            alert("true");
            CheckExistUser();
            return false;
        }
        else {
            alert("false");
            return false;
        }

        function Validate() {
            if (email == "") {
                document.getElementById("email").style.background = "red";
                document.getElementById("errorMessage").innerHTML = "Please Enter Email";
                return false;
            }
            alert(email);
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                return (true)
            } else {
                alert("Email không hợp lệ!");
                return false;
            }

            if (password == "") {
                document.getElementById("password").style.background = "red";
                document.getElementById("errorMessage").innerHTML = "Please Enter Password";
                return false;
            }

            return true;
        }

        function CheckExistUser() {
            var sql = "SELECT COUNT(*) as result FROM usertbl where email='" + $.trim($("#email").val()) + "' and password='" + $.trim($("#password").val()) + "' and del_flag=0";
            var result;
            $.ajax({
                async: false,
                type: "post",
                url: "/recruitment/query.php",
                data: {
                    sql: sql,
                    query: "SELECT",
                },
                // datatype: "JSON",
                success: function (data) {
                    alert(data[0].result);
                    console.log("Hello");
                },
            });

            return result;
        }

    });


});