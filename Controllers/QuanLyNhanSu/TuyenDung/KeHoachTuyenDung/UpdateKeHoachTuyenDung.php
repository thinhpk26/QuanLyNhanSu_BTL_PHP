<?php declare(strict_types=1);
    session_start();
    include_once './KeHoachTuyenDungController.php';

    $keHoachTuyenDungController = new KeHoachTuyenDungController($_SESSION);
    
    $keHoachTuyenDungController->handleAccessController();
    
    $json = file_get_contents('php://input');
    $data = json_decode($json);

    $iD = $data->iD;
    $thoiGianTrienKhai = $data->thoiGianTrienKhai;
    $ghiChu = $data->ghiChu;

    $keHoachTuyenDungController->updateKeHoachTuyenDung($iD, $thoiGianTrienKhai, $ghiChu);
?>