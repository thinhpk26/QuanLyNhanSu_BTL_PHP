<?php declare(strict_types = 1);
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Middleware.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/LoaiHoSo.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/HoSoUngTuyen.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/GiayToUngVien.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ChungChi.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/LoaiHoSoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/HoSoUngTuyenModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/GiayToUngVienModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ChungChiModel.php";

    class XuLyHoSoUngTuyenController extends QuanLyNhanSuAuthMiddleware {
        private HoSoUngTuyenModel $hoSoUngTuyenModel;
        private LoaiHoSoModel $loaiHoSoModel;
        private GiayToUngVienModel $giayToUngVienModel;
        private ChungChiModel $chungChiModel;

        public function __construct(&$Session)
        {
            parent::__construct($Session);
            $this->initModel();
        }
        private function initModel()
        {
            $this->hoSoUngTuyenModel = new HoSoUngTuyenModel();
            $this->loaiHoSoModel = new LoaiHoSoModel();
            $this->giayToUngVienModel = new GiayToUngVienModel();
            $this->chungChiModel = new ChungChiModel();
        }

        public function xuLyHoSoTuyenDungPage() {

        }

        private function showAllHoSoUngTuyenByIDKeHoachTuyenDung() {

        }

        private function chonLocHoSo() {
            
        }
    }




?>