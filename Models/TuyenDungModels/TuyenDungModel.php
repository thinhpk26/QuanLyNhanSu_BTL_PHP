<?php
    class TuyenDungModel {
        public mysqli $condb;
        public $host;
        public $pass;
        public $user;
        public $db;

        function __construct($consetup) {
            $this->host = $consetup->host;
            $this->user = $consetup->user;
            $this->pass = $consetup->pass;
            $this->db = $consetup->db;
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
    }
?>