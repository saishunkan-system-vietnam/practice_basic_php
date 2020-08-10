<?php
$query_category = "SELECT id, category_name FROM t_category ORDER by create_datetime ";
$result_category = mysqli_query($connect, $query_category);

$query_supplier = "SELECT id, supplier_name FROM t_supplier ORDER by create_datetime";
$result_supplier = mysqli_query($connect, $query_supplier);
?>
<script src=<?= FILE_JS_ADMIN_CKEDITOR ?>></script>
<script src=<?= LINK_JQUERY ?>></script>
<link rel="stylesheet" href=<?= FILE_CSS_POPUPADMIN ?>>

<div id="modal-wrapper" class="modal">
    <form class="modal-content" action="" id="form_device" method="POST">
        <div class="imgcontainer">
            <span name="Close" class="close btn" title="Close PopUp">&times;</span>
            <h1 class="title_popup" style="text-align:center"></h1>
        </div>

        <div class="container">
            <div class="devicename">
                <p>Tên thiết bị</p>
                <input class="inpdevice" id="inp_devicename" type="text" name='inpdevice' placeholder="Enter device name" required oninvalid="this.setCustomValidity('Vui lòng nhập tên thiết bị')" oninput="this.setCustomValidity('')" />
                <span hidden id="deviceId"></span>
            </div>
            <div style="float: right; text-align: center;">
                <label class="custom-file-upload">
                    <input type="file" id="inpimg" name="avatar" accept=".png, .jpeg" onchange="preview()">
                    Chọn hình ảnh
                </label>
                <div class='display_img'>
                    <img id="image" style='width: 150px; height: 130px;' src=''>
                </div>
            </div>
            <p>Thể loại</p>
            <input class="inp_category" id="inp_category" type="text"/>
            <select id="category" name="category" onchange="setcategory()">
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
            <input class="inp_supplier" id="inp_supplier" type="text"/>
            <select id="supplier" name="supplier" onchange="setsupplier()">
                <?php while ($row = mysqli_fetch_assoc($result_supplier)) {
                ?>
                    <option value=" <?php echo $row['id']; ?> ">
                        <?php echo $row['supplier_name']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
            <div class="info">
                <label>Thông tin chi tiết</label>
                <textarea id="inpinfo" cols="45" rows="5">
                </textarea>
                <script>
                    CKEDITOR.replace('inpinfo');
                </script>
            </div>
            <button class="btnsave">SAVE</button>
        </div>
    </form>
</div>
<script src=<?= FILE_JS_AJAXADMIN ?>></script>