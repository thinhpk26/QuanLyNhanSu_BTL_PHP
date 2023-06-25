<?php declare(strict_types = 1);
    session_start();
    require_once './XuLyDeNghiController.php';

    $xuLyDeNghiController = new XuLyDeNghiController($_SESSION);
    $xuLyDeNghiController->handleAccessController();
    $xuLyDeNghiController->hienThiPhanHoiTuyenDungPage();
?>