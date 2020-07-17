<?php
include("./theme.php");?>
<!DOCTYPE html>
<html>

<head>
    <title>Ví dụ phân trang trong PHP và MySQL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'dangky');
 
        $result = mysqli_query($conn, 'select count(*) as total from dangky');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
 
        $total_page = ceil($total_records / $limit);
 
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        $start = ($current_page - 1) * $limit;
 
        $result = mysqli_query($conn, "SELECT * FROM dangky Where Avatar !='' LIMIT $start, $limit  ");
 
        ?>
    <div style="margin-top: 10px;">
        <table width="1000" border="1" cellpadding="12" align="center">
            <tr>
                <th colspan="6">Danh Sách Đăng Ký</th>
            </tr>
            <tr>
                <th width="80" align="center">
                    Full Name
                </th>
                <th width="40" align="center">
                    User Name
                </th>
                <th width="25" align="center">
                    Giới tính
                </th>
                <th width="250" align="center">
                    Địa chỉ
                </th>
                <th width="100" height= "" align="center">
                    Avatar
                </th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <tr>
                <td>
                    <?php echo $row['FullName']; ?>
                </td>
                <td align="center">
                    <?php echo $row['UserName'];?>
                </td>
                <td align="center">
                    <?php echo $row['Gender'] = 1 ? "Nam":"Nữ";?>
                </td>
                <td>
                    <?php echo $row['Address']?>
                </td>
                <td align="center">
                    <?php echo "<img src='img/".$row['Avatar']."'>"?>
                </td>
            </tr>
            <?php endwhile ; ?>
        </table>
    </div>
    <div style="margin-top: 5px;">
        <?php 
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="DanhSach.php?page='.($current_page-1).'">Prev</a> | ';
            }
 
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="DanhSach.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
 
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="DanhSach.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
    </div>
</body>

</html>