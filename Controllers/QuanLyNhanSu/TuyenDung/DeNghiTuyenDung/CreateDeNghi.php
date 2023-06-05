<?php declare(strict_types = 1);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoan.php';
    include_once './DeNghiTuyenDungController.php';

    $inforUser;
    if(isset($_SESSION['user'])) {
        $inforUser = $_SESSION['user'];
    } else {
        $inforUser = new TaiKhoan();
    }

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $deNghiTuyenDungController = new DeNghiTuyenDungController($request, ['post']);

    $deNghiTuyenDungController->handle();

    $deNghi = $_POST['deNghi'];

    $deNghiTuyenDungController->createYeuCauDeNghiTuyenDung($request, $deNghi);

    echo "Đã gửi đến quản lý nhân sự thành công";
?>