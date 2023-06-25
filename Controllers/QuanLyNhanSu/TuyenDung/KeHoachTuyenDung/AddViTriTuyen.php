<?php declare(strict_types=1);
    session_start();
    include_once './KeHoachTuyenDungController.php';

    $keHoachTuyenDungController = new KeHoachTuyenDungController($_SESSION);
    
    $keHoachTuyenDungController->handleAccessController();
    
    $viTriTuyenDataJson = file_get_contents("php://input");
    $viTriTuyenData = json_decode($viTriTuyenDataJson);

    $iDViTri = isset($viTriTuyenData->iDViTri) ? $viTriTuyenData->iDViTri : "";
    $iDKeHoachTuyenDung = isset($viTriTuyenData->iDKeHoachTuyenDung) ? $viTriTuyenData->iDKeHoachTuyenDung : "";
    $soLuong = isset($viTriTuyenData->soLuong) ? (int) $viTriTuyenData->soLuong : 0;
    $kyNangCanThiet = isset($viTriTuyenData->kyNangCanThiet) ? $viTriTuyenData->kyNangCanThiet : "";

    $keHoachTuyenDungController->addViTriTuyenDung($iDViTri, $iDKeHoachTuyenDung, $soLuong, $kyNangCanThiet);
?>