<?php
/*
    include_once  $_SERVER['DOCUMENT_ROOT']. '/QuanLyNhanSu_BTL_PHP/View_Engine/Template.php'; // Tôi đã thêm đường dẫn git, phải sửa lại
    $template = new Template("Views", "View_Engine");
    echo $template->render('QuanLyNhanSuViews/TuyenDung/DeNghiTuyenDungContent', ['deNghiTuyenDungList' => array()]);
*/
    session_unset();

    require_once 'Controllers/QuanLyNhanSu/HoSo/QuanLyNVController.php';
    require_once 'Controllers/QuanLyNhanSu/HoSo/QuanLyUVController.php';
    require_once 'Controllers/QuanLyNhanSu/HoSo/QuanLyNVNController.php';

    // Xác định route dựa trên URL hoặc thông tin yêu cầu
    $route = $_GET['route']; // Ví dụ: 'quanlynv', 'quanlykh'

    // Gọi controller và action tương ứng với route
    switch ($route) {
        case 'quanlynv':
            $nvController = new QuanLyNVController();
            $nvController->mvcHandler();
            break;
        case 'quanlyuv':
            $UVController = new QuanLyUVController();
            $UVController->mvcHandler();
            break;
        case 'quanlynvn':
            $NVNController = new QuanLyNVNController();
            $NVNController->mvcHandler();
            break;
        // Xử lý các route khác...
        default:
            // Route không hợp lệ, xử lý lỗi hoặc gọi controller/action mặc định
            break;
    }
?>