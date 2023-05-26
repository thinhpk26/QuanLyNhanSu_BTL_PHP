<?php
    class UngVien {
    private $maUV;
    private $tenUV;
    private $ngayNop;
    private $sex;
    private $ngaySinh;
    private $queQuan;
    private $email;
    private $sdt;
    private $viTriUngTuyen;
    private $linkAnh;

    // Hàm khởi tạo không tham số
    public function __construct() {
        $this->maUV = "";
        $this->tenUV = "";
        $this->ngayNop = "";
        $this->sex = "";
        $this->ngaySinh = "";
        $this->queQuan = "";
        $this->email = "";
        $this->sdt = "";
        $this->viTriUngTuyen = "";
        $this->linkAnh = "";
    }

    // Hàm khởi tạo có tham số
    public function __construct($maUV, $tenUV, $ngayNop, $sex, $ngaySinh, $queQuan, $email, $sdt, $viTriUngTuyen) {
        $this->maUV = $maUV;
        $this->tenUV = $tenUV;
        $this->ngayNop = $ngayNop;
        $this->sex = $sex;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
        $this->email = $email;
        $this->sdt = $sdt;
        $this->viTriUngTuyen = $viTriUngTuyen;
    }

    // Getter và Setter cho các thuộc tính
    public function getMaUV() {
        return $this->maUV;
    }

    public function setMaUV($maUV) {
        $this->maUV = $maUV;
    }

    public function getTenUV() {
        return $this->tenUV;
    }

    public function setTenUV($tenUV) {
        $this->tenUV = $tenUV;
    }

    public function getNgayNop() {
        return $this->ngayNop;
    }

    public function setNgayNop($ngayNop) {
        $this->ngayNop = $ngayNop;
    }

    public function getSex() {
        return $this->sex;
    }

    public function setSex($sex) {
        $this->sex = $sex;
    }

    public function getNgaySinh() {
        return $this->ngaySinh;
    }

    public function setNgaySinh($ngaySinh) {
        $this->ngaySinh = $ngaySinh;
    }

    public function getQueQuan() {
        return $this->queQuan;
    }

    public function setQueQuan($queQuan) {
        $this->queQuan = $queQuan;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSDT() {
        return $this->sdt;
    }

    public function setSDT($sdt) {
        $this->sdt = $sdt;
    }

    public function getViTriUngTuyen() {
        return $this->viTriUngTuyen;
    }

    public function setViTriUngTuyen($viTriUngTuyen) {
        $this->viTriUngTuyen = $viTriUngTuyen;
    }
        
    public function getLinkAnh() {
        return $this->linkAnh;
    }

    public function setLinkAnh($linkAnh) {
        $this->linkAnh = $linkAnh;
    }
}


?>
