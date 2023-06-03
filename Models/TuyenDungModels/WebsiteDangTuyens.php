<?php
    class WebsiteDangTuyens {
        public $iD;
        public $iDKeHoachTuyenDung;
        public $linkDangTuyen;
        public $thoiGianDangTuyen;
        public $ketThucDangTuyen;
        public $ghiChu;

        public function __construct($iD = "", $iDKeHoachTuyenDung = "", $linkDangTuyen = "", $thoiGianDangTuyen = "", $ketThucDangTuyen = "", $ghiChu = "")
        {
            $this->iD = $iD;
            $this->iDKeHoachTuyenDung = $iDKeHoachTuyenDung;
            $this->linkDangTuyen = $linkDangTuyen;
            $this->thoiGianDangTuyen = $thoiGianDangTuyen;
            $this->ketThucDangTuyen = $ketThucDangTuyen;
            $this->ghiChu = $ghiChu;
        }
    }
?>