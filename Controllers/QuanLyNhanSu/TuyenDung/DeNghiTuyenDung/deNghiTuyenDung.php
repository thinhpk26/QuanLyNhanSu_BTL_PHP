<?php declare(strict_types = 1);
    session_start();
    require_once './DeNghiTuyenDungController.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/PhongBanModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/PhongBanEntity.php';

    $deNghiTuyenDungController = new DeNghiTuyenDungController($_SESSION);
    
    $deNghiTuyenDungController->handleAccessController();

    $phongBanModel = new PhongBanModel(new config());

    //$phongBan = $phongBanModel->getPhongBanByMaNV($_SESSION['inforuser']->maNV);

    $phongBan = $phongBanModel->getPhongBanByMaNV("mnv01");
    $deNghiTuyenDungController->hienThiDeNghiTuyenDungPage($phongBan);
?>