<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    $sql = 'SELECT count(*) as total FROM t_device WHERE del_flg = 0';
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result) or die("Lỗi truy vấn");;
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 12;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $result = mysqli_query($connect, "SELECT td.device_name, tc.category_name, ts.supplier_name, td.img FROM t_category tc INNER JOIN t_device td ON tc.id = td.id_category INNER JOIN t_supplier ts on ts.id = td.id_supplier ORDER BY td.create_datetime DESC LIMIT $start, $limit  ");
    mysqli_close($connect);
    ?>
    <div style="margin-top: 10px;">
        <table width="1000" border="1" align="center">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td align="center" style="width: 150px; height: 150px; padding: 5px;">
                        <?php !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
                        echo "<img style='width: 150px; height: 130px;' src='./img/" . $row['img'] . "'>" ?>
                    </td>
                    <td style="padding-left: 10px;">
                        <?php
                        echo "<b>" . "Tên thiết bị: " . "</b>";
                        echo $row['device_name'];
                        echo '</br></br>';
                        echo "<b>" . "Thể loại: " . "</b>";
                        echo $row['category_name'];
                        echo '</br></br>';
                        echo "<b>" . "Hãng sản xuất: " . "</b>";
                        echo $row['supplier_name']; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <div style=" margin-top: 5px; min-height: 17vh;" align="center">

    </div>
</body>

</html>