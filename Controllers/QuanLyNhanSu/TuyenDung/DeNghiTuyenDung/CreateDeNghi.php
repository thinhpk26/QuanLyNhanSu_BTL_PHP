<?php declare(strict_types = 1);
    session_start();
    require_once './DeNghiTuyenDungController.php';

    $deNghiTuyenDungController = new DeNghiTuyenDungController($_SESSION);

    $deNghiTuyenDungController->handleAccessController();

    $deNghiTuyenDungController->createYeuCauDeNghiTuyenDung($_POST);
?>