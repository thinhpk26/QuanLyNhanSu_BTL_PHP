<?php
    class PhongBan {
        private $maPb;
        private $tenPb;
        private $moTa;
        private $maTruongPhong;
        private $soNv;
        private $soDT;
        private $email;
    
        // Hàm khởi tạo không tham số
        public function __construct() {
            $this->maPb = "";
            $this->tenPb = "";
            $this->moTa = "";
            $this->maTruongPhong = "";
            $this->soNv = 0;
            $this->soDT = "";
            $this->email = "";
        }
    
        // Hàm khởi tạo có tham số
        public function __construct($maPb, $tenPb, $moTa, $maTruongPhong, $soNv, $soDT, $email) {
            $this->maPb = $maPb;
            $this->tenPb = $tenPb;
            $this->moTa = $moTa;
            $this->maTruongPhong = $maTruongPhong;
            $this->soNv = $soNv;
            $this->soDT = $soDT;
            $this->email = $email;
        }
    
        // Getter và Setter cho thuộc tính maPb
        public function getMaPb() {
            return $this->maPb;
        }
    
        public function setMaPb($maPb) {
            $this->maPb = $maPb;
        }
    
        // Getter và Setter cho thuộc tính tenPb
        public function getTenPb() {
            return $this->tenPb;
        }
    
        public function setTenPb($tenPb) {
            $this->tenPb = $tenPb;
        }
    
        // Getter và Setter cho thuộc tính moTa
        public function getMoTa() {
            return $this->moTa;
        }
    
        public function setMoTa($moTa) {
            $this->moTa = $moTa;
        }
    
        // Getter và Setter cho thuộc tính maTruongPhong
        public function getMaTruongPhong() {
            return $this->maTruongPhong;
        }
    
        public function setMaTruongPhong($maTruongPhong) {
            $this->maTruongPhong = $maTruongPhong;
        }
    
        // Getter và Setter cho thuộc tính soNv
        public function getSoNv() {
            return $this->soNv;
        }
    
        public function setSoNv($soNv) {
            $this->soNv = $soNv;
        }
    
        // Getter và Setter cho thuộc tính soDT
        public function getSoDT() {
            return $this->soDT;
        }
    
        public function setSoDT($soDT) {
            $this->soDT = $soDT;
        }
    
        // Getter và Setter cho thuộc tính email
        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
    }
    
?>