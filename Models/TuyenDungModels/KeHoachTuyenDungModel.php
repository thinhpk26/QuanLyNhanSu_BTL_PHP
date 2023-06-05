<?php declare(strict_types = 1);
    include_once './KeHoachTuyenDung.php';
    include_once './TuyenDungModel.php';
    class KeHoachTuyenDungModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }
        public function getKeHoachTuyenDungByiD(string $iD) : array {
            try {
                $query = "SELECT * from KeHoachTuyenDung where iD = '$iD'";
                $this->open_db();
                $result = $this->condb->query($query);
                $keHoachTuyenDungList = array();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $keHoachTuyenDungList[] = $row;
                    }
                    $keHoachTuyenDungList;
                }
                $this->close_db();
                return $keHoachTuyenDungList;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllKeHoachTuyenDung() : array {
            try {
                $query = "SELECT * from KeHoachTuyenDung";
                $this->open_db();
                $result = $this->condb->query($query);
                $keHoachTuyenDungList = array();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $keHoachTuyenDungList[] = $row;
                    }
                    $keHoachTuyenDungList;
                }
                $this->close_db();
                return $keHoachTuyenDungList;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        } 

        public function addKeHoachTuyenDung(KeHoachTuyenDung $keHoachTuyenDung) : bool {
            try {
                $query = "INSERT INTO KeHoachTuyenDung VALUES (?,?,?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ssss", $iD, $thoiGianTrienKhai, $trangThaiGiaiDoan, $ghiChu);
                $iD = $keHoachTuyenDung->iD;
                if($keHoachTuyenDung->iD == "") {
                    $iD = $this->createID();
                }
                $thoiGianTrienKhai =  $this->fromStringToDatetime($keHoachTuyenDung->thoiGianTrienKhai);
                $trangThaiGiaiDoan = $keHoachTuyenDung->trangThaiGiaiDoan;
                $ghiChu = $keHoachTuyenDung->ghiChu;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function updateKeHoachTuyenDung(KeHoachTuyenDung $keHoachTuyenDung) : bool {
            try {
                $query = "UPDATE KeHoachTuyenDung set thoiGianTrienKhai = ?, trangThaiGiaiDoan = ?, ghiChu = ? where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ssss", $thoiGianTrienKhai, $trangThaiGiaiDoan, $ghiChu, $iD);
                $iD = $keHoachTuyenDung->iD;
                $thoiGianTrienKhai =  $this->fromStringToDatetime($keHoachTuyenDung->thoiGianTrienKhai);
                $trangThaiGiaiDoan = $keHoachTuyenDung->trangThaiGiaiDoan;
                $ghiChu = $keHoachTuyenDung->ghiChu;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function deleteKeHoachTuyenDungbyID(string $iD) : bool {
            try {
                $query = "DELETE FROM KeHoachTuyenDung where iD = ?";
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

    $heHoachTuyenDung = new KeHoachTuyenDung("", "2012-09-04", "chuaXacNhan", "khong");

    $keHoachTuyenDungModel = new KeHoachTuyenDungModel();

    $keHoachTuyenDungModel->addKeHoachTuyenDung($heHoachTuyenDung);



?>