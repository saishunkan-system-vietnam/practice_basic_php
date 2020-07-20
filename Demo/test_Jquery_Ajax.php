<?php 
//index.php
?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to return JSON Data from PHP Script using Ajax Jquery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #result {
   position: absolute;
   width: 100%;
   max-width:870px;
   cursor: pointer;
   overflow-y: auto;
   max-height: 400px;
   box-sizing: border-box;
   z-index: 1001;
  }
  .link-class:hover{
   background-color:#f1f1f1;
  }
  </style>
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <div class="row">
    <div class="col-md-4">
    
    </div>
    <div class="col-md-4">
    </div>
   </div>
   <br />
   <div class="table-responsive" id="employee_details" style="display:none">
   <table class="table table-bordered">
    <tr>
     <td width="10%" align="right"><b>FullName</b></td>
     <td width="90%"><span id="employee_FullName"></span></td>
    </tr>
    <tr>
     <td width="10%" align="right"><b>UserName</b></td>
     <td width="90%"><span id="employee_UserName"></span></td>
    </tr>

    <tr>
     <td width="10%" align="right"><b>Gender</b></td>
     <td width="90%"><span id="employee_Gender"></span></td>
    </tr>
    <tr>
     <td width="10%" align="right"><b>Address</b></td>
     <td width="90%"><span id="employee_Address"></span></td>
    </tr>
    <tr>
     <td width="10%" align="right"><b>Avatar</b></td>
     <td><span id="employee_Avatar" style="width: 90px; height: 90px; display:block" ></span></td>
    </td>
    <!-- <td width="90%"><img src="./img/" id="employee_Avatar"></span> -->
    </tr>
   </table>
   </div>
   
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
   $.ajax({
    url:"fetch.php",
    method:"POST",
    //data:{data:data},
    dataType:"JSON",
    success:function(data)
    {
        $('#employee_details').css("display", "block");
        $('#employee_FullName').text(data.FullName);
        $('#employee_UserName').text(data.UserName);
        $('#employee_Gender').text(data.Gender = 1 ? "Nam":"Nữ");
        $('#employee_Address').text(data.Address);
        $("#employee_Avatar").css({"background-image" :"url(./img/"+data.Avatar+")"});
    }
   })
});
</script>