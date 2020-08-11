<?php

function uploadFiles($uploadedFiles) {
    $files = array();
    $errors = array();
    $returnFiles = array();
    //Xử lý gom dữ liệu vào từng file đã upload
    // var_dump($uploadedFiles);exit;
    foreach ($uploadedFiles as $key => $values) {
        if (is_array($values)) {
            foreach ($values as $index => $value) {
                $files[$index][$key] = $value;
            }
        } else {
            $files[$key] = $values;
        }
    }
    $uploadPath = "../IMG/";
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }
    if (is_array(reset($files))) { //Up nhiều ảnh
        foreach ($files as $file) {
            $result = processUploadFile($file, $uploadPath);
            if ($result['error']) {
                $errors[] = $result['message'];
            } else {
                $returnFiles[] = $result['path'];
            }
        }
    } else { //Up 1 ảnh
        $result = processUploadFile($files, $uploadPath);
        if ($result['error']) {
            return array(
                'errors' => $result['message']
            );
        } else {
            return array(
                'path' => $result['path']
            );
        }
    }
    return array(
        'errors' => $errors,
        'uploaded_files' => $returnFiles
    );
}

function processUploadFile($file, $uploadPath) {
    $file = validateUploadFile($file, $uploadPath);
    if ($file != false) {
        $file["name"] = str_replace(' ', '_', $file["name"]);
        if (move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"])) {
            return array(
                'error' => false,
                'path' => str_replace('../', '', $uploadPath) . '/' . $file["name"]
            );
        }
    } else {
        return array(
            'error' => false,
            'message' => "File tải lên " . basename($file["name"]) . " không hợp lệ."
        );
    }
}

//Check file hợp lệ
function validateUploadFile($file, $uploadPath) {
    //Kiểm tra xem có vượt quá dung lượng cho phép không?
    if ($file['size'] > 2 * 1024 * 1024) { //max upload is 2 Mb = 2 * 1024 kb * 1024 bite
        return false;
    }
    //Kiểm tra xem kiểu file có hợp lệ không?
    $validTypes = array("jpg", "jpeg", "png", "bmp", "xlsx", "xls");
    $fileType = strtolower(substr($file['name'], strrpos($file['name'], ".") + 1));
    if (!in_array($fileType, $validTypes)) {
        return false;
    }
    //Check xem file đã tồn tại chưa? Nếu tồn tại thì đổi tên
    $num = 0;
    $fileName = substr($file['name'], 0, strrpos($file['name'], "."));
    while (file_exists($uploadPath . '/' . $fileName . '.' . $fileType)) {
        $fileName = $fileName . "(" . $num . ")";
        $num++;
    }
    if ($num != 0) {
        $fileName = substr($file['name'], 0, strrpos($file['name'], ".")) . "(" . $num . ")";
    } else {
        $fileName = substr($file['name'], 0, strrpos($file['name'], "."));
    }
    $file['name'] = $fileName . '.' . $fileType;
    return $file;
}

// Product
// Hàm đếm tổng số sản phẩm
function count_all_product($productname = '')
{
    global $conn;
     
    if ($productname){
        $query = $conn->query('SELECT count(*) AS total FROM t_product WHERE name LIKE \'%'.$conn->real_escape_string($productname).'%\''); 
    }
    else{
        $query = $conn->query('SELECT count(*) AS total FROM t_product');
    }
     
    if ($query){
        $row = $query->fetch_assoc();
        return $row['total'];
    }
    return 0;
}

// Lấy danh sách thành viên
function get_all_product($productname = '', $limit = 10, $start = 0)
{
    global $conn;
     
    if ($productname){
        $sql = 'SELECT * FROM t_product WHERE name LIKE \'%'.$conn->real_escape_string($productname).'%\'  LIMIT '.(int)$start . ','.(int)$limit;
    }
    else{
        $sql = 'SELECT * FROM t_product LIMIT '.(int)$start . ','.(int)$limit;
    }
     
    $query = $conn->query($sql);
      
      
    if ($query->num_rows>0)
    {
        while ($row = $query->fetch_assoc()){
            $result[] = $row;
        }
    }
      
    return $result;
}

// Order
// // Hàm đếm tổng số order
function count_all_order($id = '')
{
    global $conn;
     
    if ($id){
        $query = $conn->query('SELECT count(*) AS total FROM t_order WHERE id LIKE \'%'.$conn->real_escape_string($id).'%\' AND del_flg = 0'); 
    }
    else{
        $query = $conn->query('SELECT count(*) AS total FROM t_order WHERE del_flg = 0');
    }
     
    if ($query){
        $row = $query->fetch_assoc();
        return $row['total'];
    }
    return 0;
}

// Lấy danh sách order
function get_all_order($id = '', $limit = 10, $start = 0)
{
    global $conn;
     
    if ($id){
        $sql = 'SELECT * FROM t_order WHERE id LIKE \'%'.$conn->real_escape_string($id).'%\' AND del_flg = 0 LIMIT '.(int)$start . ','.(int)$limit;
    }
    else{
        $sql = 'SELECT * FROM t_order WHERE del_flg = 0 LIMIT '.(int)$start . ','.(int)$limit;
    }
     
    $query = $conn->query($sql);
      
      
    if ($query->num_rows>0)
    {
        while ($row = $query->fetch_assoc()){
            $result[] = $row;
        }
    }
      
    return $result;
}
?>