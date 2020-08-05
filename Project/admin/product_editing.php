<?php
require '../config/router.php';
require FILE_PHP_CONFIG;
require FILE_PHP_HEADERAD;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src=<?= FILE_JS_CKEDITOR ?>></script>
</head>

<body>
    <div class="main-content">
        <h1><?= !empty($_GET['id']) ?  "Sửa sản phẩm" : "Thêm sản phẩm" ?></h1>
        <div class="">
            <form id="editing-form" method="POST" action="<?= (!empty($product)) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>" enctype="multipart/form-data"></form>
            <div class="wrap-field">
                <label>Tên sản phẩm: </label>
                <input type="text" name="name" value="<?= (!empty($product) ? $product['name'] : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Xuất xứ: </label>
                <input type="text" name="origin" value="<?= (!empty($product) ? $product['origin'] : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Giá: </label>
                <input type="text" name="price" value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Ảnh đại diện: </label>
                <div class="right-wrap-field">
                    <?php if (!empty($product['image'])) { ?>
                        <img src="../<?= $product['image'] ?>" /><br />
                        <input type="hidden" name="image" value="<?= $product['image'] ?>" />
                    <?php } ?>
                    <input type="file" name="image" />
                </div>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Dung tích: </label>
                <input type="text" name="capacity" value="<?= (!empty($product) ? $product['capacity'] : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Mô tả: </label>
                <input type="text" name="describe_product" value="<?= (!empty($product) ? $product['describe_product'] : "") ?>" />
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Nội dung: </label>
                <textarea name="content" id="product-content"><?= (!empty($product) ? $product['content'] : "") ?></textarea>
                <script> CKEDITOR.replace('product-content');</script>
                <div class="clear-both"></div>
            </div>

        </div>
    </div>

    
</body>

</html>