<?php declare(strict_types = 1);
    require_once 'TuyenDungModel.php';
    require_once 'ChungChi.php';
    class ChungChiModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }

        public function getChungChibyiDHoSoUngTuyen(string $iDHoSoUngTuyen) {
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
                return $ex;
            }
        }

        public function addChungChi(ChungChi $chungChi) {
            try {
                $this->checkHaveParams($chungChi, ['iD', 'tenChungChi', 'anhChungChi']);
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
                return $ex;
            }
        }

        public function addMultiChungChi(array $chungChiList) {
            try {
                $query = "";
                $this->open_db();
                for($i=0; $i<count($chungChiList); $i++) {
                    $this->checkHaveParams($chungChiList[$i], ['iD', 'tenChungChi', 'anhChungChi']);
                    $iD = $chungChiList[$i]->iD;
                    $iDHoSoUngTuyen = $chungChiList[$i]->iDHoSoUngTuyen;
                    $tenChungChi = $chungChiList[$i]->tenChungChi;
                    $anhChungChi = $chungChiList[$i]->anhChungChi;
                    $query .= "INSERT INTO chungChi values ('$iD', '$iDHoSoUngTuyen', '$tenChungChi', '$anhChungChi')";
                }
                $resultFromDB = $this->condb->multi_query($query);
                if($resultFromDB !== true) {
                    throw new Exception("Lỗi: " . $this->condb->error);
                }
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }
        }

        public function udpateChungChibyID(ChungChi $chungChi) {
            try {
                $this->checkHaveParams($chungChi, ['iD', 'tenChungChi', 'anhChungChi']);
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
                return $ex;
            }
        }

        public function deleteChungChibyID(string $iD) {
            try {
                $query = "DELETE FROM ChungChi where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }
        }
        public function deleteChungChibyIDHOSoUngTuyen(string $iD) {
            try {
                $query = "DELETE FROM ChungChi where iDHoSoUngTuyen = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch(Exception $ex) {
                return $ex;
            }
        }
    } 


?>