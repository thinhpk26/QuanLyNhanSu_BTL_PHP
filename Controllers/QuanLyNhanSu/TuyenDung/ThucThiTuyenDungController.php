<?php declare(strict_types=1);
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Request.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/KeHoachTuyenDungModel.php";
    class ThucThiTuyenDungController extends QuanLyNhanSuAuthMiddleware {
        private KeHoachTuyenDungModel $keHoachTuyenDungModel;
        public function __construct(&$Session) {
            parent::__construct($Session);
            $this->initDAO();
        }
        private function initDAO() {
            $this->keHoachTuyenDungModel = new KeHoachTuyenDungModel();
        }
        public function thucThiTuyenDungPage() {
            $keHoachTuyenDungList = $this->getAllKeHoachTuyenDungWithDangTuyenDung();
            $variables = ["keHoachTuyenDungList" => $keHoachTuyenDungList];
            require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/ThucThiTuyenDung/ThucThiTuyenDungView.php";
        }
        private function getAllKeHoachTuyenDungWithDangTuyenDung() {
            return $this->keHoachTuyenDungModel->getAllKeHoachWithDangThucThi();
        }
    }

    session_start();
    $thucThiTuyenDungController = new ThucThiTuyenDungController($_SESSION);
    $thucThiTuyenDungController->handleAccessController();

    $thucThiTuyenDungController->thucThiTuyenDungPage();
?>