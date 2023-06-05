<?php declare(strict_types = 1);
?>
<!-- Khoi tao san cho 2 doi tuong là checkNhanVien, checkTruongPhong, checkChuyenVienTuyenDung và checkQuanLyNhanSu -->
<!-- Nếu kiểm tra thì truyền đối tượng đó vào trong tham số của function muốn check -->
<!-- Chưa có model nên tạm thời chưa có dữ liệu -->
<?php 
    // kiểm tra quyền truy cập
    include_once __DIR__ . '/Models/QuanLyHoSoModels/TaiKhoan.php';
    include_once __DIR__ . '/Request.php';
    abstract class AuthMiddleware {
        protected Request $request;
        protected array $methods;
        protected abstract function checkRole() : bool;
        public function handle()
        {
            if(!$this->checkRole() || !$this->checkMethod()) {
                // header('Location: /QuanLyNhanSu_BTL_PHP/Views/ErrorPage.php');
                echo "Khong duoc phep tiep can";
                exit();
            }
        }
        protected function checkMethod() : bool {
            foreach($this->methods as $method) {
                if(strcasecmp($this->request->method, $method) == 0) {
                    return true;
                }
            }
            return false;
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


    $taiKhoan = new TaiKhoan();

    // Request gồm những gì
    $request = new Request($taiKhoan, "get");

    // Đặt middleware trước controller nếu request không được chấp nhận sẽ tự động chuyển đến trang lỗi
    $quanLyNhanSuMiddleware = new QuanLyNhanSuAuthMiddleware($request, ["get"]);
    $quanLyNhanSuMiddleware->handle();

?>