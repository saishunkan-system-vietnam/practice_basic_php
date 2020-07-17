<?session_start()?>

<!DOCTYPE html>
<html>

<head>
    <title>Ví dụ phân trang trong PHP và MySQL</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?
         $isLogin = true;
        include("./menu.php"); 
        ?>
    <br>
    <br>
    <?

        $conn = mysqli_connect('localhost', 'root', '', 'survey');
 
        $result = mysqli_query($conn, 'select count(*) as total from t_account');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];

        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 2;
 

        $total_page = ceil($total_records / $limit);
 
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        $start = ($current_page - 1) * $limit;

        $result = mysqli_query($conn, "SELECT * FROM t_account LIMIT $start, $limit");
 
        ?>
    <div id="Main">
        <table class="tableStyle ">
            <caption>
                <h3>Danh sách Tài khoản</h3>
            </caption>
            <tr >
                <th style="color: #1E90FF; text-align: center;"><b>Tên tài khoản</b></td>
                <th style="color: #1E90FF; text-align: center;"><b>Tên hiển thị </b></td>
            </tr>
            <?             
                while ($row = mysqli_fetch_assoc($result)){
                    ?>
            <tr>
                <td>
                    <?echo $row['username']?>
                </td>
                <td>
                    <?echo $row['name']?>
                </td>
            </tr>
            <?
                }
                ?>
        </table>
        </div>
        <br>
        <div style="display: flex; justify-content: center;">
        <?

            if ($current_page > 1 && $total_page > 1){
                echo '<a href="listaccount.php?page='.($current_page-1).'">Prev</a> | ';
            }

            for ($i = 1; $i <= $total_page; $i++){

                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="listaccount.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="listaccount.php?page='.($current_page+1).'">Next</a> | ';
            }
        ?>
    </div>
</body>

</html>