<?php
require '../config/router.php';
require FILE_PHP_CONFIG;
require FILE_PHP_HEADERAD;
require FILE_PHP_FUNCTION;


if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
    if (isset($_POST["name"]) && isset($_POST["origin"]) && isset($_POST["price"])
         && isset($_POST["capacity"]) && isset($_POST["describe_product"])) {

            if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
                $uploadedFiles = $_FILES['image'];
                $result = uploadFiles($uploadedFiles);
                if (!empty($result['errors'])) {
                    $error = $result['errors'];
                } else {
                    $image = '../'.$result['path'];
                }
            }
            if (!isset($image) && !empty($_POST['image'])) {
                $image = '../'.$_POST['image'];
            }
        
            $name                   =   $_POST["name"];
            $origin                 =   $_POST["origin"];
            $price                  =   (int)$_POST["price"];
            $capacity               =   $_POST["capacity"].'ml';
            $describe_product       =   $_POST["describe_product"];
            $content                =   $_POST["content"];

            if ($_GET['action'] == 'edit' && !empty($_GET['id'])){
                $sqlUpd="UPDATE t_product SET `name` = '$name', `origin` = '$origin', `price` = $price, `image` = '$image', `capacity` = '$capacity' = '$capacity', `describe_product` = '$describe_product', `content` = '$content',`upadte_datetime` = CURRENT_TIMESTAMP()
                         WHERE id =$_GET[id];";
                $result = $mysqli->query($sqlUpd);
                if ($result) {
                    echo '<script type="text/javascript">alert("Update sản phẩm thành công")</script>';
                } else {
                    echo '<script type="text/javascript">alert("Update sản phẩm thất bại")</script>';
                }
            }
            else{
                $sqlinsert = "INSERT INTO t_product(`name`, `origin`, `price`, `image`, `capacity`, `describe_product`, `content`,`create_datetime`) 
                    VALUES ('$name','$origin',$price,'$image','$capacity','$describe_product','$content', CURRENT_TIMESTAMP())";
    
                $result = $mysqli->query($sqlinsert);
    
                if ($result) {
                    echo '<script type="text/javascript">alert("Thêm sản phẩm thành công")</script>';
                } else {
                    echo '<script type="text/javascript">alert("Thêm sản phẩm thất bại")</script>';
                }
            }

           
    }
}
else{
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];

        // Select dữ liệu
        $result = $mysqli->query("SELECT * FROM t_product WHERE id = '$id'"); 
        $product = $result->fetch_assoc();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src=<?= LINK_JQUERY ?>></script>
    <script src=<?= FILE_JS_CKEDITOR ?>></script>
</head>

<body>
    <div class="main-content">
        <h1><?= !empty($_GET['id']) ?  "Sửa sản phẩm" : "Thêm sản phẩm" ?></h1>
        <div class="AddOrEdit">
            <form id="editing-form" method="POST" action="<?= (!empty($product)) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>" enctype="multipart/form-data">
                <div class="wrap-field">
                    <label>Tên sản phẩm: </label>
                    <input type="text" name="name" value="<?= (!empty($product) ? $product['name'] : "") ?>" required />
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Xuất xứ: </label>
                    <input type="text" name="origin" value="<?= (!empty($product) ? $product['origin'] : "") ?>" required />
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Giá: </label>
                    <input type="text" name="price" value="<?= (!empty($product) ? number_format($product['price'], 0, ",", ".") : "") ?>" required />
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Ảnh: </label>
                    <div class="right-wrap-field">
                        <?php if (!empty($product['image'])) { ?>
                            <img src="<?= $product['image'] ?>" /><br />
                            <input type="hidden" name="image" value="<?= $product['image'] ?>" />
                        <?php } else{?>
                        <input type="file" name="image" accept="image/jpg,image/png,image/jpeg,image/gif"  required/>
                        <?php } ?>
                    </div>
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Dung tích: </label>
                    <input type="text" name="capacity" value="<?= (!empty($product) ? $product['capacity'] : "") ?>" required />
                    <div class="clear-both"></div>
                </div>
                <div class="wrap-field">
                    <label>Mô tả: </label>
                    <textarea rows="5" cols="47" name="describe_product" required><?= (!empty($product) ? $product['describe_product'] : "") ?></textarea>
                    <div class="clear-both"></div>
                </div>
                <label class="labelContent">Nội dung: </label>
                <div class="wrap-field">
                    <textarea name="content" id="product-content"><?= (!empty($product) ? $product['content'] : "") ?></textarea>
                    <script>
                        CKEDITOR.replace('product-content');
                    </script>
                    <div class="clear-both"></div>
                </div>
                <button type="submit" class="btnSave btn">Save</button>
            </form>
        </div>
    </div>

</body>

</html>