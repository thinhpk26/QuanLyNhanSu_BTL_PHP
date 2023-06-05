<?php
    class KeHoachTuyenDung {
        public $iD;
        public $thoiGianTrienKhai;
        public $trangThaiGiaiDoan;
        public $ghiChu;

        public function __construct($iD = "", $thoiGianTrienKhai = "", $trangThaiGiaiDoan = "", $ghiChu = "")
        {
            $this->iD = $iD;
            $this->thoiGianTrienKhai = $thoiGianTrienKhai;
            $this->trangThaiGiaiDoan = $trangThaiGiaiDoan;
            $this->ghiChu = $ghiChu;
        }
    }
?>