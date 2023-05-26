<?php
    class NhanVien {
        private $maNV;
        private $tenNV;
        private $tuoi;
        private $gioiTinh;
        private $ngaySinh;
        private $sdt;
        private $email;
        private $queQuan;
        private $diaChi;
        private $honNhan;
        private $maPb;
        private $maChucVu;
        private $trinhDo;
        private $chuyenMon;
        private $danToc;
        private $quocTich;
        private $soCMND;
        private $linkCMND;
        private $hoKhau;
        private $linkHoKhau;
        private $linkBangCap;
        private $linkGiayKhaiSinh;
        private $nganHang;
        private $soTK;
        private $maSoThue;
        private $tinhTrang;
        private $linkAnh;
    
        // Hàm khởi tạo không tham số
        public function __construct() {
            $this->maNV = "";
            $this->tenNV = "";
            $this->tuoi = 0;
            $this->gioiTinh = "";
            $this->ngaySinh = "";
            $this->sdt = "";
            $this->email = "";
            $this->queQuan = "";
            $this->diaChi = "";
            $this->honNhan = "";
            $this->maPb = "";
            $this->maChucVu = "";
            $this->trinhDo = "";
            $this->chuyenMon = "";
            $this->danToc = "";
            $this->quocTich = "";
            $this->soCMND = "";
            $this->linkCMND = "";
            $this->hoKhau = "";
            $this->linkHoKhau = "";
            $this->linkBangCap = "";
            $this->linkGiayKhaiSinh = "";
            $this->nganHang = "";
            $this->soTK = "";
            $this->maSoThue = "";
            $this->tinhTrang = "";
        }
    
        // Getter và Setter cho các thuộc tính
        public function getMaNV() {
            return $this->maNV;
        }
    
        public function setMaNV($maNV) {
            $this->maNV = $maNV;
        }
    
        public function getTenNV() {
            return $this->tenNV;
        }
    
        public function setTenNV($tenNV) {
            $this->tenNV = $tenNV;
        }
    
        public function getTuoi() {
            return $this->tuoi;
        }
    
        public function setTuoi($tuoi) {
            $this->tuoi = $tuoi;
        }
    
        public function getGioiTinh() {
            return $this->gioiTinh;
        }
    
        public function setGioiTinh($gioiTinh) {
            $this->gioiTinh = $gioiTinh;
        }
    
        public function getNgaySinh() {
            return $this->ngaySinh;
        }
    
        public function setNgaySinh($ngaySinh) {
            $this->ngaySinh = $ngaySinh;
        }
    
        public function getSDT() {
            return $this->sdt;
        }
        
        public function setSDT($sdt) {
            $this->sdt = $sdt;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function getQueQuan() {
            return $this->queQuan;
        }
    
        public function setQueQuan($queQuan) {
            $this->queQuan = $queQuan;
        }
    
        public function getDiaChi() {
            return $this->diaChi;
        }
    
        public function setDiaChi($diaChi) {
            $this->diaChi = $diaChi;
        }
    
        public function getHonNhan() {
            return $this->honNhan;
        }
    
        public function setHonNhan($honNhan) {
            $this->honNhan = $honNhan;
        }
    
        public function getMaPb() {
            return $this->maPb;
        }
    
        public function setMaPb($maPb) {
            $this->maPb = $maPb;
        }
    
        public function getMaChucVu() {
            return $this->maChucVu;
        }
    
        public function setMaChucVu($maChucVu) {
            $this->maChucVu = $maChucVu;
        }
    
        public function getTrinhDo() {
            return $this->trinhDo;
        }
    
        public function setTrinhDo($trinhDo) {
            $this->trinhDo = $trinhDo;
        }
    
        public function getChuyenMon() {
            return $this->chuyenMon;
        }
    
        public function setChuyenMon($chuyenMon) {
            $this->chuyenMon = $chuyenMon;
        }
        
    
        public function getDanToc() {
            return $this->danToc;
        }
    
        public function setDanToc($danToc) {
            $this->danToc = $danToc;
        }
    
        public function getQuocTich() {
            return $this->quocTich;
        }
    
        public function setQuocTich($quocTich) {
            $this->quocTich = $quocTich;
        }
    
        public function getSoCMND() {
            return $this->soCMND;
        }
    
        public function setSoCMND($soCMND) {
            $this->soCMND = $soCMND;
        }
    
        public function getLinkCMND() {
            return $this->linkCMND;
        }
    
        public function setLinkCMND($linkCMND) {
            $this->linkCMND = $linkCMND;
        }
    
        public function getHoKhau() {
            return $this->hoKhau;
        }
    
        public function setHoKhau($hoKhau) {
            $this->hoKhau = $hoKhau;
        }
    
        public function getLinkHoKhau() {
            return $this->linkHoKhau;
        }
    
        public function setLinkHoKhau($linkHoKhau) {
            $this->linkHoKhau = $linkHoKhau;
        }
    
        public function getLinkBangCap() {
            return $this->linkBangCap;
        }
    
        public function setLinkBangCap($linkBangCap) {
            $this->linkBangCap = $linkBangCap;
        }
    
        public function getLinkGiayKhaiSinh() {
            return $this->linkGiayKhaiSinh;
        }
    
        public function setLinkGiayKhaiSinh($linkGiayKhaiSinh) {
            $this->linkGiayKhaiSinh = $linkGiayKhaiSinh;
        }
    
        public function getNganHang() {
            return $this->nganHang;
        }
    
        public function setNganHang($nganHang) {
            $this->nganHang = $nganHang;
        }
    
        public function getSoTK() {
            return $this->soTK;
        }
    
        public function setSoTK($soTK) {
            $this->soTK = $soTK;
        }
    
        public function getMaSoThue() {
            return $this->maSoThue;
        }
    
        public function setMaSoThue($maSoThue) {
            $this->maSoThue = $maSoThue;
        }
    
        public function getTinhTrang() {
            return $this->tinhTrang;
        }
    
        public function setTinhTrang($tinhTrang) {
            $this->tinhTrang = $tinhTrang;
        }
        
        public function getLinkAnh() {
            return $this->linkAnh;
        }

        public function setLinkAnh($linkAnh) {
            $this->linkAnh = $linkAnh;
        }
    }
    
?>
