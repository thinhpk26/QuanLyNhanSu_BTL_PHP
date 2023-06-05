<?php declare(strict_types = 1);
    include_once './TuyenDungModel.php';
    include_once './ChungChi.php';
    class ChungChiModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }

        public function getChungChibyiDHoSoUngTuyen(string $iDHoSoUngTuyen) : array {
            try {
                $query = "SELECT * FROM chungChi where iDHoSoUngTuyen = '$iDHoSoUngTuyen'";
                $this->open_db();
                $chungChiList = array();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while ($row = $result->fetch_object()) {
                        $chungChiList[] = $row;
                    }
                }
                $this->close_db();
                return $chungChiList;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function addChungChi(ChungChi $chungChi) : bool {
            try {
                $query = "INSERT INTO chungChi values (?,?,?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ssss", $iD, $iDHoSoUngTuyen, $tenChungChi, $anhChungChi);
                $iD = $chungChi->iD;
                $iDHoSoUngTuyen = $chungChi->iDHoSoUngTuyen;
                $tenChungChi = $chungChi->tenChungChi;
                $anhChungChi = $chungChi->anhChungChi;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function udpateChungChibyID(ChungChi $chungChi) : bool {
            try {
                $query = "UPDATE chungChi set tenChungChi = ?, anhChungChi = ? where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sss", $tenChungChi, $anhChungChi, $iD);
                $iD = $chungChi->iD;
                $tenChungChi = $chungChi->tenChungChi;
                $anhChungChi = $chungChi->anhChungChi;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function deleteChungChibyID(string $iD) : bool {
            try {
                $query = "DELETE FROM ChungChi where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }
        public function deleteChungChibyIDHOSoUngTuyen(string $iD) : bool {
            try {
                $query = "DELETE FROM ChungChi where iDHoSoUngTuyen = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }
    } 


?>