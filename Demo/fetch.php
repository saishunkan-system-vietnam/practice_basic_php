<?php
//fetch.php
 $connect = mysqli_connect("localhost", "root", "", "dangky");
 $query = "SELECT * FROM dangky";
 $result = mysqli_query($connect, $query);
 while($row = mysqli_fetch_array($result))
 {
  $data["FullName"] = $row["FullName"];
  $data["UserName"] = $row["UserName"];
  $data["Gender"] = $row["Gender"];
  $data["Address"] = $row["Address"];
  $data["Avatar"] = $row["Avatar"];
 }
 echo json_encode($data);

?>
