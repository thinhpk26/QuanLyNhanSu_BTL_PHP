<?php declare(strict_types=1);
    echo $_SERVER['DOCUMENT_ROOT'];
    require_once $_SERVER['DOCUMENT_ROOT'] .'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungsModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungs.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Request.php';
    class DeNghiTuyenDungController extends TruongPhongAuthMiddleware {
        private $deNghiTuyenDungModel;
        public function hienThiDeNghiTuyenDungPage() {
            $this->deNghiTuyenDungModel = new DeNghiTuyenDungsModel();
            $deNghiTuyenDungList = $this->deNghiTuyenDungModel->getAllDeNghiTuyenDungByIDPhongBan("phongban01");
            $variables = ['deNghiTuyenDungList' => $deNghiTuyenDungList];
            require_once $_SERVER['DOCUMENT_ROOT']. '/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/DeNghiTuyenDungView.php';
        }
        public function createYeuCauDeNghiTuyenDung(Request $request, string $deNghi) {
            $this->deNghiTuyenDungModel = new DeNghiTuyenDungsModel();
            $deNghiTuyenDung = new DeNghiTuyenDungs("", "phongban01", $deNghi, "");
            $this->deNghiTuyenDungModel->addDeNghiTuyenDung($deNghiTuyenDung);
        }
    }

?>