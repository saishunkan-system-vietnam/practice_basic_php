
<br>
<?$title = "Thêm sản phẩm"?>
<?
if(!empty($data)){
 echo $this->element('product', ["title" => $title, "data" => $data]);
}
?>