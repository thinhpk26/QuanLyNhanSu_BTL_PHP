<?php declare(strict_types = 1);
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Middleware.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/QuanLyNhanSu_BTL_PHP/Request.php';
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/TaiKhoanModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/Models/QuanLyHoSoModels/NhanVienModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/QuanLyNhanSu_BTL_PHP/config.php";
    class DangNhapController extends KhongXacDinhAuthMiddleWare {
        private TaiKhoanModel $taiKhoanModel;
        private NhanVienModel $nhanVienModel;
        public function __construct(&$Session) {
            parent::__construct($Session);
            $this->initDAO();
        }
        private function initDAO() {
            $this->taiKhoanModel = new TaiKhoanModel(new config());
            $this->nhanVienModel = new NhanVienModel(new config());
        }
        public function login($dataFromClient) {
            if(!isset($dataFromClient['username']) || !isset($dataFromClient['password'])) {
                $this->returnJson(new Exception("No have username or password"));
            }
            $resultForClient = null;
            try {
                $resultForClient = $this->taiKhoanModel->findAccountByUsernameAndPassword($dataFromClient['username'], $dataFromClient['password']);
                if($resultForClient !== null) {
                    $inforUser = $this->nhanVienModel->getNhanVienByIDTaiKhoan($resultForClient->maNV);
                    $this->Session['inforUser'] = $inforUser;
                    $this->Session['account'] = $resultForClient;
                    if($resultForClient->loaiTk === "quanLyNhanSu") {
                        $resultForClient = "/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/KeHoachTuyenDungPage.php";
                    } else if($resultForClient->loaiTk === "truongPhong") {
                        $resultForClient = "/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/DeNghiTuyenDung/deNghiTuyenDung.php";
                    } else if($resultForClient->loaiTk === "nhanVien"){
                        $resultForClient = "/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/DeNghiTuyenDung/deNghiTuyenDung.php";
                    }
                } else {
                    throw new Exception("Sai tài khoản hoặc mật khẩu");
                }
            } catch(Exception $ex) {
                $resultForClient = $ex;
            }
            $this->returnJson($resultForClient);
        }

        public function logout() {
            unset($this->Session['inforUser']);
            unset($this->Session['account']);
            header("location: /QuanLyNhanSu_BTL_PHP");
        }
    }
    session_start();
    $dangNhapController = new DangNhapController($_SESSION);
    $dangNhapController->handleAccessController();
    
    if(!isset($_POST['action'])) {
        header("Content-Type: application/json");
        echo json_encode((object)['isSuccess' => false, "message" => "No have action"]);
        exit;
    }
    $action = $_POST['action'];
    switch($action) {
        case 'login':
            $dangNhapController->login($_POST);
            break;
        case 'logout':
            $dangNhapController->logout();
        default:
            header("Content-Type: application/json");
            echo json_encode((object)['isSuccess' => false, "message" => "No understand action"]);
            exit;
    }
?>