<?php
    class HopDongEntity {
        public $maHD;
        public $linkHopDong;
        public $loaiHD;
        public $maNV;
        public $daiDien;
        public $ngayKy;
        public $ngayHieuLuc;
        public $ngayHet;
        public $luong;
        public $ngayTra;
        public $phuCap;
        public $baoHiem;
        public $tinhTrangHD;
    
        // Hàm khởi tạo không tham số
        public function __construct() {
            $this->maHD = "";
            $this->linkHopDong = "";
            $this->loaiHD = "";
            $this->maNV = "";
            $this->daiDien = "";
            $this->ngayKy = "";
            $this->ngayHieuLuc = "";
            $this->ngayHet = "";
            $this->luong = "";
            $this->ngayTra = 0;
            $this->phuCap = "";
            $this->baoHiem = "";
            $this->tinhTrangHD = "";
        }
    
        
    }
    
?>