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

        public function getAllHoSoUngTuyenWithChuaQuyetDinh() : array {
            try {
                $query = "select hosoungtuyen.* from loaihoso join hosoungtuyen on loaihoso.iD = hosoungtuyen.iD
                where loaihoso.loaiHoSo = 'Chưa quyết định'";
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
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllHoSoUngTuyenWithChoPhongVan() : array {
            try {
                $query = "select hosoungtuyen.* from loaihoso join hosoungtuyen on loaihoso.iD = hosoungtuyen.iD
                where loaihoso.loaiHoSo = 'Chờ phỏng vấn'";
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
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllHoSoUngTuyenWithLoaiBo(): array {
            try {
                $query = "select hosoungtuyen.* from loaihoso join hosoungtuyen on loaihoso.iD = hosoungtuyen.iD
                where loaihoso.loaiHoSo = 'Loại bỏ'";
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
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllHoSoUngTuyenWithChapNhanTuyenDung(): array {
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
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function getAllHoSoUngTuyen() : array {
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
                $this->navigateWhenError($ex);
                return [];
            }
        }

        public function addHoSoUngTuyen(HoSoUngTuyen $hoSoUngTuyen) : bool {
            try {
                $query = "INSERT INTO HoSoUngTuyen VALUES (?,?,?,?,?,?,?,?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sssssssss", $iD, $iDKeHoachTuyenDung, $iDKeHoachPhongVan, $hoTen, $email, $soDT, $diaChi, $ngaySinh, $ghiChu);
                $iD = $hoSoUngTuyen->iD;
                if($iD == "") {
                    $this->createID();
                }
                $iDKeHoachTuyenDung = $hoSoUngTuyen->iDKeHoachTuyenDung;
                $iDKeHoachPhongVan = $hoSoUngTuyen->iDKeHoachPhongVan;
                $hoTen = $hoSoUngTuyen->hoTen;
                $email = $hoSoUngTuyen->email;
                $soDT = $hoSoUngTuyen->soDT;
                $diaChi = $hoSoUngTuyen->diaChi;
                $ngaySinh = $hoSoUngTuyen->ngaySinh;
                $ghiChu = $hoSoUngTuyen->ghiChu;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $ex) {
                $this->navigateWhenError($ex);
                return false;
            }
        }
        public function deleteHoSoUngTuyen(string $iD) : bool {
            try {
                $query = "DELETE FROM HoSoUngTuyen WHERE iD = ?";
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