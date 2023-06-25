<?php declare(strict_types=1);
    session_start();
    require_once './KeHoachTuyenDungController.php';

    $keHoachTuyenDungController = new KeHoachTuyenDungController($_SESSION);
    
    $keHoachTuyenDungController->handleAccessController();
    
    $dataJson = file_get_contents("php://input");

    $data = json_decode($dataJson);
    $iD = isset($data->xacNhanThucThiKeHoach) ? $data->xacNhanThucThiKeHoach : "";
    
    $keHoachTuyenDungController->xacNhanThucThi($iD);
?>