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
        protected Request $request;
        protected array $methods;
        protected abstract function checkRole() : bool;
        //kỹ thuật tạo file như là 1 action của controller
        public function handle()
        {
            if(!$this->checkRole() || !$this->checkMethod()) {
                // header('Location: /QuanLyNhanSu_BTL_PHP/Views/ErrorPage.php');
                $result = (object)['isSuccess' => false, 'message' => "Không được phép tiếp cận"];
                header('Content-Type: application/json');
                echo json_encode($result);
                exit();
            }
        }
        // Kỹ thuật tạo 1 controller và action trong 1 file duy nhất và điều hướng
        public function handleVersion2() { 
            if(!$this->checkRole()) {
                $result = (object)['isSuccess' => false, 'message' => "Bạn không có quyền truy cập!"];
                header('Content-Type: application/json');
                echo json_encode($result);
                exit();
            }
        }
        public function checkMeThodVersion2(array $methodList) {
            foreach($methodList as $method) {
                if(strcasecmp($this->request->method, $method) == 0) {
                    return true;
                }
            }
            return false;
        }
        protected function checkMethod() : bool {
            foreach($this->methods as $method) {
                if(strcasecmp($this->request->method, $method) == 0) {
                    return true;
                }
            }
            return false;
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
        public function __construct(Request $request, array $methods)
        {
            $this->request = $request;
            $this->methods = $methods;
        }
        
        protected function checkRole() : bool {
            return true;
        }
        
    }

    class TruongPhongAuthMiddleware extends AuthMiddleware {
        public function __construct(Request $request, array $methods)
        {
            $this->request = $request;
            $this->methods = $methods;
        }
        
        protected function checkRole() : bool {
            return true;
        }
    }

    class QuanLyNhanSuAuthMiddleware extends AuthMiddleware {
        public function __construct(Request $request, array $methods)
        {
            $this->request = $request;
            $this->methods = $methods;
        }
        
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