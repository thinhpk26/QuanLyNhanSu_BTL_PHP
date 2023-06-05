<?php
    class HoSoUngTuyen {
        public $iD;
        public $iDKeHoachTuyenDung;
        public $iDKeHoachPhongVan;
        public $hoTen;
        public $email;
        public $soDT;
        public $diaChi;
        public $ngaySinh;
        public $ghiChu;

        public function __construct($iD = "", $iDKeHoachPhongVan = "", $iDKeHoachTuyenDung = "", $hoTen = "", $email = "", $soDT = "", $diaChi = "", $ngaySinh = "", $ghiChu = "")
        {
            $this->iD = $iD;
            $this->iDKeHoachPhongVan = $iDKeHoachPhongVan;
            $this->iDKeHoachTuyenDung = $iDKeHoachTuyenDung;
            $this->hoTen = $hoTen;
            $this->email = $email;
            $this->soDT = $soDT;
            $this->diaChi = $diaChi;
            $this->ngaySinh = $ngaySinh;
            $this->ghiChu = $ghiChu;
        }
    }
?>