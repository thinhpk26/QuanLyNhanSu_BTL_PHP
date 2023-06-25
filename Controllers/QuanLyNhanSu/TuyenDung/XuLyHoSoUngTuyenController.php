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

        public function xuLyHoSoTuyenDungPage($dataFromClient) {
            if(!isset($dataFromClient['iDKeHoachTuyenDung'])) {
                $this->returnJson(new Exception('Not have iDKeHoachTuyenDung'));
            }
            $allHoSoUngTuyenByIDKeHoachTuyenDung = $this->showAllHoSoUngTuyenByIDKeHoachTuyenDung($dataFromClient['iDKeHoachTuyenDung']);
            $variables = ['hoSoUngTuyenList' => $allHoSoUngTuyenByIDKeHoachTuyenDung, "iDHoSoUngTuyen" => $dataFromClient['iDKeHoachTuyenDung']];

            require_once $_SERVER["DOCUMENT_ROOT"] ."/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/XuLyHoSoUngTuyen/XuLyHoSoUngTuyenView.php";
            exit();
        }
        private function showAllHoSoUngTuyenByIDKeHoachTuyenDung($iDKeHoachTuyenDung) {
            return $this->hoSoUngTuyenModel->getAllHoSoUngTuyenWithChuaQuyetDinh($iDKeHoachTuyenDung);
        }

        public function getAllHoSoUngTuyenWithoutChuaQuyetDinh($dataFromClient) {
            if(!isset($dataFromClient['iDKeHoachTuyenDung'])) {
                $this->returnJson(new Exception('No have iDKeHoachTuyenDung'));
            }
            $hoSoTuyenDungList = $this->hoSoUngTuyenModel->getAllHoSoUngTuyenWithChuaQuyetDinh($dataFromClient['iDKeHoachTuyenDung']);
            $this->returnJson($hoSoTuyenDungList);
        }

        public function getAllHoSoUngTuyenWithChoPhongVan($dataFromClient) {
            if(!isset($dataFromClient['iDKeHoachTuyenDung'])) {
                $this->returnJson(new Exception('No have iDKeHoachTuyenDung'));
            }
            $hoSoTuyenDungList = $this->hoSoUngTuyenModel->getAllHoSoUngTuyenWithChoPhongVanByiDKeHoachtuyenDung($dataFromClient['iDKeHoachTuyenDung']);
            $this->returnJson($hoSoTuyenDungList);
        }

        public function getAllHoSoUngTuyenWithLoaiBo($dataFromClient) {
            if(!isset($dataFromClient['iDKeHoachTuyenDung'])) {
                $this->returnJson(new Exception('No have iDKeHoachTuyenDung'));
            }
            $hoSoTuyenDungList = $this->hoSoUngTuyenModel->getAllHoSoUngTuyenWithLoaiBo($dataFromClient['iDKeHoachTuyenDung']);
            $this->returnJson($hoSoTuyenDungList);
        }

        public function showDetailOfHoSoUngTuyenByID($dataFromClient) {
            if(!isset($dataFromClient['iDHoSoUngTuyen'])) {
                $this->returnJson(new Exception('No have iDHoSoUngTuyen'));
            }
            $detailOfHoSoUngTuyen = $this->getDetailOfHoSoUngTuyenByID($dataFromClient['iDHoSoUngTuyen']);
            $this->returnJson($detailOfHoSoUngTuyen);
        }

        private function getDetailOfHoSoUngTuyenByID($iDHoSoUngTuyen) {
            $generalInformation = $this->hoSoUngTuyenModel->getHoSoUngTuyenByID($iDHoSoUngTuyen);
            $loaiHoSo = $this->loaiHoSoModel->getLoaiHoSoByID($iDHoSoUngTuyen);
            $giayToUngVien = $this->giayToUngVienModel->getGiayToUngVienbyID($iDHoSoUngTuyen);
            $chungChiList = $this->chungChiModel->getChungChibyiDHoSoUngTuyen($iDHoSoUngTuyen);
            return (object)['generalInformation' => $generalInformation, 'loaiHoSo' => $loaiHoSo, 'giayToUngVien' => $giayToUngVien, 'chungChiList' => $chungChiList];
        }

        public function chonLocHoSo($dataFromClient) {
            if(!(isset($dataFromClient['iDHoSoUngTuyen']) && isset($dataFromClient['loaiHoSo']))) {
                $this->returnJson(new Exception('No have loaiHoSo or iDHoSoUngTuyen'));
            }
            $loaiHoSo = (object)['iD' => $dataFromClient['iDHoSoUngTuyen'], 'loaiHoSo' => $dataFromClient['loaiHoSo'] == 0 ? "Loại bỏ" : "Chờ phỏng vấn"];
            $resultFromDB = $this->loaiHoSoModel->udpateLoaiHoSobyID($loaiHoSo);
            $this->returnJson($resultFromDB);
        }
    }

    $xuLyHoSoController = new XuLyHoSoUngTuyenController($_SESSION);
    $xuLyHoSoController->handleAccessController();

    if(isset($_GET['iDKeHoachTuyenDung'])) {
        $xuLyHoSoController->xuLyHoSoTuyenDungPage($_GET);
    }

    if(!isset($_POST['action'])) {
        header('Content-Type: application/json');
        echo json_encode((object)['isSuccess' => false, 'message' => "No have action"]);
        exit();
    }

    $action = $_POST['action'];
    switch($action) {
        case 'detailHoSoTuyenDung':
            $xuLyHoSoController->showDetailOfHoSoUngTuyenByID($_POST);
            break;
        case 'chonLoc':
            $xuLyHoSoController->chonLocHoSo($_POST);
            break;
        case 'getHoSoWithChoPhongVan':
            $xuLyHoSoController->getAllHoSoUngTuyenWithChoPhongVan($_POST);
            break;
        case 'getHoSoWithLoaiBo':
            $xuLyHoSoController->getAllHoSoUngTuyenWithLoaiBo($_POST);
            break;
        case 'getHoSoWithChuaQuyetDinh':
            $xuLyHoSoController->getAllHoSoUngTuyenWithoutChuaQuyetDinh($_POST);
            break;
        default:
            header("Content-Type: application/json");
            echo json_encode((object)['isSuccess' => false, 'message' => "No define action"]);
            exit;
    }
?>