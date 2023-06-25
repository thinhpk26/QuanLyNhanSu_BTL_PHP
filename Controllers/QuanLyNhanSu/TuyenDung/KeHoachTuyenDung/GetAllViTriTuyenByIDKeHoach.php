<?php declare(strict_types=1);
    session_start();
    include_once './KeHoachTuyenDungController.php';
    $keHoachTuyenDungController = new KeHoachTuyenDungController($_SESSION);
    
    $keHoachTuyenDungController->handleAccessController();

    $json = file_get_contents('php://input');
    $iDKeHoachTuyenDung = json_decode($json)->iDKeHoachTuyenDung ? json_decode($json)->iDKeHoachTuyenDung : "";

    $keHoachTuyenDungController->getAllViTriTuyenByIDKeHoach($iDKeHoachTuyenDung);
?>