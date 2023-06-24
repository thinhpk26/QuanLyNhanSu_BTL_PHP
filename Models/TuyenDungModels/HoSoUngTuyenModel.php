<?php declare(strict_types=1);
    require_once 'HoSoUngTuyen.php';
    require_once 'TuyenDungModel.php';
    class HoSoUngTuyenModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }

        public function getAllHoSoUngTuyenWithChuaQuyetDinh($iDKeHoachTuyenDung) {
            try {
                $query = "select hosoungtuyen.* from loaihoso join hosoungtuyen on loaihoso.iD = hosoungtuyen.iD
                where loaihoso.loaiHoSo = 'Chưa quyết định' && hosoungtuyen.iDKeHoachTuyenDung = '$iDKeHoachTuyenDung'";
                $this->open_db();
                $hoSoUngTuyenList = array();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $hoSoUngTuyenList[] = $row;
                    }
                }
                $this->close_db();
                return $hoSoUngTuyenList;
            } catch (Exception $ex) {
                return $ex;
            }
        }

        public function getAllHoSoUngTuyenWithChoPhongVanByiDKeHoachtuyenDung($iDKeHoachTuyenDung) {
            try {
                $query = "select hosoungtuyen.* from loaihoso join hosoungtuyen on loaihoso.iD = hosoungtuyen.iD
                where loaihoso.loaiHoSo = 'Chờ phỏng vấn' && hosoungtuyen.iDKeHoachTuyenDung = '$iDKeHoachTuyenDung'";
                $this->open_db();
                $hoSoUngTuyenList = array();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $hoSoUngTuyenList[] = $row;
                    }
                }
                $this->close_db();
                return $hoSoUngTuyenList;
            } catch (Exception $ex) {
                return $ex;
            }
        }

        public function getAllHoSoUngTuyenWithLoaiBo($iDKeHoachTuyenDung) {
            try {
                $query = "select hosoungtuyen.* from loaihoso join hosoungtuyen on loaihoso.iD = hosoungtuyen.iD
                where loaihoso.loaiHoSo = 'Loại bỏ' && hosoungtuyen.iDKeHoachTuyenDung = '$iDKeHoachTuyenDung'";
                $this->open_db();
                $hoSoUngTuyenList = array();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $hoSoUngTuyenList[] = $row;
                    }
                }
                $this->close_db();
                return $hoSoUngTuyenList;
            } catch (Exception $ex) {
                return $ex;
            }
        }

        public function getAllHoSoUngTuyenWithChapNhanTuyenDung() {
            try {
                $query = "select hosoungtuyen.* from loaihoso join hosoungtuyen on loaihoso.iD = hosoungtuyen.iD
                where loaihoso.loaiHoSo = 'Chấp nhận tuyển dụng'";
                $this->open_db();
                $hoSoUngTuyenList = array();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $hoSoUngTuyenList[] = $row;
                    }
                }
                $this->close_db();
                return $hoSoUngTuyenList;
            } catch (Exception $ex) {
                return $ex;
            }
        }
        public function getHoSoUngTuyenByID($iD) {
            try {
                $query = "select * from hosoungtuyen where iD = '$iD'";
                $this->open_db();
                $hoSoUngTuyen = null;
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    $hoSoUngTuyen = $result->fetch_object();
                }
                $this->close_db();
                return $hoSoUngTuyen;
            } catch (Exception $ex) {
                return $ex;
            }
        }
        public function getAllHoSoUngTuyen() {
            try {
                $query = "select * from hosoungtuyen";
                $this->open_db();
                $hoSoUngTuyenList = array();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $hoSoUngTuyenList[] = $row;
                    }
                }
                $this->close_db();
                return $hoSoUngTuyenList;
            } catch (Exception $ex) {
                return $ex;
            }
        }

        public function addHoSoUngTuyen($hoSoUngTuyen) {
            try {
                $query = "INSERT INTO HoSoUngTuyen VALUES (?,?,?,?,?,?,?,?,?)";
                $this->checkHaveParams($hoSoUngTuyen, ['iD', 'iDKeHoachTuyenDung', 'iDKeHoachPhongVan', 'email', 'hoTen', 'soDT', 'diaChi', 'ngaySinh', 'ghiChu']);
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sssssssss", $iD, $iDKeHoachTuyenDung, $iDKeHoachPhongVan, $hoTen, $email, $soDT, $diaChi, $ngaySinh, $ghiChu);
                $iD = $hoSoUngTuyen->iD;
                $iDKeHoachTuyenDung = $hoSoUngTuyen->iDKeHoachTuyenDung;
                $iDKeHoachPhongVan = $hoSoUngTuyen->iDKeHoachPhongVan;
                $hoTen = $hoSoUngTuyen->hoTen;
                $email = $hoSoUngTuyen->email;
                $soDT = $hoSoUngTuyen->soDT;
                $diaChi = $hoSoUngTuyen->diaChi;
                $ngaySinh = $hoSoUngTuyen->ngaySinh;
                $ghiChu = trim($hoSoUngTuyen->ghiChu);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $ex) {
                return $ex;
            }
        }
        public function deleteHoSoUngTuyen(string $iD) {
            try {
                $query = "DELETE FROM HoSoUngTuyen WHERE iD = ?";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("s", $iD);
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $ex) {
                return $ex;
            }
        }
    }

?>