<?php declare(strict_types=1);
    require_once $_SERVER['DOCUMENT_ROOT'] .'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungsModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/DeNghiTuyenDungs.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/QuanLyNhanSu_BTL_PHP/Request.php';
    class XuLyDeNghiController extends QuanLyNhanSuAuthMiddleware {
        private $deNghiTuyenDungModel;
        public function __construct(Request $request, array $methods) {
            parent::__construct($request, $methods);
            $this->deNghiTuyenDungModel = new DeNghiTuyenDungsModel();
        }
        public function hienThiPhanHoiTuyenDungPage() {
            $deNghiTuyenDungList = $this->deNghiTuyenDungModel->getAllDeNghiTuyenDungWithoutPhanHoi();
            if($deNghiTuyenDungList instanceof Exception) {
                echo 'Xảy ra lỗi trong quá trình lấy dữ liệu';
                exit;
            }
            $variables = ['deNghiTuyenDungList' => $deNghiTuyenDungList];
            require_once $_SERVER['DOCUMENT_ROOT']. '/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/PhanHoiDeNghi/PhanHoiTuyenDungView.php';
        }
        public function phanHoiTuyenDung($dataFromClient) {
            $resultForClient = null;
            try {
                if(!isset($dataFromClient->phanHoi) || !isset($dataFromClient->iD)) 
                    throw new Exception("Không có thuộc tính trên. Vui lòng reload lại page!");
                if($dataFromClient->phanHoi === "") 
                    throw new Exception("Phản hồi phải có nội dung");
                
                $iD = $dataFromClient->iD;
                $phanHoi = $dataFromClient->phanHoi;
                $dataFromDB = $this->deNghiTuyenDungModel->updatePhanHoiTuyenDung($iD, $phanHoi);
                $resultForClient = $dataFromDB;
            } catch(Exception $ex) {
                $resultForClient = $ex;
            }
            $this->returnJson($resultForClient);
        }
    }

?>