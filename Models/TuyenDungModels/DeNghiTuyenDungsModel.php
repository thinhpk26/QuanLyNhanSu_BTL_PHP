<?php declare(strict_types = 1);
    require_once('TuyenDungModel.php');
    require_once('DeNghiTuyenDungs.php');
    class DeNghiTuyenDungsModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }

        public function getAllDeNghiTuyenDungByIDPhongBan(string $iDPhongBan) : array {
            try {
                $this->open_db();
                $query = "select * from DeNghiTuyenDung where iDPhongBan = '$iDPhongBan'";
                $result = $this->condb->query($query);
                $deNghiTuyenDunglist = array();
                if($result->num_rows > 0) {
                    While($row = $result->fetch_object()) {
                        $deNghiTuyenDunglist[] = $row;
                    }
                }
                $this->close_db();
                return $deNghiTuyenDunglist;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllDeNghiTuyenDungWithoutPhanHoi() : array {
            try {
                $this->open_db();
                $query = "select * from DeNghiTuyenDung where phanHoi is null";
                $result = $this->condb->query($query);
                $deNghiTuyenDunglist = array();
                if($result->num_rows > 0) {
                    While($row = $result->fetch_object()) {
                        $deNghiTuyenDunglist[] = $row;
                    }
                }
                $this->close_db();
                return $deNghiTuyenDunglist;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }
        
        public function addDeNghiTuyenDung(DeNghiTuyenDungs $deNghiTuyenDung) : bool {
            try {
                $this->open_db();
                $stmt = $this->condb->prepare("INSERT INTO denghituyenDung values (?,?,?,?)");
                $stmt->bind_param("ssss", $iD, $iDPhongBan, $noiDung, $phanHoi);
                $iD = $deNghiTuyenDung->iD;
                if($iD == "") {
                    $iD = $this->createID();
                }
                $iDPhongBan = $deNghiTuyenDung->iDPhongBan; 
                $noiDung = $deNghiTuyenDung->noiDung;
                $phanHoi = $deNghiTuyenDung->phanHoi;
                $stmt->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function updateDeNghiTuyenDung(DeNghiTuyenDungs $deNghiTuyenDung) {
            try {
                $this->open_db();
                $stmt = $this->condb->prepare("udpate denghituyenDung set iDPhongBan = ?, noiDung = ?, phanHoi = ? where iD = ?");
                $stmt->bind_param("ssss", $iDPhongBan, $noiDung, $phanHoi, $iD);
                $iD = $deNghiTuyenDung->iD;
                $iDPhongBan = $deNghiTuyenDung->iDPhongBan; 
                $noiDung = $deNghiTuyenDung->noiDung;
                $phanHoi = $deNghiTuyenDung->phanHoi;
                $stmt->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }   
        }

        public function updatePhanHoiTuyenDung(string $iD, string $phanHoi) {
            try {
                $this->open_db();
                $stmt = $this->condb->prepare("udpate denghituyenDung set phanHoi = ? where iD = ?");
                $stmt->bind_param("ss", $phanHoi, $iD);
                $stmt->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }   
        }


    }

    // test correct
    // $inforDb = new stdClass();
    // $inforDb->host = 'localhost';
    // $inforDb->pass = '';
    // $inforDb->user = 'root';
    // $inforDb->db = 'quanlynhansu';
    // $deNghiTuyenDungModel = DeNghiTuyenDungsModel::withDifferentHost($inforDb);

    // $deNghiTuyenDung = new DeNghiTuyenDungs("sdfdd", "mapb01", "sfdsd", "");


    // $deNghiTuyenDungList = $deNghiTuyenDungModel->getAllDeNghiTuyenDungByIDPhongBan($deNghiTuyenDung->iDPhongBan);

    // foreach($deNghiTuyenDungList as $deNghiTuyenDungIndex) {
    //     echo $deNghiTuyenDungIndex->iD.$deNghiTuyenDungIndex->iDPhongBan.$deNghiTuyenDungIndex->noiDung.$deNghiTuyenDungIndex->phanHoi;
    // }
?>