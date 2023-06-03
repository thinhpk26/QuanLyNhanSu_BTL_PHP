<?php
    class LoaiHoSos {
        public $iD;
        public $loaiHoSo;

        public function __construct($iD = "", $loaiHoSo = "")
        {
            $this->iD = $iD;
            $this->loaiHoSo = $loaiHoSo;
        }
    }
?>