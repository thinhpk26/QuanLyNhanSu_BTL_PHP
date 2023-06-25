<?php declare(strict_types = 1);
?>

<?php 
    // Khoi tao san cho 2 doi tuong là checkNhanVien, checkTruongPhong, checkChuyenVienTuyenDung và checkQuanLyNhanSu
    // Nếu kiểm tra thì truyền đối tượng đó vào trong tham số của function muốn check
    // Chưa có model nên tạm thời chưa có dữ liệu
    // kiểm tra quyền truy cập
    require_once __DIR__ . '/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    require_once __DIR__ . '/Models/QuanLyHoSoModels/TaiKhoanModel.php';
    require_once __DIR__ . '/config.php';
    require_once __DIR__ . '/Request.php';
    abstract class AuthMiddleware {
        protected $Session;
        protected TaiKhoanModel $taiKhoan;
        public function __construct(&$Session) {
            $this->Session = &$Session;
            $this->taiKhoan = new TaiKhoanModel(new config());
        }
        
        protected abstract function checkRole() : bool;

        public function handleAccessController() {
            if(!isset($this->Session['inforUser']) || !$this->checkRole()) {
                header('location: /QuanLyNhanSu_BTL_PHP');
                exit;
            }
        }
        protected function returnJson($resultForClient) {
            $result = [];
            if($resultForClient === true) {
                $result = (object)['isSuccess' => true, 'message' => ''];
            }else if($resultForClient instanceof Exception) {
                $result = (object)['isSuccess' => false, 'message' => $resultForClient->getMessage()];
            } else {
                $result = (object)['isSuccess' => true, 'message' => '', 'data' => $resultForClient];
            }
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    class NhanVienAuthMiddleware extends AuthMiddleware{
        protected function checkRole() : bool {
            $currAccount = $this->Session['account'];
            $accountInDB = $this->taiKhoan->findAccountByUsernameAndPassword($currAccount->username, $currAccount->password);
            if($accountInDB === null || $accountInDB->loaiTk !== "nhanVien") {
                return false;
            }
            return true;
        }
    }

    class TruongPhongAuthMiddleware extends AuthMiddleware {
        
        protected function checkRole() : bool {
            $currAccount = $this->Session['account'];
            $accountInDB = $this->taiKhoan->findAccountByUsernameAndPassword($currAccount->username, $currAccount->password);
            if($accountInDB === null || $accountInDB->loaiTk !== "truongPhong") {
                return false;
            }
            return true;
        }
    }

    class QuanLyNhanSuAuthMiddleware extends AuthMiddleware {
        
        protected function checkRole() : bool {
            $currAccount = $this->Session['account'];
            $accountInDB = $this->taiKhoan->findAccountByUsernameAndPassword($currAccount->username, $currAccount->password);
            if($accountInDB === null || $accountInDB->loaiTk !== "quanLyNhanSu") {
                return false;
            }
            return true;
        }
    }

    class KhongXacDinhAuthMiddleWare extends AuthMiddleware {
        protected function checkRole() : bool {
            return true;
        }
        public function handleAccessController() {
        }
    }

    interface UUID {
        public function setID(string $UUID);
        public function getID();
    }

    class UUIDVersion1 implements UUID {
        private string $UUID;
        public function __construct() {
            $this->UUID = substr(uniqid(), 0, 13);
        }
        public function setID(string $UUID) {
            $this->UUID = $UUID;
        }
        public function getID() {
            return $this->UUID;
        }
    }

?>