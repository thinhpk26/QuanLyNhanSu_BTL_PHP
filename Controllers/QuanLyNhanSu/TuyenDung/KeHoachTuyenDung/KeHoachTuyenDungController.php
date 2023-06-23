<?php declare(strict_types=1);
    require_once $_SERVER['DOCUMENT_ROOT'] .'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/KeHoachTuyenDungModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/KeHoachTuyenDung.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ViTriTuyen.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ViTriTuyenModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Request.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/ChucVuModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/config.php';
    class KeHoachTuyenDungController extends QuanLyNhanSuAuthMiddleware {
        private KeHoachTuyenDungModel $keHoachTuyenDungModel;
        private ViTriTuyenModel $viTriTuyenDungModel;
        private ChucVuModel $chucVuModel;
        public function __construct(&$Session) {
            parent::__construct($Session);
            $this->initDAO();
        }
        private function initDAO() {
            $this->keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $this->viTriTuyenDungModel = new ViTriTuyenModel();
            $this->chucVuModel = new ChucVuModel(new config());
        }

        public function hienThiKeHoachTuyenDungPage() {
            $keHoachTuyenDungList = $this->keHoachTuyenDungModel->getAllKeHoachWithChuaXacNhan();
            $variables = ['keHoachTuyenDungList' => $keHoachTuyenDungList];
            include_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/KeHoachTuyenDung/KeHoachTuyenDungView.php';
        }
        public function getKeHoachTuyenDung(string $iD) {
            $resultFromDB = $this->keHoachTuyenDungModel->getKeHoachTuyenDungByiD($iD);
            $this->returnJson($resultFromDB);
        }
        public function addKeHoachTuyenDung(string $thoiGianTrienKhai, string $ghiChu) {
            $keHoachTuyenDung = new KeHoachTuyenDung("", $thoiGianTrienKhai, "chuaXacNhan", $ghiChu);
            $resultFromDB = $this->keHoachTuyenDungModel->addKeHoachTuyenDung($keHoachTuyenDung);
            $this->returnJson($resultFromDB);
        } 
        public function updateKeHoachTuyenDung(string $iD, string $thoiGianTrienKhai, string $ghiChu) {
            $resultFromDB = $this->keHoachTuyenDungModel->updateKeHoachTuyenDungByiD($iD, $thoiGianTrienKhai, $ghiChu);
            $this->returnJson($resultFromDB);
        }
        public function deleteKeHoachTuyenDung(string $iD) {
            $resultFromDB = $this->keHoachTuyenDungModel->deleteKeHoachTuyenDungbyID($iD);
            $this->returnJson($resultFromDB);
        }
        public function xacNhanThucThi(string $iD) {
            $resultFromDB = $this->keHoachTuyenDungModel->updateTrangThaiGiaiDoan($iD, "dangThucThi");
            $this->returnJson($resultFromDB);
        }
        public function addViTriTuyenDung(string $iDViTri, string $iDKeHoachTuyenDung, int $soLuong, string $kyNangCanThiet) {
            $newViTriTuyenDung = new ViTriTuyen($this->viTriTuyenDungModel->createID(), $iDViTri, $iDKeHoachTuyenDung, $soLuong, $kyNangCanThiet);
            $resultFromDB = $this->viTriTuyenDungModel->addViTriTuyen($newViTriTuyenDung);
            $this->returnJson($resultFromDB);
        }
        public function deleteViTriTuyenDung($iD) {
            $resultFromDB = $this->viTriTuyenDungModel->deleteViTriTuyenbyID($iD);
            $this->returnJson($resultFromDB);
        }
        public function getAllViTriTuyenByIDKeHoach(string $iDKeHoachTuyenDung) {
            $resultFromDB = $this->viTriTuyenDungModel->getAllViTriTuyenAndChucVuByiDKeHoachTuyenDung($iDKeHoachTuyenDung);
            $this->returnJson($resultFromDB);
        }
        public function getAllViTriNhanSu() {
            $resultFromDB = $this->chucVuModel->getAllChucVu();
            $this->returnJson($resultFromDB);
        }
    }
?>