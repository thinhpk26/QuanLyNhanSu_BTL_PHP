<?php declare(strict_types=1);
    require_once $_SERVER['DOCUMENT_ROOT'] .'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungsModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungs.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Request.php';
    class XuLyDeNghiController extends QuanLyNhanSuAuthMiddleware {
        private $deNghiTuyenDungModel;
        public function hienThiPhanHoiTuyenDungPage() {
            $this->deNghiTuyenDungModel = new DeNghiTuyenDungsModel();
            $deNghiTuyenDungList = $this->deNghiTuyenDungModel->getAllDeNghiTuyenDungWithoutPhanHoi();
            $variables = ['deNghiTuyenDungList' => $deNghiTuyenDungList];
            require_once $_SERVER['DOCUMENT_ROOT']. '/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/PhanHoiTuyenDungView.php';
        }
        public function phanHoiTuyenDung(string $iD, string $phanHoi) {
            $this->deNghiTuyenDungModel = new DeNghiTuyenDungsModel();
            $resultFromDB = $this->deNghiTuyenDungModel->updatePhanHoiTuyenDung($iD, $phanHoi);
            $response = [];
            if($resultFromDB === true) {
                $response = ['issuccess' => true, 'message' => ''];
            } else {
                $response = ['issuccess' => false, 'message' => $resultFromDB];
            }

            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

?>