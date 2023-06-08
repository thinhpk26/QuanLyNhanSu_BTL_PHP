<?php
    class ChiTietDanhGia {
        public $iD;
        public $iDTieuChi;
        public $iDBanDanhGiaUngVien;
        public $xepHang;

        public function __construct($iD = "", $iDTieuChi = "", $iDBanDanhGiaUngVien = "", $xepHang = 0)
        {
            $this->iD = $iD;
            $this->iDTieuChi = $iDTieuChi;
            $this->iDBanDanhGiaUngVien = $iDBanDanhGiaUngVien;
            $this->xepHang = $xepHang;
        }
    }
?>