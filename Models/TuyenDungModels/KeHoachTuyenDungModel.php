<?php declare(strict_types = 1);
    include_once 'KeHoachTuyenDung.php';
    include_once 'TuyenDungModel.php';
    class KeHoachTuyenDungModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }
        public function getKeHoachTuyenDungByiD(string $iD) {
            $keHoachTuyenDung = new KeHoachTuyenDung();
            try {
                $query = "SELECT * from KeHoachTuyenDung where iD = '$iD'";
                $this->open_db();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $keHoachTuyenDung = $row;
                    }
                }
                $this->close_db();
                return $keHoachTuyenDung;
            } catch(Exception $ex) {
                return $ex;
            }
        }

        public function getAllKeHoachTuyenDung(){
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
                return $ex;
            }
        }

        public function getAllKeHoachWithChuaXacNhan() {
            try {
                $query = "SELECT * from KeHoachTuyenDung where trangThaiGiaiDoan = 'chuaXacNhan'";
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
                return $ex;
            }
        }

        public function getAllKeHoachWithDangThucThi() {
            try {
                $query = "SELECT * from KeHoachTuyenDung where trangThaiGiaiDoan = 'dangThucThi'";
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
                return $ex;
            }
        }

        public function addKeHoachTuyenDung(KeHoachTuyenDung $keHoachTuyenDung) {
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
                return $ex;
            }
        }

        public function updateKeHoachTuyenDungByiD(string $iD, string $thoiGianTrienKhai, string $ghiChu) {
            try {
                $query = "UPDATE KeHoachTuyenDung set thoiGianTrienKhai = ?, ghiChu = ? where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sss", $thoiGianTrienKhai, $ghiChu, $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }
        }

        public function updateTrangThaiGiaiDoan(string $iD, string $trangThaiGiaiDoan) {
            try {
                $query = "UPDATE KeHoachTuyenDung set trangThaiGiaiDoan = ?where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ss", $trangThaiGiaiDoan, $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }
        }

        public function deleteKeHoachTuyenDungbyID(string $iD) {
            try {
                $query = "DELETE FROM KeHoachTuyenDung where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            }catch(Exception $ex) {
                return $ex;
            }
        }
    }

?>