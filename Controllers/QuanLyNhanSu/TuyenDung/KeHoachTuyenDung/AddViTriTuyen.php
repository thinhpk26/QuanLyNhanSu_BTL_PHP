<?php declare(strict_types=1);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    include_once './KeHoachTuyenDungController.php';

    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoanEntity();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $keHoachTuyenDungController = new KeHoachTuyenDungController($request, ['post']);
    
    $keHoachTuyenDungController->handle();
    
    $viTriTuyenDataJson = file_get_contents("php://input");
    $viTriTuyenData = json_decode($viTriTuyenDataJson);

    $iDViTri = isset($viTriTuyenData->iDViTri) ? $viTriTuyenData->iDViTri : "";
    $iDKeHoachTuyenDung = isset($viTriTuyenData->iDKeHoachTuyenDung) ? $viTriTuyenData->iDKeHoachTuyenDung : "";
    $soLuong = isset($viTriTuyenData->soLuong) ? (int) $viTriTuyenData->soLuong : 0;
    $kyNangCanThiet = isset($viTriTuyenData->kyNangCanThiet) ? $viTriTuyenData->kyNangCanThiet : "";

    $keHoachTuyenDungController->addViTriTuyenDung($iDViTri, $iDKeHoachTuyenDung, $soLuong, $kyNangCanThiet);
?>