<!-- Khoi tao san cho 2 doi tuong là checkNhanVien, checkTruongPhong, checkChuyenVienTuyenDung và checkQuanLyNhanSu -->
<!-- Nếu kiểm tra thì truyền đối tượng đó vào trong tham số của function muốn check -->
<!-- Chưa có model nên tạm thời chưa có dữ liệu -->
<?php
    interface CheckRole {
        public function checkRole();
    }


    class CheckNhanVien implements CheckRole {
        public function checkRole()
        {
            return false;
        }
    }

    class CheckQuanLyNhanSu implements CheckRole {
        public function checkRole()
        {
            return false;
        }
    }

    class CheckTruongPhong implements CheckRole {
        public function checkRole()
        {
            return false;
        }
    }

    class CheckChuyenVienTuyenDung implements CheckRole {
        public function checkRole()
        {
            return false;
        }
    }

    // Ví dụ về checkrole
    function test(CheckRole $test) {
        return $test->checkRole();
    }

    $t = new CheckTruongPhong();

    echo $t->checkRole();

?>