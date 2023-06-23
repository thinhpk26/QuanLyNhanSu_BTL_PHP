<?php declare(strict_types=1);
    session_start();
    include_once './KeHoachTuyenDungController.php';

    $keHoachTuyenDungController = new KeHoachTuyenDungController($_SESSION);
    
    $keHoachTuyenDungController->handleAccessController();

    $keHoachTuyenDungController->getAllViTriNhanSu();
?>