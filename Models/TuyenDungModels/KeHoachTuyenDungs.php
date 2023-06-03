<?php
    class KeHoachTuyenDungs {
        public $iD;
        public $thoiGianTrienKhai;
        public $trangThaiGiaiDoan;
        public $ghiChu;

        public function __construct($iD = "", $thoiGianTrienKhai = "", $trangThaiGiaiDoan = "", $ghiChu = "")
        {
            $iD = $iD;
            $thoiGianTrienKhai = $thoiGianTrienKhai;
            $trangThaiGiaiDoan = $trangThaiGiaiDoan;
            $ghiChu = $ghiChu;
        }
    }
?>