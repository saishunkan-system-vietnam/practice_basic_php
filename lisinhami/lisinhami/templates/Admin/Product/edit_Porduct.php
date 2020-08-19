
<br>
<?$title = "Sửa sản phẩm"?>
<?
if(!empty($data)){
 echo $this->element('product', ["title" => $title, "data" => $data]);
}
?>