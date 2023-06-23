<?php declare(strict_types = 1);
    session_start();
    require_once './DeNghiTuyenDungController.php';

    $deNghiTuyenDungController = new DeNghiTuyenDungController($_SESSION);

    $deNghiTuyenDungController->handleAccessController();

    $dataFromClientJson = file_get_contents("php://input");
    $dataFromClient = json_decode($dataFromClientJson);
    $UUID = new UUIDVersion1();
    $deNghiTuyenDungController->createYeuCauDeNghiTuyenDung($dataFromClient, $UUID);
?>