<?php
    require '../config/router.php';
    require_once FILE_PHP_CONFIG;
    require_once FILE_PHP_PAGINATIONAD;
    require_once FILE_PHP_FUNCTION;

    // Lấy thong tin lọc
    $productname = isset($_GET['productname']) ? $_GET['productname'] : '';
    
    // Lấy trang hiện tại
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    
    // Khởi tạo đối tượng Pagination mới
    $pagination = new Pagination();

    // Kết nối db
    connect();
    
    // Cấu hình thông số phân trang
    $pagination->init(array(
        'current_page'  => $page,
        'total_record'  => count_all_product($productname),
        'link_full'     => 'getProduct.php?page={page}&productname='.$productname,
        'link_first'    => 'getProduct.php'
    ));

    // Lấy limit và Start
    $limit = $pagination->get_config('limit');
    $start = $pagination->get_config('start');
    
    // Lấy danh sách người dùng
    $data = get_all_product($productname, $limit, $start);
    
    // Ngắt kết nối
    disconnect();

    // Trả kết quả cho client
    die (json_encode(array(
        'data' => $data,
        'paging' => $pagination->html()
    )));
?>