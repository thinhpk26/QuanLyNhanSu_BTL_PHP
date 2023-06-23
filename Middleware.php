<?php declare(strict_types = 1);
?>

<?php 
    // Khoi tao san cho 2 doi tuong là checkNhanVien, checkTruongPhong, checkChuyenVienTuyenDung và checkQuanLyNhanSu
    // Nếu kiểm tra thì truyền đối tượng đó vào trong tham số của function muốn check
    // Chưa có model nên tạm thời chưa có dữ liệu
    // kiểm tra quyền truy cập
    require_once __DIR__ . '/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    require_once __DIR__ . '/Request.php';
    abstract class AuthMiddleware {
        protected $Session;
        public function __construct(&$Session) {
            $this->Session = $Session;
        }
        
        protected abstract function checkRole() : bool;

        public function handleAccessController() {
            // if(!isset($this->Session['inforUser'])) {
            //     // Điều hướng sang login
            // }
            if(!$this->checkRole()) {
                $result = (object)['isSuccess' => false, 'message' => "Bạn không có quyền truy cập!"];
                header('Content-Type: application/json');
                echo json_encode($result);
                exit();
            }
        }
        protected function returnJson($resultForClient) {
            $result = [];
            if($resultForClient === true) {
                $result = (object)['isSuccess' => true, 'message' => ''];
            } else if($resultForClient instanceof Exception) {
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
            return true;
        }
        
    }

    class TruongPhongAuthMiddleware extends AuthMiddleware {
        
        protected function checkRole() : bool {
            return true;
        }
    }

    class QuanLyNhanSuAuthMiddleware extends AuthMiddleware {
        
        protected function checkRole() : bool {
            return true;
        }
    }

    class KhongXacDinhAuthMiddleWare extends AuthMiddleware {
        protected function checkRole() : bool {
            return true;
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