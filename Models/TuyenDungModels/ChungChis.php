<?php
    class ChungChis {
        public $iD;
        public $iDHoSoUngTuyen;
        public $tenChungChi;
        public $anhChungChi;

        public function __construct($iD = "", $iDHoSoUngTuyen = "", $tenChungChi = "", $anhChungChi = "")
        {
            $this->iD = $iD;
            $this->iDHoSoUngTuyen = $iDHoSoUngTuyen;
            $this->tenChungChi = $tenChungChi;
            $this->anhChungChi = $anhChungChi;
        }

    }
?>