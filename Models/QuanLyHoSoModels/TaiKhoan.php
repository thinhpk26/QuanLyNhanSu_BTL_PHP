<?php
    class TaiKhoan {
        private $maNV;
        private $username;
        private $password;
        private $loaiTk;
    
        // Hàm khởi tạo không tham số
        public function __construct() {
            $this->maNV = "";
            $this->username = "";
            $this->password = "";
            $this->loaiTk = "";
        }
    
        // Getter và Setter cho các thuộc tính
        public function getMaNV() {
            return $this->maNV;
        }
    
        public function setMaNV($maNV) {
            $this->maNV = $maNV;
        }
    
        public function getUsername() {
            return $this->username;
        }
    
        public function setUsername($username) {
            $this->username = $username;
        }
    
        public function getPassword() {
            return $this->password;
        }
    
        public function setPassword($password) {
            $this->password = $password;
        }
    
        public function getLoaiTk() {
            return $this->loaiTk;
        }
    
        public function setLoaiTk($loaiTk) {
            $this->loaiTk = $loaiTk;
        }
    }
    
?>