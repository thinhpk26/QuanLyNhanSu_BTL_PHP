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
    
    }
    
?>
