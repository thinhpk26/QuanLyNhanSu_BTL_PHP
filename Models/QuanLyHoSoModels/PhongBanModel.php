<?php
    class PhongBanModel{
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

        // select record
        public function selectRecord($id)
        {
            try
            {
                $this->open_db();
                if($id>0)
                {
                    $query=$this->condb->prepare("SELECT * FROM phong_ban WHERE maPb=?");
                    $query->bind_param("s",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM phong_ban");    }

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

        public function getPhongBanByMaNV(string $maNV) {
            try {
                $query = "select taikhoan.*, phongban.* from taikhoan join nhanvien on taikhoan.maNV = nhanvien.maNV
                join phongban on phongban.maPb = nhanvien.maPb where taikhoan.maNV = '$maNV'";
                $this->open_db();
                $resultFromDB = $this->condb->query($query);
                $result = null;
                if($resultFromDB->num_rows > 0) {
                    While($row = $resultFromDB->fetch_object()) {
                        $result = $row;
                    }
                }
                $this->close_db();
                return $result;
            } catch(Exception $ex) {
                return $ex;
            }
        }

    }
?>
