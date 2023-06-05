<?php
    class PhongBanModel{
        function __construct($consetup){
            $this->host = $consetup->host;
            $this->user = $consetup->user;
            $this->pass =  $consetup->pass;
            $this->db = $consetup->db;
        }

        public function open_db()
        {
            $this->condb=new mysqli($this->host,$this->user,$this->pass,$this->db);
            if ($this->condb->connect_error)
            {
                die("Erron in connection: " . $this->condb->connect_error);
            }
        }

        public function close_db()
        {
            $this->condb->close();
        } 

        // select record
        public function selectRecord($id)
        {
            try
            {
                $this->open_db();
                if($id>0)
                {
                    $query=$this->condb->prepare("SELECT * FROM phongban WHERE maPB=?");
                    $query->bind_param("s",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM phongban");    }

                $query->execute();
                $res=$query->get_result();
                $query->close();
                $this->close_db();
                return $res;
            }
            catch(Exception $e)
            {
                $this->close_db();
                throw $e;
            }

        }

    }
?>