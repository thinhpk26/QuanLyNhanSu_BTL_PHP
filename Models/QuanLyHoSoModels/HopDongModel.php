<?php
    class HopDongModel{
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
                    $query=$this->condb->prepare("SELECT * FROM hopdong WHERE maHD=?");
                    $query->bind_param("s",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM hopdong");    }

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
        
        public function selectRecordNV($id)
        {
            try
            {
                $this->open_db();
            
                $query=$this->condb->prepare("SELECT * FROM hopdong WHERE maNV=?");
                $query->bind_param("s",$id);

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

        public function searchContract($maHD1, $maNV1, $tinhTrangHopDong1, $daiDien1) {
            $this->open_db();
            $sql = "SELECT * FROM hopdong WHERE";

            if (!empty($maHD1)) {
                $sql .= " maHD='$maHD1' AND ";
            }
            
            if (!empty($maNV1)) {
                $sql .= " maNV='$maNV1' AND";
            }
            
            if (!empty($tinhTrangHopDong1)) {
                $sql .= " tinhTrangHD='$tinhTrangHopDong1' AND";
            }
            
            if (!empty($daiDien1)) {
                $sql .= " daiDien='$daiDien1' AND";
            }
            
            // Loại bỏ khoảng trắng và "AND" cuối cùng
            $sql = rtrim($sql, " AND");
            

            $query = $this->condb->prepare($sql);


            $query->execute();

            $contracts = $query->get_result();
            $query->close();
            $this->close_db();
            return $contracts;
        }
        

        // insert record
        public function insertRecord($obj)
        {
            try
            {
                $this->open_db();
                $query = $this->condb->prepare("INSERT INTO hopdong (maHD, linkHopDong, loaiHD, maNV, daiDien, ngayKy, ngayHieuLuc, ngayHet, luong, ngayTra, phuCap, baoHiem, tinhTrangHD) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
                $query->bind_param("ssssssssisiss", $obj->maHD, $obj->linkHopDong, $obj->loaiHD, $obj->maNV, $obj->daiDien, $obj->ngayKy, $obj->ngayHieuLuc, $obj->ngayHet, $obj->luong, $obj->ngayTra, $obj->phuCap, $obj->baoHiem, $obj->tinhTrangHD);
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
        //update record
        public function updateRecord($obj)
        {
            try
            {
                $this->open_db();
                $query = $this->condb->prepare("UPDATE hopdong SET linkHopDong = ?, loaiHD = ?, maNV = ?, daiDien = ?, ngayKy = ?, ngayHieuLuc = ?, ngayHet = ?, luong = ?, ngayTra = ?, phuCap = ?, baoHiem = ?, tinhTrangHD = ? WHERE maHD = ?");
                $query->bind_param("sssssssdddsss", $obj->maHD, $obj->linkHopDong, $obj->loaiHD, $obj->maNV, $obj->daiDien, $obj->ngayKy, $obj->ngayHieuLuc, $obj->ngayHet, $obj->luong, $obj->ngayTra, $obj->phuCap, $obj->baoHiem, $obj->tinhTrangHD);
                $query->execute();
                $res=$query->get_result();
                $query->close();
                $this->close_db();
                return true;
            }
            catch (Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }

        public function resetRecord($id)
        {
            try
            {
                $this->open_db();
                $tt = 'Đã Hủy';
                $query = $this->condb->prepare("UPDATE hopdong SET tinhTrangHD = ? WHERE maNV = ?");
                $query->bind_param("ss", $tt, $id);
                $query->execute();
                $res=$query->get_result();
                $query->close();
                $this->close_db();
                return true;
            }
            catch (Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }
    }
?>
