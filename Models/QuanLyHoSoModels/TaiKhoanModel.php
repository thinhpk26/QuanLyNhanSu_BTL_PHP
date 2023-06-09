<?php
    class TaiKhoanModel{
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
                    $query=$this->condb->prepare("SELECT * FROM taikhoan WHERE maNV=?");
                    $query->bind_param("s",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM taikhoan");    }

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

        public function searchContract($maNV1, $username1, $password1, $loaiTk1) {
            $this->open_db();
            $sql = "SELECT * FROM taikhoan WHERE";

            if (!empty($maNV1)) {
                $sql .= " maHD='$maNV1' AND ";
            }
            
            if (!empty($username1)) {
                $sql .= " username='$username1' AND";
            }
            
            if (!empty($password1)) {
                $sql .= " password='$password1' AND";
            }
            
            if (!empty($loaiTk1)) {
                $sql .= " loaiTk='$loaiTk1' AND";
            }
            
            // Loại bỏ khoảng trắng và "AND" cuối cùng
            $sql = rtrim($sql, " AND");
            

            $query = $this->condb->prepare($sql);


            $query->execute();

            $accounts = $query->get_result();
            $query->close();
            $this->close_db();
            return $accounts;
        }
        

        // insert record
        public function insertRecord($obj)
        {
            try
            {
                $this->open_db();
                $query = $this->condb->prepare("INSERT INTO hopdong (maNV, username, passwords, loaiTk) VALUES (?, ?, ?, ?);");
                $query->bind_param("ssss", $obj->maNV, $obj->username, $obj->passwords, $obj->loaiTk);
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
                $query = $this->condb->prepare("UPDATE username = ?, passwords=?, loaiTk=? WHERE maNV = ?");
                $query->bind_param("ssss", $obj->maNV, $obj->username, $obj->passwords, $obj->loaiTk);
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

        // Thịnh thêm phục vụ cho login
        public function findAccountByUsernameAndPassword($username, $password) {
            try {
                $account = null;
                $this->open_db();
                $query = "SELECT * FROM TaiKhoan where username='$username' and password='$password'";
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    $account = $result->fetch_object();
                }
                $this->close_db();
                return $account;
            }catch(Exception $ex) {
                return $ex;
            }
        }
    }
?>
