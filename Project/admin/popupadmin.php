<?php
$query_category = "SELECT id, category_name FROM t_category";
$result_category = mysqli_query($connect, $query_category);

$query_supplier = "SELECT id, supplier_name FROM t_supplier";
$result_supplier = mysqli_query($connect, $query_supplier);
?>

<script src=<?= LINK_JQUERY ?>></script>
<link rel="stylesheet" href=<?= FILE_CSS_POPUPADMIN ?>>

<div id="modal-wrapper" class="modal">
    <form class="modal-content" action="" id="form_add_device" method="POST">
        <div class="imgcontainer">
            <span onclick="Closeform()" class="close" title="Close PopUp">&times;</span>
            <h1 style="text-align:center">Thêm thiết bị mượn</h1>
        </div>

        <div class="container">
            <div class="devicename">
                <p>Tên thiết bị</p>
                <input id="inpdevice" type="text" name='inpdevice' placeholder="Enter device name" required oninvalid="this.setCustomValidity('Vui lòng nhập tên thiết bị')" oninput="this.setCustomValidity('')" />
            </div>
            <p>Thể loại</p>
            <select id="category" name="category">
                <?php while ($row = mysqli_fetch_assoc($result_category)) {
                ?>
                    <option value=" <?php echo $row['id']; ?> ">
                        <?php echo $row['category_name']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            <div>
            </div>
            <p>Nhà cung cấp</p>
            <select id="supplier" name="supplier">
                <?php while ($row = mysqli_fetch_assoc($result_supplier)) {
                ?>
                    <option value=" <?php echo $row['id']; ?> ">
                        <?php echo $row['supplier_name']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            <div>
                <p>Hình ảnh</p>
                <input type="file" id="inpimg" name="avatar" accept="image/png, image/jpeg">
            </div>
            <button class="btnsave">Thêm thiết bị</button>
        </div>
    </form>
</div>
<script src=<?= FILE_JS_AJAXADMIN ?>></script>