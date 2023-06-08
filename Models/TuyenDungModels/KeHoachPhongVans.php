<?php
    class KeHoachPhongVans {
        public $iD;
        public $thoiGianPhongVan;
        public $diaDiemPhongVan;
        public $xacNhanKeHoach;

        public function __construct($iD = "", $thoiGianPhongVan = "", $diaDiemPhongVan = "", $xacNhanKeHoach = false)
        {
            $this->iD = $iD;
            $this->thoiGianPhongVan = $thoiGianPhongVan;
            $this->diaDiemPhongVan = $diaDiemPhongVan;
            $this->xacNhanKeHoach = $xacNhanKeHoach;
        }
    }
?>