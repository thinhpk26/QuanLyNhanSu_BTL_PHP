<?php
    include_once __DIR__ . '/Models/QuanLyHoSoModels/TaiKhoan.php';
    class Request {
        public TaiKhoan $taiKhoan;
        public string $method;
        public function __construct(TaiKhoan $taiKhoan, string $method = "get")
        {
            $this->taiKhoan = $taiKhoan; 
            $this->method = $method;
        }
    }
?>