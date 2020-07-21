<body>
    <?php 
        $result = mysqli_query($connect, 'SELECT count(*) as total FROM thietbi');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
 
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 12;
 
        $total_page = ceil($total_records / $limit);
 
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
 
        $start = ($current_page - 1) * $limit;
 
        $result = mysqli_query($connect, "SELECT tb.TenThietBi, tl.TenTheLoai, hsx.TenHang, tb.Img FROM theloai tl INNER JOIN thietbi tb ON tl.MaTheLoai = tb.MaTheLoai INNER JOIN HangSanXuat hsx on tb.HangSanXuat = hsx.MaHang ORDER BY tb.MaThietBi DESC LIMIT $start, $limit  ");
        ?>
    <div style="margin-top: 10px;">
        <table width="1000" border="1" align="center" >
            <?php while ($row = mysqli_fetch_assoc($result)):?>
            <tr>
                <td align="center" style="width: 150px; height: 150px;">
                    <?php echo "<img src='./img/".$row['Img']."'>"?>
                </td>
                <td style="padding-left: 10px;">
                    <?php 
                        echo "<b>"."Tên thiết bị: "."</b>";
                        echo $row['TenThietBi'];
                        echo '</br></br>';
                        echo "<b>"."Thể loại: "."</b>";
                        echo $row['TenTheLoai'];
                        echo '</br></br>';
                        echo "<b>"."Hãng sản xuất: "."</b>";
                        echo $row['TenHang'];?>
                </td>
            </tr>
            <?php endwhile ; ?>
        </table>
    </div>
    <div style=" margin-top: 5px; min-height: 17vh;" align="center">
        <?php 
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
            if ($current_page > 1 && $total_page > 1){
                echo URL_INDEX.($current_page-1).'">Prev</a> | ';
            }
 
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo URL_INDEX.$i.'">'.$i.'</a> | ';
                }
            }
 
            if ($current_page < $total_page && $total_page > 1){
                echo URL_INDEX.($current_page+1).'">Next</a> | ';
            }
           ?>
    </div>
</body>