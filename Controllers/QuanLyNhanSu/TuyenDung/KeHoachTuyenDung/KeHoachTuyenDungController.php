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
        public function hienThiKeHoachTuyenDungPage() {
            $keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $keHoachTuyenDungList = $keHoachTuyenDungModel->getAllKeHoachWithChuaXacNhan();
            $variables = ['keHoachTuyenDungList' => $keHoachTuyenDungList];
            include_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/KeHoachTuyenDungView.php';
        }
        public function getKeHoachTuyenDung(string $iD) {
            $keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $resultFromDB = $keHoachTuyenDungModel->getKeHoachTuyenDungByiD($iD);
            $this->returnJson($resultFromDB);
        }
        public function addKeHoachTuyenDung(string $thoiGianTrienKhai, string $ghiChu) {
            $keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $keHoachTuyenDung = new KeHoachTuyenDung("", $thoiGianTrienKhai, "chuaXacNhan", $ghiChu);
            $resultFromDB = $keHoachTuyenDungModel->addKeHoachTuyenDung($keHoachTuyenDung);
            $this->returnJson($resultFromDB);
        } 
        public function updateKeHoachTuyenDung(string $iD, string $thoiGianTrienKhai, string $ghiChu) {
            $keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $resultFromDB = $keHoachTuyenDungModel->updateKeHoachTuyenDungByiD($iD, $thoiGianTrienKhai, $ghiChu);
            $this->returnJson($resultFromDB);
        }
        public function deleteKeHoachTuyenDung(string $iD) {
            $keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $resultFromDB = $keHoachTuyenDungModel->deleteKeHoachTuyenDungbyID($iD);
            $this->returnJson($resultFromDB);
        }
        public function xacNhanThucThi(string $iD) {
            $keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $resultFromDB = $keHoachTuyenDungModel->updateTrangThaiGiaiDoan($iD, "dangThucThi");
            $this->returnJson($resultFromDB);
        }
        public function addViTriTuyenDung(string $iDViTri, string $iDKeHoachTuyenDung, int $soLuong, string $kyNangCanThiet) {
            $viTriTuyenDungModel = new ViTriTuyenModel();
            $newViTriTuyenDung = new ViTriTuyen($viTriTuyenDungModel->createID(), $iDViTri, $iDKeHoachTuyenDung, $soLuong, $kyNangCanThiet);
            $resultFromDB = $viTriTuyenDungModel->addViTriTuyen($newViTriTuyenDung);
            $this->returnJson($resultFromDB);
        }
        public function deleteViTriTuyenDung($iD) {
            $viTriTuyenDungModel = new ViTriTuyenModel();
            $resultFromDB = $viTriTuyenDungModel->deleteViTriTuyenbyID($iD);
            $this->returnJson($resultFromDB);
        }
        public function getAllViTriTuyenByIDKeHoach(string $iDKeHoachTuyenDung) {
            $viTriTuyenDungModel = new ViTriTuyenModel();
            $resultFromDB = $viTriTuyenDungModel->getAllViTriTuyenAndChucVuByiDKeHoachTuyenDung($iDKeHoachTuyenDung);
            $this->returnJson($resultFromDB);
        }
        public function getAllViTriNhanSu() {
            $ChucVuModel = new ChucVuModel(new config());
            $resultFromDB = $ChucVuModel->getAllChucVu();
            $this->returnJson($resultFromDB);
        }
        private function returnJson($resultFromDB) {
            $result = [];
            if($resultFromDB === true) {
                $result = (object)['isSuccess' => true, 'message' => ''];
            } else if($resultFromDB instanceof Exception) {
                $result = (object)['isSuccess' => false, 'message' => $resultFromDB];
            } else {
                $result = (object)['isSuccess' => true, 'message' => '', 'data' => $resultFromDB];
            }
            header('Content-Type: application/json');
            echo json_encode($result);
        }

    }
?>