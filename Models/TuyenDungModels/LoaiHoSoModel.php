<?php declare(strict_types = 1);
    require_once 'LoaiHoSo.php';
    require_once 'TuyenDungModel.php';
    class LoaiHoSoModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }
        public function getLoaiHoSoByID($iD) {
            try {
                if(!isset($iD)) throw new Exception("No have iD");
                $query = "select * from LoaiHoSo where iD = '$iD'";
                $this->open_db();
                $result = $this->condb->query($query);
                $loaiHoSo = null;
                if($result->num_rows > 0) {
                    $loaiHoSo = $result->fetch_object();
                }
                $this->close_db();
                return $loaiHoSo;
            } catch (Exception $e) {
                return $e;
            }
        }
        public function addLoaiHoSo($loaiHoSo) {
            try {
                $this->checkHaveParams($loaiHoSo, ['iD', 'loaiHoSo']);
                $query = "INSERT INTO LoaiHoSo VALUES(?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ss", $iD, $loai);
                $iD = $loaiHoSo->iD;
                $loai = $loaiHoSo->loaiHoSo;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $e) {
                return $e;
            }
        }
        public function udpateLoaiHoSobyID($loaiHoSo) {
            try {
                $this->checkHaveParams($loaiHoSo, ['iD', 'loaiHoSo']);
                $query = "UPDATE LoaiHoSo set loaiHoSo = ? where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ss", $loai, $iD);
                $iD = $loaiHoSo->iD;
                $loai = $loaiHoSo->loaiHoSo;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $e) {
                return $e;
            }
        }
        public function deleteLoaiHoSobyID(string $iD) {
            try {
                if(!isset($iD)) throw new Exception("No have iD");
                $query = "DELETE LoaiHoSo where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $e) {
                return $e;
            }
        }
    }

?>