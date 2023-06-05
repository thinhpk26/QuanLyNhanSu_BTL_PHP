<?php
    class LoaiHoSo {
        public $iD;
        public $loaiHoSo;

        public function __construct($iD = "", $loaiHoSo = "")
        {
            $this->iD = $iD;
            $this->loaiHoSo = $loaiHoSo;
        }
    }
?>