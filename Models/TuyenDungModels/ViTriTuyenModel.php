<?php declare(strict_types = 1);
    include_once './ViTriTuyen.php';
    include_once './TuyenDungModel.php';
    class ViTriTuyenModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }

        public function getViTriTuyenByiD(string $iD) : array {
            try {
                $query = "SELECT * from ViTriTuyen where iD = '$iD'";
                $this->open_db();
                $result = $this->condb->query($query);
                $viTriTuyenList = array();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $viTriTuyenList[] = $row;
                    }
                }
                $this->close_db();
                return $viTriTuyenList;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllViTriTuyenByiDKeHoachTuyenDung(string $iDKeHoachTuyenDung) : array {
            try {
                $query = "SELECT * from ViTriTuyen where iDKeHoachTuyenDung = '$iDKeHoachTuyenDung'";
                $this->open_db();
                $result = $this->condb->query($query);
                $viTriTuyenList = array();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $viTriTuyenList[] = $row;
                    }
                }
                $this->close_db();
                return $viTriTuyenList;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function addViTriTuyen(ViTriTuyen $viTriTuyen) : bool {
            try {
                $query = "INSERT INTO ViTriTuyen VALUES (?,?,?,?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sssis", $iD, $iDViTri, $iDKeHoachTuyenDung, $soLuong, $kyNangCanThiet);
                $iD = $viTriTuyen->iD;
                if($viTriTuyen->iD == "") {
                    $iD = $this->createID();
                }
                $iDViTri =  $viTriTuyen->iDViTri;
                $iDKeHoachTuyenDung = $viTriTuyen->iDKeHoachTuyenDung;
                $soLuong = $viTriTuyen->soLuong;
                $kyNangCanThiet = $viTriTuyen->kyNangCanThiet;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function updateViTriTuyen(ViTriTuyen $viTriTuyen) : bool {
            try {
                $query = "UPDATE ViTriTuyen set soLuong = ?, kyNangCanThiet = ? where iD  = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("iss", $soLuong, $kyNangCanThiet, $iD);
                $iD = $viTriTuyen->iD;
                $soLuong = $viTriTuyen->soLuong;
                $kyNangCanThiet = $viTriTuyen->kyNangCanThiet;
                $pttm->execute();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function deleteViTriTuyenbyID(string $iD) : bool {
            try {
                $query = "DELETE FROM ViTriTuyen where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            }catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }
    }
?>