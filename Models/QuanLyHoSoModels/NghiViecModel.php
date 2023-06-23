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
                $query=$this->condb->prepare("SELECT nhanvien.maNV, nhanvien.tenNV, nhanvien.email, nhanvien.sdt, nghiviec.ngayNghi FROM nhanvien JOIN nghiviec ON nhanvien.maNV = nghiviec.maNV WHERE nhanvien.tinhTrang = ?");    
                $tinhTrangNV = 'Đã nghỉ việc';
                $query->bind_param("s",$tinhTrangNV);    
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

        public function searchOldEmployee($maNV1, $tenNV1, $tenPB1, $queQuan1, $chucVu1, $chuyenMon1)
        {
            $this->open_db();
            $sql = "SELECT * FROM nhanvien JOIN nghiviec ON nhanvien.maNV = nghiviec.maNV WHERE ";

            if (!empty($maNV1)) {
                $sql .= " nhanvien.maNV='$maNV1' AND ";
            }
            
            if (!empty($tenNV1)) {
                $sql .= " nhanvien.tenNV='$tenNV1' AND";
            }
            
            if (!empty($chucVu1)) {
                $sql .= " nhanvien.maChucVu='$chucVu1' AND";
            }
            
            if (!empty($queQuan1)) {
                $sql .= " nhanvien.queQuan='$queQuan1' AND";
            }
            
            if (!empty($tenPB1)) {
                $sql .= " nhanvien.maPb='$tenPB1' AND";
            }
            
            if (!empty($chuyenMon1)) {
                $sql .= " nhanvien.chuyenMon='$chuyenMon1' AND";
            }

            $tinhTrangNV = 'Đã nghỉ việc';
            $sql .= " nhanvien.tinhTrang='$tinhTrangNV' AND";
            
            // Loại bỏ khoảng trắng và "AND" cuối cùng
            $sql = rtrim($sql, " AND");
            

            $query = $this->condb->prepare($sql);


            $query->execute();

            $employees = $query->get_result();
            $query->close();
            $this->close_db();
            return $employees;
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