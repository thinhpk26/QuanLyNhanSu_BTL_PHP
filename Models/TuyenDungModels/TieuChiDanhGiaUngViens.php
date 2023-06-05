<?php
    class TieuChiDanhGiaUngVien {
        public $iD;
        public $tieuChi;

        public function __construct($iD = "", $tieuChi = "")
        {
            $this->iD = $iD;
            $this->tieuChi = $tieuChi;
        }
    }
?>