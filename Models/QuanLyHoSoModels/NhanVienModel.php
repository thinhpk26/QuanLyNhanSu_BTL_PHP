<?php
    class NhanVienModel{
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
                    $query=$this->condb->prepare("SELECT * FROM nhanvien WHERE maNV=?");
                    $query->bind_param("s",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM nhanvien");    }

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

        public function searchEmployees($maNV1, $tenNV1, $tenPB1, $queQuan1, $chucVu1, $chuyenMon1) {
            $this->open_db();
            $sql = "SELECT * FROM nhanvien WHERE";

            if (!empty($maNV1)) {
                $sql .= " maNV='$maNV1' AND ";
            }
            
            if (!empty($tenNV1)) {
                $sql .= " tenNV='$tenNV1' AND";
            }
            
            if (!empty($chucVu1)) {
                $sql .= " maChucVu='$chucVu1' AND";
            }
            
            if (!empty($queQuan1)) {
                $sql .= " queQuan='$queQuan1' AND";
            }
            
            if (!empty($tenPB1)) {
                $sql .= " maPb='$tenPB1' AND";
            }
            
            if (!empty($chuyenMon1)) {
                $sql .= " chuyenMon='$chuyenMon1' AND";
            }
            
            // Loại bỏ khoảng trắng và "AND" cuối cùng
            $sql = rtrim($sql, " AND");
            

            $query = $this->condb->prepare($sql);


            $query->execute();

            $employees = $query->get_result();
            $query->close();
            $this->close_db();
            return $employees;
        }
        

        // insert record
        public function insertRecord($obj)
        {
            try
            {
                $this->open_db();
                $query = $this->condb->prepare("INSERT INTO nhanvien (maNV, tenNV, tuoi, gioiTinh, ngaySinh, sdt, email, queQuan, diaChi, honNhan, maPb, maChucVu, trinhDo, chuyenMon, danToc, quocTich, soCMND, linkCMND, hoKhau, linkHoKhau, linkBangCap, linkGiayKhaiSinh, nganHang, soTK, maSoThue, tinhTrang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $query->bind_param("ssisssssssssssssssssssssss", $obj->maNV, $obj->tenNV, $obj->tuoi, $obj->gioiTinh, $obj->ngaySinh, $obj->sdt, $obj->email, $obj->queQuan, $obj->diaChi, $obj->honNhan, $obj->maPb, $obj->maChucVu, $obj->trinhDo, $obj->chuyenMon, $obj->danToc, $obj->quocTich, $obj->soCMND, $obj->linkCMND, $obj->hoKhau, $obj->linkHoKhau, $obj->linkBangCap, $obj->linkGiayKhaiSinh, $obj->nganHang, $obj->soTK, $obj->maSoThue, $obj->tinhTrang);
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
                $query = $this->condb->prepare("UPDATE nhanvien SET tenNV = ?, tuoi = ?, gioiTinh = ?, ngaySinh = ?, sdt = ?, email = ?, queQuan = ?, diaChi = ?, honNhan = ?, maPb = ?, maChucVu = ?, trinhDo = ?, chuyenMon = ?, danToc = ?, quocTich = ?, soCMND = ?, linkCMND = ?, hoKhau = ?, linkHoKhau = ?, linkBangCap = ?, linkGiayKhaiSinh = ?, nganHang = ?, soTK = ?, maSoThue = ?, tinhTrang = ? WHERE maNV = ?");
                $query->bind_param("sssssssssssssssssssssssssi", $obj->tenNV, $obj->tuoi, $obj->gioiTinh, $obj->ngaySinh, $obj->sdt, $obj->email, $obj->queQuan, $obj->diaChi, $obj->honNhan, $obj->maPb, $obj->maChucVu, $obj->trinhDo, $obj->chuyenMon, $obj->danToc, $obj->quocTich, $obj->soCMND, $obj->linkCMND, $obj->hoKhau, $obj->linkHoKhau, $obj->linkBangCap, $obj->linkGiayKhaiSinh, $obj->nganHang, $obj->soTK, $obj->maSoThue, $obj->tinhTrang, $obj->maNV);
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
        // delete record
        public function deleteRecord($id)
        {
            try{
                $this->open_db();
                $query=$this->condb->prepare("DELETE FROM nhanvien WHERE maNV=?");
                $query->bind_param("i",$id);
                $query->execute();
                $res=$query->get_result();
                $query->close();
                $this->close_db();
                return true;
            }
            catch (Exception $e)
            {
                $this->closeDb();
                throw $e;
            }
        }

        // Thịnh thêm phương thức để setCookie
        public function getNhanVienByIDTaiKhoan($maNV) {
            try {
                $nhanVien = null;
                $this->open_db();
                $query = "SELECT * FROM nhanvien where maNV = '$maNV'";
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    $nhanVien = $result->fetch_object();
                }
                $this->close_db();
                return $nhanVien;
            }catch(Exception $e) {
                return $e;
            }
        }
    }
?>
