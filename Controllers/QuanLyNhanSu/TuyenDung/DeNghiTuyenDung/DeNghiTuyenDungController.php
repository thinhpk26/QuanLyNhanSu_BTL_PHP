<?php declare(strict_types=1);
    require_once $_SERVER['DOCUMENT_ROOT'] .'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungsModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungs.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Request.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/PhongBanEntity.php';
    class DeNghiTuyenDungController extends TruongPhongAuthMiddleware {
        private DeNghiTuyenDungsModel $deNghiTuyenDungModel;
        public function __construct(Request $request, array $methods) {
            parent::__construct($request, $methods);
            $this->initDAO();
        }
        private function initDAO() {
            $this->deNghiTuyenDungModel = new DeNghiTuyenDungsModel();
        }
        public function hienThiDeNghiTuyenDungPage($phongBan) {
            if($phongBan instanceof Exception) {
                echo "Có lỗi server cần xử lý";
                exit;
            }
            $deNghiTuyenDungList = $this->deNghiTuyenDungModel->getAllDeNghiTuyenDungByIDPhongBan($phongBan->maPb);
            if($deNghiTuyenDungList instanceof Exception) {
                echo 'Xảy ra lỗi trong quá trình lấy dữ liệu';
                exit;
            }
            $variables = ['deNghiTuyenDungList' => $deNghiTuyenDungList];
            require_once $_SERVER['DOCUMENT_ROOT']. '/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/DeNghiTuyenDung/DeNghiTuyenDungView.php';
        }
        public function createYeuCauDeNghiTuyenDung(object $dataFromClient, UUID $uuid) {
            $resultForClient = null;
            try {
                if(!isset($dataFromClient->phongBan) || !isset($dataFromClient->deNghi)) 
                    throw new Exception ("Không có thuộc tính trên. Vui lòng reload lại page!");
                
                $iD = $uuid->getID();
                $phongBan = $dataFromClient->phongBan;
                $deNghi = $dataFromClient->deNghi;
                $deNghiTuyenDung = new DeNghiTuyenDungs($iD, $phongBan, $deNghi, null);
                $dataFromDB = $this->deNghiTuyenDungModel->addDeNghiTuyenDung($deNghiTuyenDung);
                $resultForClient = $dataFromDB;
            } catch(Exception $ex) {
                $resultForClient = $ex;
            }
            $this->returnJson($resultForClient);
        }

    }

?>