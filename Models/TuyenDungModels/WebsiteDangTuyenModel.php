<?php declare(strict_types=1);
    include_once 'TuyenDungModel.php';
    include_once 'WebsiteDangTuyen.php';
    class WebsiteDangTuyenModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }
        public function getAllWebsiteDangTuyen() : array {
            try {
                $query = "Select * from websiteDangTuyen";
                $this->open_db();
                $result = $this->condb->query($query);
                $websiteDangTuyen = array();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $websiteDangTuyen[] = $row;
                    }
                }
                $this->close_db();
                return $websiteDangTuyen;
            } catch (Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllWebsiteDangTuyenbyIDKeHoachTuyenDung(string $iDKeHoachTuyenDung) : array {
            try {
                $query = "Select * from websiteDangTuyen where iDKeHoachTuyenDung = '$iDKeHoachTuyenDung'";
                $this->open_db();
                $result = $this->condb->query($query);
                $websiteDangTuyen = array();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $websiteDangTuyen[] = $row;
                    }
                }
                $this->close_db();
                return $websiteDangTuyen;
            } catch (Exception $ex) {
                $this->navigateWhenError($ex);
                return [];
            }
        }
        
        public function addWebsiteDangTuyen(WebsiteDangTuyen $websiteDangTuyen) : bool {
            try {
                $query = "INSERT INTO WebsiteDangTuyen value (?,?,?,?,?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("ssssss", $iD, $iDKeHoachTuyenDung, $linkDangTuyen, $thoiGianDangTuyen, $ketThucDangTuyen, $ghiChu);
                $iD = $websiteDangTuyen->iD;
                if($iD == "") {
                    $iD = $this->createID();
                }
                $iDKeHoachTuyenDung = $websiteDangTuyen->iDKeHoachTuyenDung;
                $linkDangTuyen = $websiteDangTuyen->linkDangTuyen;
                $thoiGianDangTuyen = $this->fromStringToDatetime($websiteDangTuyen->thoiGianDangTuyen);
                $ketThucDangTuyen = $this->fromStringToDatetime($websiteDangTuyen->ketThucDangTuyen);
                $ghiChu = $websiteDangTuyen->ghiChu;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function udpateWebsiteDangTuyen(WebsiteDangTuyen $websiteDangTuyen) : bool {
            try {
                $query = "UPDATE WebsiteDangTuyen SET linkDangTuyen = ?, thoiGianDangTuyen = ?, keThucDangTuyen = ?, ghiChu = ? WHERE iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sssss", $linkDangTuyen, $thoiGianDangTuyen, $ketThucDangTuyen, $ghiChu, $iD);
                $iD = $websiteDangTuyen->iD;
                $linkDangTuyen = $websiteDangTuyen->linkDangTuyen;
                $thoiGianDangTuyen = $this->fromStringToDatetime($websiteDangTuyen->thoiGianDangTuyen);
                $ketThucDangTuyen = $this->fromStringToDatetime($websiteDangTuyen->ketThucDangTuyen);
                $ghiChu = $websiteDangTuyen->ghiChu;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }

        public function deleteWebsiteDangTuyenbyID(string $iD) : bool {
            try {
                $query = "DELETE FROM WebSiteDangTuyen where iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }
    }



?>