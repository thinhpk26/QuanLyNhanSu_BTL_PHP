<?php
    class UngVienEntity {
        public $maUV;
        public $tenUV;
        public $ngayNop;
        public $sex;
        public $ngaySinh;
        public $queQuan;
        public $email;
        public $sdt;
        public $viTriUngTuyen;

        // Hàm khởi tạo không tham số
        public function __construct() {
            $this->maUV = "";
            $this->tenUV = "";
            $this->ngayNop = "";
            $this->sex = "";
            $this->ngaySinh = "";
            $this->queQuan = "";
            $this->email = "";
            $this->sdt = "";
            $this->viTriUngTuyen = "";
        }

        // Hàm khởi tạo có tham số
        public function __construct($maUV, $tenUV, $ngayNop, $sex, $ngaySinh, $queQuan, $email, $sdt, $viTriUngTuyen) {
            $this->maUV = $maUV;
            $this->tenUV = $tenUV;
            $this->ngayNop = $ngayNop;
            $this->sex = $sex;
            $this->ngaySinh = $ngaySinh;
            $this->queQuan = $queQuan;
            $this->email = $email;
            $this->sdt = $sdt;
            $this->viTriUngTuyen = $viTriUngTuyen;
        }

}


?>
