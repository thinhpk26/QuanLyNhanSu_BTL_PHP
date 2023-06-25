<?php declare(strict_types = 1);
    require_once "./KeHoachPhongVan.php";
    class KeHoachPhongVanModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }
        public function getKeHoachPhongVanByID($iDKeHoachPhongVan) {
            try {
                $query = "Select * from KeHoachPhongVan where id = '$iDKeHoachPhongVan'";
                $keHoachPhongVan = null;
                $this->open_db();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    $keHoachPhongVan = $result->fetch_object();
                }
                $this->close_db();
                return $keHoachPhongVan;
            } catch(Exception $ex) {
                return $ex;
            }
        }
        public function addKeHoachPhongVan(KeHoachPhongVan $keHoachPhongVan) {
            try {
                $this->checkHaveParams($keHoachPhongVan, ['iD', 'thoiGianPhongVan', 'diaDiemPhongVan', 'xacNhanKeHoach']);
                $query = "INSERT INTO KeHoachPhongVan values (?,?,?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sssi", $iD, $thoiGianPhongVan, $diaDiemPhongVan, $xacNhanKeHoach);
                $iD = $keHoachPhongVan->iD;
                $thoiGianPhongVan = $keHoachPhongVan->thoiGianPhongVan;
                $diaDiemPhongVan = $keHoachPhongVan->diaDiemPhongVan;
                $xacNhanKeHoach = $keHoachPhongVan->xacNhanKeHoach;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }
        }
        public function updateKeHoachPhongVan(KeHoachPhongVan $keHoachPhongVan) {

        }
    }

?>