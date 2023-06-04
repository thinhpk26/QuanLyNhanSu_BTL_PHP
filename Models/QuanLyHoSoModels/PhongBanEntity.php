<?php
    class PhongBanEntity {
        public $maPb;
        public $tenPb;
        public $moTa;
        public $maTruongPhong;
        public $soNv;
        public $soDT;
        public $email;
    
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
    
    }
    
?>