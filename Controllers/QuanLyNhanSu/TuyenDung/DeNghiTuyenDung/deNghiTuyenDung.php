<?php declare(strict_types = 1);
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    require_once './DeNghiTuyenDungController.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/PhongBanModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/PhongBanEntity.php';

    // Điều hướng đến login
    if(!isset($_SESSION['inforUser'])) {
        
    }
    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoanEntity();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);
    $deNghiTuyenDungController = new DeNghiTuyenDungController($request, ['get']);
    
    $deNghiTuyenDungController->handle();

    $phongBanModel = new PhongBanModel(new config());

    $phongBan = $phongBanModel->getPhongBanByMaNV($inforUser->maNV);

    $deNghiTuyenDungController->hienThiDeNghiTuyenDungPage($phongBan);
?>