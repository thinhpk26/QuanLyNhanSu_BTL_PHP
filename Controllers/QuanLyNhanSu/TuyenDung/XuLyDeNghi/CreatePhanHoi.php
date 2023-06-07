<?php declare(strict_types = 1);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    include_once './XuLyDeNghiController.php';

    $inforUser = isset($_SESSION['inforUser']) ? $_SESSION['inforUser'] : new TaiKhoanEntity();

    $request = new Request($inforUser, $_SERVER['REQUEST_METHOD']);

    $xuLyDeNghiController = new XuLyDeNghiController($request, ["post"]);
    
    $xuLyDeNghiController->handle();

    $iD = $_POST['iD'];
    $phanHoi = $_POST['phanHoi'];

    $xuLyDeNghiController->phanHoiTuyenDung($iD, $phanHoi);

?>