<?php
require('./config/router.php');
include(SITE_MENUTOP);
include(SITE_BANNER);
include(SITE_POPUPMUONTB);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quản lý thiết bị mượn</title>
</head>

<body>
    <?php
    $result = mysqli_query($connect, 'SELECT count(*) as total FROM thietbi');
    $row = mysqli_fetch_assoc($result);
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

    if (!isset($_SESSION['txtUsername']) && !isset($dataSaveUser['usr'])) {
        header('location: dangNhap.php');
    } else if (!isset($_SESSION['txtUsername'])) {
        $dataSaveUser = json_decode($_COOKIE[COOKIE_LOGIN], true);
        $_SESSION['txtId'] =  $dataSaveUser['id'];
    };

    $sqlInsert = "SELECT tb.img, tb.TenThietBi, ct.SoLuong, mt.NgayMuon, ct.LyDo FROM muontra mt INNER JOIN chitietmuontra ct ON ct.MaMuonTra = mt.MaMuonTra 
                                                                                            INNER JOIN thietbi tb ON ct.MaThietBi = tb.MaThietBi 
                                                                            WHERE ct.Del_Flg = 0 AND ct.DaTra = 0 AND mt.IDTaiKhoan = $_SESSION[txtId] LIMIT $start, $limit";
    $resultInsert = mysqli_query($connect, $sqlInsert);
    ?>
    <div style="margin-top: 10px;">
        <div>
            <table width="1000" border="0" cellpadding="12" align="center">
                <tr style="float: right;">
                    <td> <button class="btn" onclick="Openform()"><i class="fa fa-plus-circle"></i> Mượn thiết bị</button></td>
                </tr>
            </table>
        </div>
        <table width="1000px" border="1" cellpadding="12" align="center">
            <tr>
                <th colspan="5">Danh Sách Thiết bị mượn</th>
            </tr>
            <tr>
                <th width="100px" align="center">
                    Ảnh thiết bị
                </th>
                <th width="180px" align="center">
                    Tên thiết bị
                </th>
                <th width="30px" align="center">
                    Số lượng
                </th>
                <th width="50px" align="center">
                    Ngày mượn
                </th>
                <th width="150px" align="center">
                    Lý do mượn
                </th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($resultInsert)) : ?>
                <tr>
                    <td align="center">
                        <?php echo "<img src='img/" . $row['img'] . "'>" ?>
                    </td>
                    <td>
                        <?php echo $row['TenThietBi']; ?>
                    </td>
                    <td align="center">
                        <?php echo $row['SoLuong']; ?>
                    </td>
                    <td align="center">
                        <?php echo $row['NgayMuon']; ?>
                    </td>
                    <td>
                        <?php echo $row['LyDo'] ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <div style=" margin-top: 5px; min-height: 17vh;" align="center">
    </div>
    <script src=<?= FILE_JS_COMMOM ?>></script>

    <?php include(SITE_FOOTER); ?>
</body>

</html>