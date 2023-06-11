<?php declare(strict_types=1);
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    require_once './KeHoachTuyenDungController.php';

    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoanEntity();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $keHoachTuyenDungController = new KeHoachTuyenDungController($request, ['post']);
    
    $keHoachTuyenDungController->handle();
    
    $dataJson = file_get_contents("php://input");

    $data = json_decode($dataJson);
    $iD = isset($data->xacNhanThucThiKeHoach) ? $data->xacNhanThucThiKeHoach : "";
    
    $keHoachTuyenDungController->xacNhanThucThi($iD);
?>