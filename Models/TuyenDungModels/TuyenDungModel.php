<?php declare(strict_types=1);
    class TuyenDungModel {
        public mysqli $condb;
        public $host;
        public $pass;
        public $user;
        public $db;

        function __construct() {
            $this->host = 'localhost';
            $this->pass = '';
            $this->user = 'root';
            $this->db = 'quanlynhansu';
        }

        public function open_db() {
            $this->condb = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if($this->condb->connect_error) {
                die("Error in connection: ".$this->condb->connect_error);
            }
        }

        public function close_db() {
            $this->condb->close(); 
        }

        public function navigateWhenError(Exception $ex) {
            $this->close_db();
            header('Location: /QuanLyNhanSu_BTL_PHP/Views/ErrorPage.php');
            exit();
        }

        public function fromStringToDatetime(string $datetimeString) : string {
            echo $datetimeString;
            $date = new DateTime($datetimeString);
            return $date->format('Y-m-d H:i:s');
        }

        public function createID() : string {
            return substr(uniqid(), 0, 13);
        }
    }
?>