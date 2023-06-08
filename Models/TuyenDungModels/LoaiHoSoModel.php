<?php declare(strict_types = 1);
    include_once './LoaiHoSo.php';
    include_once './TuyenDungModel.php';
    class LoaiHoSoModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }
        public function addLoaiHoSo(LoaiHoSo $loaiHoSo) : bool {
            try {
                $query = "INSERT INTO LoaiHoSo VALUES(?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ss", $iD, $loai);
                $iD = $loaiHoSo->iD;
                if($iD == "") {
                    $iD = $this->createID();
                }
                $loai = $loaiHoSo->loaiHoSo;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $e) {
                $this->navigateWhenError($e);
                return false;
            }
        }
        public function udpateLoaiHoSobyID(LoaiHoSo $loaiHoSo) : bool {
            try {
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
                $this->navigateWhenError($e);
                return false;
            }
        }
        public function deleteLoaiHoSobyID(string $iD) : bool {
            try {
                $query = "DELETE LoaiHoSo where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $e) {
                $this->navigateWhenError($e);
                return false;
            }
        }
    }

?>