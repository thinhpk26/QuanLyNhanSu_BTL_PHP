<?php
    class ViTriTuyen {
        public $iD;
        public $iDViTri;
        public $iDKeHoachTuyenDung;
        public $soLuong;
        public $kyNangCanThiet;

        public function __construct($iD = "", $iDViTri = "", $iDKeHoachTuyenDung = "", $soLuong = 0, $kyNangCanThiet = "")
        {
            $this->iD = $iD;
            $this->iDViTri = $iDViTri;
            $this->iDKeHoachTuyenDung = $iDKeHoachTuyenDung;
            $this->soLuong = $soLuong;
            $this->kyNangCanThiet = $kyNangCanThiet;
        }
    }
?>