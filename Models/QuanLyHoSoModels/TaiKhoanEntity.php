<?php
    class TaiKhoanEntity {
        public $maNV;
        public $username;
        public $password;
        public $loaiTk;
    
        // Hàm khởi tạo không tham số
        public function __construct() {
            $this->maNV = "";
            $this->username = "";
            $this->password = "";
            $this->loaiTk = "";
        }
    
    }
    
?>