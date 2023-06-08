<?php
    class UngVienModel{
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
                    $query=$this->condb->prepare("SELECT * FROM ungvien WHERE maUV=?");
                    $query->bind_param("s",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM ungvien");    }

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

        public function searchCandidate($maUV1, $tenUV1, $vtUT1, $queQuan1, $email1, $sdt1, $ngayNop1) {
            $this->open_db();
            $sql = "SELECT * FROM ungvien WHERE";

            if (!empty($maUV1)) {
                $sql .= " maUV='$maUV1' AND ";
            }
            
            if (!empty($tenUV1)) {
                $sql .= " tenUV='$tenUV1' AND";
            }
            
            if (!empty($sdt1)) {
                $sql .= " sdt='$sdt1' AND";
            }
            
            if (!empty($queQuan1)) {
                $sql .= " queQuan='$queQuan1' AND";
            }
            
            if (!empty($email1)) {
                $sql .= " email='$email1' AND";
            }
            
            if (!empty($ngayNop1)) {
                $sql .= " ngayNop='$ngayNop1' AND";
            }

            if (!empty($vtUT1)) {
                $sql .= " viTriUngTuyen='$vtUT1' AND";
            }
            
            // Loại bỏ khoảng trắng và "AND" cuối cùng
            $sql = rtrim($sql, " AND");
            

            $query = $this->condb->prepare($sql);


            $query->execute();

            $candidates = $query->get_result();
            $query->close();
            $this->close_db();
            return $candidates;
        }

        public function insertRecord($obj)
        {
            try
            {
                $this->open_db();
                $query = $this->condb->prepare("INSERT INTO ungvien (maUV, tenUV, ngayNop, sex, ngaySinh, sdt, email, queQuan, viTriUngTuyen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $query->bind_param("ssisssssssssssssssssssssss", $obj->maUV, $obj->tenUV, $obj->ngayNop, $obj->sex, $obj->ngaySinh, $obj->sdt, $obj->email, $obj->queQuan, $obj->viTriUngTuyen

            );
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

         // delete record
         public function deleteRecord($id)
         {
             try{
                 $this->open_db();
                 $query=$this->condb->prepare("DELETE FROM ungvien WHERE maUV=?");
                 $query->bind_param("s",$id);
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
    }
?>
