<?php
    class ChuyenVienDanhGiaPhongVans {
        public $iD;
        public $iDKeHoachPhongVan;
        public $iDTaiKhoan;

        public function __construct($iD = "", $iDKeHoachPhongVan = "", $iDTaiKhoan = "")
        {
            $this->iD = $iD;
            $this->iDKeHoachPhongVan = $iDKeHoachPhongVan;
            $this->iDTaiKhoan = $iDTaiKhoan;
        }
    }
?>