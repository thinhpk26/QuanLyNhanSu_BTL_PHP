<?php declare(strict_types = 1);
    session_start();
    require_once './XuLyDeNghiController.php';

    $deNghiTuyenDungController = new XuLyDeNghiController($_SESSION);

    $deNghiTuyenDungController->handleAccessController();

    $dataFromClientJson = file_get_contents("php://input");
    $dataFromClient = json_decode($dataFromClientJson);
    $deNghiTuyenDungController->phanHoiTuyenDung($dataFromClient);
?>