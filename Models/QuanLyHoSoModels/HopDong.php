<?php
    class HopDong {
        private $maHD;
        private $linkHopDong;
        private $loaiHD;
        private $maNV;
        private $daiDien;
        private $ngayKy;
        private $ngayHieuLuc;
        private $ngayHet;
        private $luong;
        private $ngayTra;
        private $phuCap;
        private $baoHiem;
        private $tinhTrangHD;
    
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
    
        // Getter và Setter cho các thuộc tính
        public function getMaHD() {
            return $this->maHD;
        }
    
        public function setMaHD($maHD) {
            $this->maHD = $maHD;
        }
    
        public function getLinkHopDong() {
            return $this->linkHopDong;
        }
    
        public function setLinkHopDong($linkHopDong) {
            $this->linkHopDong = $linkHopDong;
        }
    
        public function getLoaiHD() {
            return $this->loaiHD;
        }
    
        public function setLoaiHD($loaiHD) {
            $this->loaiHD = $loaiHD;
        }
    
        public function getMaNV() {
            return $this->maNV;
        }
    
        public function setMaNV($maNV) {
            $this->maNV = $maNV;
        }
    
        public function getDaiDien() {
            return $this->daiDien;
        }
    
        public function setDaiDien($daiDien) {
            $this->daiDien = $daiDien;
        }
    
        public function getNgayKy() {
            return $this->ngayKy;
        }
    
        public function setNgayKy($ngayKy) {
            $this->ngayKy = $ngayKy;
        }
    
        public function getNgayHieuLuc() {
            return $this->ngayHieuLuc;
        }
    
        public function setNgayHieuLuc($ngayHieuLuc) {
            $this->ngayHieuLuc = $ngayHieuLuc;
        }
    
        public function getNgayHet() {
            return $this->ngayHet;
        }
    
        public function setNgayHet($ngayHet) {
            $this->ngayHet = $ngayHet;
        }
    
        public function getLuong() {
            return $this->luong;
        }
    
        public function setLuong($luong) {
            $this->luong = $luong;
        }
    
        public function getNgayTra() {
            return $this->ngayTra;
        }
    
        public function setNgayTra($ngayTra) {
            $this->ngayTra = $ngayTra;
        }
    
        public function getPhuCap() {
            return $this->phuCap;
        }
    
        public function setPhuCap($phuCap) {
            $this->phuCap = $phuCap;
        }
    
        public function getBaoHiem() {
            return $this->baoHiem;
        }
    
        public function setBaoHiem($baoHiem) {
            $this->baoHiem = $baoHiem;
        }
    
        public function getTinhTrangHD() {
            return $this->tinhTrangHD;
        }
    
        public function setTinhTrangHD($tinhTrangHD) {
            $this->tinhTrangHD = $tinhTrangHD;
        }
    }
    
?>