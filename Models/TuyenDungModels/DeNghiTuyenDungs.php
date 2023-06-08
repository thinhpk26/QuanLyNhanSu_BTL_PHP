<?php
    class DeNghiTuyenDungs {
        public $iD;
        public $iDPhongBan;
        public $noiDung;
        public $phanHoi;

        public function __construct($iD = "", $iDPhongBan = "", $noiDung = "", $phanHoi = "")
        {
            $this->iD = $iD;
            $this->iDPhongBan = $iDPhongBan;
            $this->noiDung = $noiDung;
            $this->phanHoi = $phanHoi;
        }
    }
?>