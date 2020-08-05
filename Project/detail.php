<?php
require('./config/router.php');
include(SITE_MENUTOP);
include(SITE_POPUPMUONTB);

if (isset($_GET['id']) && $_GET['id'] != '') {
  $id_device = $_GET['id'];
} else {
  $_SESSION['error'] = 'Chúng tôi không tìm thấy trang mà bạn đang tìm kiếm';
  header("location:" . SITE_INDEX . "");
}

$sql_select = " SELECT td.id, td.device_name, tc.category_name, ts.supplier_name, td.img, td.info
                FROM t_category tc  INNER JOIN t_device td ON tc.id = td.id_category 
                                    INNER JOIN t_supplier ts on ts.id = td.id_supplier 
                WHERE td.del_flg = 0 AND td.id = $id_device";

$result = mysqli_query($connect, $sql_select);

mysqli_close($connect);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href=<?= FILE_CSS_DETAIL ?>>
  <link rel="stylesheet" href=<?= FILE_CSS_IQLTHIETBI ?>>
</head>

<body>
  <div class="detail">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <div class="left-column">
        <?php !empty($row['img']) ? $row['img'] : $row['img'] = "img_null.jpg";
        echo "<img data-image='black' src='./img/" . $row['img'] . "'>" ?>
      </div>
      <div class="right-column">
        <div class="product-description">
          <span>Thể loại: <?= $row['category_name']; ?></span> <br>
          <h1 id="device_name"><?= $row['device_name']; ?></h1>
          <b>Thông tin chi tiết</b> 
          <p><?= $row['info']; ?></p>
        </div>
          <button class="btnAdd btn" name="btnMuon" id="btnMuon<?= $id_device; ?>" data-id="<?= $id_device; ?>" data-sess="<?= (isset($_SESSION['txtUsername'])) ? $_SESSION['txtUsername'] : ''; ?>">
            <i class="fa fa-plus-circle"></i> Mượn
          </button>
      </div>
    <?php endwhile; ?>
    </div>
  <script src=<?= FILE_JS_COMMOM ?>></script>
</body>

</html>