<?php
    class config {
        private $hostname;
        private $username;
        private $password;
        private $database;
        private $conn;

        function __construct()
        {
            $this->hostname = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->database = "QuanLyNhanSu";
        }

        public function opendb() {
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
            
            if($this->conn->connect_error) {
                die("Loi ket noi server");
            }
        }

        public function closedb() {
            $this->conn->close();
        }
    }
?>