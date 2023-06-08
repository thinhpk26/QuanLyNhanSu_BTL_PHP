<?php
    class BanDanhGiaUngViens {
        public $iD;
        public $iDHoSoUngVien;
        public $iDChuyenVienDanhGia;
        public $ghiChu;

        public function __construct($iD = "", $iDChuyenVienDanhGia = "", $iDHoSoUngVien = "", $ghiChu = "")
        {
            $this->iD = $iD;
            $this->iDChuyenVienDanhGia = $iDChuyenVienDanhGia;
            $this->iDHoSoUngVien = $iDHoSoUngVien;
            $this->ghiChu = $ghiChu;
        }
    }
?>