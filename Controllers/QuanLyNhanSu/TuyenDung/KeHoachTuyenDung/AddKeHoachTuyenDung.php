<?php declare(strict_types=1);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    include_once './KeHoachTuyenDungController.php';

    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoanEntity();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $keHoachTuyenDungController = new KeHoachTuyenDungController($request, ['post']);
    
    $keHoachTuyenDungController->handle();

    $dataJson = file_get_contents("php://input");
    $data = json_decode($dataJson);
    
    $dateNow = new DateTime();

    $thoiGianTrienKhai = isset($data->thoiGianTrienKhai) ? $data->thoiGianTrienKhai : $dateNow->format('Y-m-d');
    $ghiChu = isset($data->ghiChu) ? $data->ghiChu : "";

    $keHoachTuyenDungController->addKeHoachTuyenDung($thoiGianTrienKhai, $ghiChu);
?>