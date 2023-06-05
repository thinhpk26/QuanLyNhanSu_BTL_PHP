<?php
    class GiayToUngVien {
        public $iD;
        public $CV;
        public $soYeuLyLich;
        public $donXinViec;
        public $CCCD;
        public $giayKhaiSinh;
        public $soHoKhau;
        public $giayKhamSucKhoe;
        public $anh;

        public function __construct($iD = "", $CV = "", $soYeuLyLich = "", $donXinViec = "", $CCCD = "", $giayKhaiSinh = "", $soHoKhau = "", $giayKhamSucKhoe = "", $anh = "")
        {
            $this->iD = $iD;
            $this->CV = $CV;
            $this->soYeuLyLich = $soYeuLyLich;
            $this->donXinViec = $donXinViec;
            $this->CCCD = $CCCD;
            $this->giayKhaiSinh = $giayKhaiSinh;
            $this->soHoKhau = $soHoKhau;
            $this->giayKhamSucKhoe = $giayKhamSucKhoe;
            $this->anh = $anh;
        }
    }
?>