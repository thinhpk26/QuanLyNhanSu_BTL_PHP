<?php
    class NghiViecModel{
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
        public function selectRecord()
        {
            try
            {
                $this->open_db();
                $query=$this->condb->prepare("SELECT nhanvien.maNV, nhanvien.tenNV, nhanvien.email, nhanvien.sdt, nghiviec.ngayNghi FROM nhanvien JOIN nghiviec ON nhanvien.maNV = nghiviec.maNV WHERE nhanvien.tinhTrang = 'Nghi viec'");    
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

        public function insertRecord($obj)
        {
            try
            {
                $this->open_db();
                $query = $this->condb->prepare("INSERT INTO nghiviec (maNV, ngayNghi, lyDo) VALUES (?, ?, ?)");
                $query->bind_param("sss", $obj->maNV, $obj->ngayNghi, $obj->lyDo);
                $query->execute();
                $res= $query->get_result();
                $last_id=$this->condb->insert_id;
                $query->close();
                $this->close_db();
                return $last_id;
            }
            catch (Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }
    }
?>