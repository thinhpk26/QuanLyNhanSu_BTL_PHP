<?php declare(strict_types = 1);
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/WebsiteDangTuyenModel.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Models/TuyenDungModels/WebsiteDangTuyen.php';
    class WebsiteTuyenDungController extends QuanLyNhanSuAuthMiddleware {
        private WebsiteDangTuyenModel $websiteDangTuyenModel;
        public function __construct(&$Session) {
            parent::__construct($Session);
            $this->initDAO();
        }
        private function initDAO() {
            $this->websiteDangTuyenModel = new WebsiteDangTuyenModel();
        }
        public function showWebsiteTuyenDung(object $dataFromClient) {
            $iDKeHoachTuyenDung = $dataFromClient->iDKeHoachTuyenDung;
            $variables = $this->getAllThongTinWebsiteToControllerByIDKeHoachTuyenDung($iDKeHoachTuyenDung);
            if($variables instanceof Exception) {
                header('Location: /QuanLyNhanSu_BTL_PHP/Views/ErrorPage.php');
                exit();
            }
            $variables = ['websiteDangTuyenList' => $variables];
            include_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/WebsiteDangTuyen/WebsiteDangTuyenView.php';
            exit;
        }
        private function getAllThongTinWebsiteToControllerByIDKeHoachTuyenDung(string $iDKeHoachTuyenDung) : array {
            return $this->websiteDangTuyenModel->getAllWebsiteDangTuyenbyIDKeHoachTuyenDung($iDKeHoachTuyenDung);
        }
        public function getAllThongTinWebsiteByIDKeHoachTuyenDung(object $dataFromClient) {
            $resultForClient = null;
            try {
                if(!isset($dataFromClient->iDKeHoachTuyenDung))
                    throw new Exception("Không có đầy đủ thuộc tính yêu cầu");
                $iDKeHoachTuyenDung = $dataFromClient->iDKeHoachTuyenDung;
                $thongTinWebsiteDangTuyen = $this->getAllThongTinWebsiteToControllerByIDKeHoachTuyenDung($iDKeHoachTuyenDung);
                $resultForClient = $thongTinWebsiteDangTuyen;
            } catch(Exception $e) {
                $resultForClient = $e;
            }
            $this->returnJson($resultForClient);
        }
        
        public function addOneThongTinWebsite(object $dataFromClient, UUID $uuiD) {
            $resultForClient = null;
            try {
                $iD = $uuiD->getID();
                if(!isset($dataFromClient->iDKeHoachTuyenDung) || !isset($dataFromClient->linkDangTuyen) || !isset($dataFromClient->thoiGianDangTuyen) || !isset($dataFromClient->ketThucDangTuyen) || !isset($dataFromClient->ghiChu))
                    throw new Exception("Không có đầy đủ thuộc tính yêu cầu");
                $iDKeHoachTuyenDung = $dataFromClient->iDKeHoachTuyenDung;
                $linkDangTuyen = $dataFromClient->linkDangTuyen;
                $thoiGianDangTuyen = $dataFromClient->thoiGianDangTuyen;
                $ketThucDangTuyen = $dataFromClient->ketThucDangTuyen;
                $ghiChu = $dataFromClient->ghiChu;
                $websiteDangTuyen = new WebsiteDangTuyen($iD, $iDKeHoachTuyenDung, $linkDangTuyen, $thoiGianDangTuyen, $ketThucDangTuyen, $ghiChu);
                $resultFromDB = $this->websiteDangTuyenModel->addWebsiteDangTuyen($websiteDangTuyen);
                $resultForClient = $resultFromDB;
            } catch(Exception $ex) {
                $resultForClient = $ex;
            }
            $this->returnJson($resultForClient);
        }
        public function getThongTinWebsiteByID(object $dataFromClient) {
            $resultForClient = null;
            try {
                if(!isset($dataFromClient->iD))
                    throw new Exception("Không có đầy đủ thuộc tính yêu cầu");
                $iD = $dataFromClient->iD;
                $resultFromDB = $this->websiteDangTuyenModel->getWebsiteDangTuyenByID($iD);
                $resultForClient = $resultFromDB;
            } catch(Exception $e) {
                $resultForClient = $e;
            }
            $this->returnJson($resultForClient);
        }
        public function updateThongTinWebsiteByID(object $dataFromClient) {
            $resultForClient = null;
            try {
                if(!isset($dataFromClient->iD) || !isset($dataFromClient->linkDangTuyen) || !isset($dataFromClient->thoiGianDangTuyen) || !isset($dataFromClient->ketThucDangTuyen) || !isset($dataFromClient->ghiChu)) 
                    throw new Exception("Không có đầy đủ thuộc tính yêu cầu");
                $iD = $dataFromClient->iD;
                $linkDangTuyen = $dataFromClient->linkDangTuyen;
                $thoiGianDangTuyen = $dataFromClient->thoiGianDangTuyen;
                $ketThucDangTuyen = $dataFromClient->ketThucDangTuyen;
                $ghiChu = $dataFromClient->ghiChu;
                $websiteDangTuyen = new WebsiteDangTuyen($iD, null, $linkDangTuyen, $thoiGianDangTuyen, $ketThucDangTuyen, $ghiChu);
                $resultFromDB = $this->websiteDangTuyenModel->udpateWebsiteDangTuyen($websiteDangTuyen);
                $resultForClient = $resultFromDB;
            }catch(Exception $ex) {
                $resultForClient = $ex;
            }
            $this->returnJson($resultForClient);
        }
        public function deleteThongTinWebsiteByID(object $dataFromClient) {
            $resultForClient = null;
            try {
                if(!isset($dataFromClient->iD))
                    throw new Exception("Không có đầy đủ thuộc tính yêu cầu");
                $iD = $dataFromClient->iD;
                $resultForClient = $this->websiteDangTuyenModel->deleteWebsiteDangTuyenbyID($iD);
            } catch (Exception $e) { 
                $resultForClient = $e;
            }
            $this->returnJson($resultForClient);
        }
    }

    session_start();

    $websiteTuyenDungController = new WebsiteTuyenDungController($_SESSION);
    $websiteTuyenDungController->handleAccessController();

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(!isset($_GET['iDKeHoachTuyenDung'])) {
            echo 'Chưa có iDKeHoachTuyenDung';
            exit();
        }
        $websiteTuyenDungController->showWebsiteTuyenDung((object)['iDKeHoachTuyenDung' => $_GET['iDKeHoachTuyenDung']]);
    }

    $dataFromClientJson = file_get_contents("php://input");
    $dataFromClient = json_decode($dataFromClientJson);

    if(!isset($dataFromClient->action)) {
        header('Content-Type: application/json');
        echo json_encode((object)['isSuccess' => false, 'message' => 'Bạn chưa xác định hành động để xử lý']);
        exit;
    }

    $action = $dataFromClient->action;

    switch($action) {
        case 'getAllThongTinWebsiteByIDKeHoachTuyenDung':
            $websiteTuyenDungController->getAllThongTinWebsiteByIDKeHoachTuyenDung($dataFromClient);
        case 'addOneThongTinWebsite':
            $uuiD = new UUIDVersion1();
            $websiteTuyenDungController->addOneThongTinWebsite($dataFromClient, $uuiD);
        case 'getThongTinWebsiteByID':
            $websiteTuyenDungController->getThongTinWebsiteByID($dataFromClient);
        case 'updateThongTinWebsiteByID':
            $websiteTuyenDungController->updateThongTinWebsiteByID($dataFromClient);
        case 'deleteThongTinWebsiteByID':
            $websiteTuyenDungController->deleteThongTinWebsiteByID($dataFromClient);
        default:
            header('Content-Type: application/json');
            echo json_encode((object)['isSuccess' => false, 'message' => 'Không có hành động xử lý này trong controller']);
            exit;
    }
?>