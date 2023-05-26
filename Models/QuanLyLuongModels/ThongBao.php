<?php
class ThongBao {
    public $NoiDungTB;
    public $NgayTB;
    public $HanTB;
    public $MaNV;
    public $MaPhong;
    
    public function __construct() {
        $this->NoiDungTB = "";
        $this->NgayTB = "";
        $this->HanTB = "";
        $this->MaNV = "";
        $this->MaPhong = "";
    }
    
    public function sendNotification() {
        // Logic để gửi thông báo
        echo "Gửi thông báo: " . $this->NoiDungTB;
    }
    
    public function validate() {
        // Logic để kiểm tra tính hợp lệ của thông báo
        if (empty($this->NoiDungTB)) {
            echo "Thông báo không được để trống.";
        }
    }
    
    public function setNoiDung($noiDung) {
        $this->NoiDungTB = $noiDung;
    }
    
    public function getNoiDung() {
        return $this->NoiDungTB;
    }
}
?>
