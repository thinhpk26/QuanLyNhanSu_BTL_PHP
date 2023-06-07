<?php
    require_once __DIR__ . '/Models/QuanLyHoSoModels/TaiKhoanEntity.php';
    class Request {
        public TaiKhoanEntity $taiKhoan;
        public string $method;
        public function __construct(TaiKhoanEntity $taiKhoan, string $method = "get")
        {
            $this->taiKhoan = $taiKhoan; 
            $this->method = $method;
        }
    }
?>