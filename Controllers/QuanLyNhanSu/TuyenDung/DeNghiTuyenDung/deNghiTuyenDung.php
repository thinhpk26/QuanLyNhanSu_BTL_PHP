<?php declare(strict_types = 1);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoan.php';
    include_once './DeNghiTuyenDungController.php';

    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoan();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $deNghiTuyenDungController = new DeNghiTuyenDungController($request, ['get']);
    
    $deNghiTuyenDungController->handle();
    
    $deNghiTuyenDungController->hienThiDeNghiTuyenDungPage();

?>