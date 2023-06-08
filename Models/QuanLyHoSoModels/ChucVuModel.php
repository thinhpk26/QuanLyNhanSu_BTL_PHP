<?php
    class ChucVuModel{
        function __construct($consetup){
            $this->hostname = $consetup->hostname;
            $this->username = $consetup->username;
            $this->password =  $consetup->password;
            $this->database = $consetup->database;
        }

        public function open_db()
        {
            $this->condb=new mysqli($this->hostname,$this->username,$this->password,$this->database);
            if ($this->condb->connect_error)
            {
                die("Erron in connection: " . $this->condb->connect_error);
            }
        }

        public function close_db()
        {
            $this->condb->close();
        } 

        public function selectRecord($id)
        {
            try
            {
                $this->open_db();
                if($id>0)
                {
                    $query=$this->condb->prepare("SELECT * FROM chucvu WHERE maChucVu=?");
                    $query->bind_param("s",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM chucVu");    }

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
