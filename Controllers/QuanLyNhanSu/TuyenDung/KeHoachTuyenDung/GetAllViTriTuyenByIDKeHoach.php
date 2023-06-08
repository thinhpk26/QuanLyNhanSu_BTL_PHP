<?php declare(strict_types=1);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    include_once './KeHoachTuyenDungController.php';

    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoanEntity();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $keHoachTuyenDungController = new KeHoachTuyenDungController($request, ['post']);
    
    $keHoachTuyenDungController->handle();

    $json = file_get_contents('php://input');
    $iDKeHoachTuyenDung = json_decode($json)->iDKeHoachTuyenDung;

    $keHoachTuyenDungController->getAllViTriTuyenByIDKeHoach($iD);
?>