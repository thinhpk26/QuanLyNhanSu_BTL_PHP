<?php declare(strict_types = 1);
?>
<!-- Khoi tao san cho 2 doi tuong là checkNhanVien, checkTruongPhong, checkChuyenVienTuyenDung và checkQuanLyNhanSu -->
<!-- Nếu kiểm tra thì truyền đối tượng đó vào trong tham số của function muốn check -->
<!-- Chưa có model nên tạm thời chưa có dữ liệu -->
<?php 
    // kiểm tra quyền truy cập
    include_once __DIR__ . '/Models/QuanLyHoSoModels/TaiKhoan.php';
    include_once __DIR__ . '/Request.php';
    interface AuthInterface {
        public function handle();
    }

    class NhanVienAuthMiddleware implements AuthInterface {
        private Request $request;
        private array $methods;

        public function __construct(Request $request, array $methods)
        {
            $this->request = $request;
            $this->methods = $methods;
        }

        private function checkRole() : bool
        {

            // Thiếu phần này
            return true;
        }
        
        public function handle()
        {
            if(!$this->checkRole() || $this->checkMethod()) {
                header('Location: /QuanLyNhanSu_BTL_PHP/Views/ErrorPage.php');
            }
        }

        private function checkMethod() : bool {
            foreach($this->methods as $method) {
                if(strcasecmp($this->request->method, $method) == 0) {
                    return true;
                }
            }
            return false;
        }
    }

    class QuanLyNhanSuAuthMiddleware implements AuthInterface {
        private Request $request;
        private array $methods;

        public function __construct(Request $request, array $methods)
        {
            $this->request = $request;
            $this->methods = $methods;
        }

        private function checkRole() : bool
        {

            // Thiếu phần này
            return false;
        }
        
        public function handle()
        {
            if(!$this->checkRole() || $this->checkMethod()) {
                header('Location: /Views/ErrorPage.php');
                exit();
            }
        }

        private function checkMethod() : bool {
            foreach($this->methods as $method) {
                if(strcasecmp($this->request->method, $method) == 0) {
                    return true;
                }
            }
            return false;
        }
    }

    $taiKhoan = new TaiKhoan();

    $request = new Request($taiKhoan, "get");

    $quanLyNhanSuMiddleware = new QuanLyNhanSuAuthMiddleware($request, ["get"]);

    $quanLyNhanSuMiddleware->handle();

?>