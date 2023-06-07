<?php declare(strict_types=1);
    include_once $_SERVER['DOCUMENT_ROOT'] .'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/KeHoachTuyenDungModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/KeHoachTuyenDung.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ViTriTuyen.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/ViTriTuyenModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Request.php';

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
        public function createKeHoachTuyenDung(string $thoiGianTrienKhai, string $ghiChu) {
            $keHoachTuyenDungModel = new KeHoachTuyenDungModel();
            $keHoachTuyenDung = new KeHoachTuyenDung("", $thoiGianTrienKhai, "", $ghiChu);
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
        public function createViTriTuyenDung() {
            $viTriTuyenDungModel = new ViTriTuyenModel();
            // chưa đủ điều kiện
            // $resultFromDB = $viTriTuyenDungModel->addViTriTuyen();
        }
        public function deleteViTriTuyenDung($iD) {
            $viTriTuyenDungModel = new ViTriTuyenModel();
            $resultFromDB = $viTriTuyenDungModel->deleteViTriTuyenbyID($iD);
            $this->returnJson($resultFromDB);
        }
        private function returnJson($resultFromDB) {
            $result = [];
            if($resultFromDB === true) {
                $result = ['isSuccess' => true, 'message' => ''];
            } else if($resultFromDB instanceof Exception) {
                $result = ['isSuccess' => false, 'message' => $resultFromDB];
            } else {
                $result = ['isSuccess' => true, 'message' => '', 'data' => $resultFromDB];
            }
            header('Content-Type: application/json');
            echo json_encode($result);
        }

    }
?>