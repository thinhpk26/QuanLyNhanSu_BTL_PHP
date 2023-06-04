<?php
    class ChucVuEntity {
        public $maChucVu;
        public $tenChucVu;
    
        // Hàm khởi tạo không tham số
        public function __construct() {
            $this->maChucVu = "";
            $this->tenChucVu = "";
        }
    
        // Hàm khởi tạo có tham số
        public function __construct($maChucVu, $tenChucVu) {
            $this->maChucVu = $maChucVu;
            $this->tenChucVu = $tenChucVu;
        }
    }
    
?>