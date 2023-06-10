<?php declare(strict_types = 1);
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    require_once './DeNghiTuyenDungController.php';

    // Điều hướng đến login
    if(!isset($_SESSION['inforUser'])) {
        
    }
    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoanEntity();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $deNghiTuyenDungController = new DeNghiTuyenDungController($request, ['post']);

    $deNghiTuyenDungController->handle();

    $dataFromClientJson = file_get_contents("php://input");
    $dataFromClient = json_decode($dataFromClientJson);
    $UUID = new UUIDVersion1();
    $deNghiTuyenDungController->createYeuCauDeNghiTuyenDung($dataFromClient, $UUID);
?>