<?php
    class ChucVu {
        private $maChucVu;
        private $tenChucVu;
    
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
    
        // Getter và Setter cho thuộc tính maChucVu
        public function getMaChucVu() {
            return $this->maChucVu;
        }
    
        public function setMaChucVu($maChucVu) {
            $this->maChucVu = $maChucVu;
        }
    
        // Getter và Setter cho thuộc tính tenChucVu
        public function getTenChucVu() {
            return $this->tenChucVu;
        }
    
        public function setTenChucVu($tenChucVu) {
            $this->tenChucVu = $tenChucVu;
        }
    }
    
?>