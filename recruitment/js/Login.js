// /* <script type="text/javascript" src="./js/common.js"  ></script> */
// // function checkLogin()
// // {
// //     var userName = document.getElementsByName("email")[0].value;
// //     var password = document.getElementById("password").value;
// //     if (IsNullOrEmpty(userName))
// //     {
// //          document.getElementById("error_email").style.background = "red";
// //          document.getElementById("error_email").innerHTML = "Vui lòng nhập email";
// //         return false;
// //     }
// // } }

// // $(document).ready(function () {
// //     $("#btnlogin").on("click", function () {

// // });

// // $("#myform").validate({


// //     rules:{
// //         email:{required: true,
// //         pattern: "^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
// //     },
// //     password:{
// //         required: true,
// //     }
// //     }, 
// //     messages:{
// //         email:{
// //             required: "Vui lòng nhập email",
// //             pattern:"Đinhk dạng email không hợp lệ"
// //         },
// //         password:{
// //             required:"Vui lòng nhập mật khẩu"
// //         }
// //     }
// // });

// // $("#myform").validate({
// //     rules: {
// //         email: {
// //         required: true,
// //         pattern: "^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$",
// //       },
// //       password: {
// //         required: true,
// //         minlength: 8,
// //       }
// //     },
// //     messages: {
// //        email: {
// //         required: "Vui lòng nhập email",
// //         pattern:"Định dạng email không hợp lệ",
// //       },
// //       psword: {
// //         required:"Vui lòng nhập mật khẩu"
// //       }
// //     // },
// //     // submitHandler: function(form) {
// //     //   form.submit();
// //     }
// //   });
// // });

// // $("#myform").validate({
// //     rules: {
// //       email: "required",
// //     //   email: {
// //     //     required: true,
// //     //     email: true
// //     //   }
// //     },
// //     messages: {
// //       email: "Please specify your name"
// //     //   email: {
// //     //     required: "We need your email address to contact you",
// //     //     email: "Your email address must be in the format of name@domain.com"
// //     //   }
// //      }
// //   });
// // });


//  $(document).ready(function() {

//       $("#myform").validate({
//          rules: {
//             email: "required",
//             password: "required",
//          },
//          messages: {
//             email: "Vui lòng nhập họ",
//             password: "Vui lòng nhập tên"
//          }
//      });
//  });

// // $(document).ready(function () {
// //     $("#Login").on("click", function () {
// //         var email = $("#email").val();
// //         var password = $("#password").val();
// //         var error = $("#error");
// //         // alert (Validate());
// //         // alert(email);

// //         if (Validate()) {
// //             alert("true");
// //             CheckExistUser();
// //             return false;
// //         }
// //         else {
// //             alert("false");
// //             return false;
// //         }

// //         function Validate() {
// //             if (email == "") {
// //                 document.getElementById("email").style.background = "red";
// //                 document.getElementById("errorMessage").innerHTML = "Please Enter Email";
// //                 return false;
// //             }
// //             alert(email);
// //             if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
// //                 return (true)
// //             } else {
// //                 alert("Email không hợp lệ!");
// //                 return false;
// //             }

// //             if (password == "") {
// //                 document.getElementById("password").style.background = "red";
// //                 document.getElementById("errorMessage").innerHTML = "Please Enter Password";
// //                 return false;
// //             }

// //             return true;
// //         }

// //         function CheckExistUser() {
// //             var sql = "SELECT COUNT(*) as result FROM usertbl where email='" + $.trim($("#email").val()) + "' and password='" + $.trim($("#password").val()) + "' and del_flag=0";
// //             var result;
// //             $.ajax({
// //                 async: false,
// //                 type: "post",
// //                 url: "/recruitment/query.php",
// //                 data: {
// //                     sql: sql,
// //                     query: "SELECT",
// //                 },
// //                 // datatype: "JSON",
// //                 success: function (data) {
// //                     alert(data[0].result);
// //                     console.log("Hello");
// //                 },
// //             });

// //             return result;
// //         }

// //     });


// // });




$(document).ready(function () {
    // Khai báo validate cho thẻ form

    // console.log($("#email"));
    // console.log(document.getElementsByName('email')[0].value);
    // console.log("hoang");
    // alert($("#email").val());


    // $("#myform").validate({
    // });
    $("#btnlogin").click(function () {
        // alert($("#email").val());
        // var email = document.getElementsByName('email')[0].value;
        var email = document.getElementById('email').value;
        var password = document.getElementById("password").value;

        if (email == "") {
            document.getElementById("email").style.borderColor = "red";
            document.getElementById("email").setCustomValidity("Vui lòng nhập Em");
            return;
        }

        document.getElementById("email").setCustomValidity('');
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            return;
        } else {
            document.getElementById("email").setCustomValidity("Định dạng Email không hợp lệ!");
            document.getElementById("email").style.borderColor = "red";
            // alert("Định dạng Email không hợp lệ!");
            return;
        }
    });
});