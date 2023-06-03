<?php
    class ViTriTuyens {
        public $iD;
        public $iDViTri;
        public $soLuong;
        public $kyNangCanThiet;

        public function __construct($iD = "", $iDViTri = "", $soLuong = 0, $kyNangCanThiet = "")
        {
            $this->iD = $iD;
            $this->iDViTri = $iDViTri;
            $this->soLuong = $soLuong;
            $this->kyNangCanThiet = $kyNangCanThiet;
        }
    }
?>