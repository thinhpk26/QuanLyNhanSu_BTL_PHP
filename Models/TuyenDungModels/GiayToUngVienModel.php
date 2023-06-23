<?php declare(strict_types = 1);
    require_once 'GiayToUngVien.php';
    require_once 'TuyenDungModel.php';
    class GiayToUngVienModel extends TuyenDungModel {
        public static function withDifferentHost($host) {
            $instance = new self();
            $instance->host = $host->host;
            $instance->user = $host->user;
            $instance->pass = $host->pass;
            $instance->db = $host->db;
            return $instance;
        }

        public function getGiayToUngVienbyID(string $iD) {
            try {
                $query = "SELECT * FROM GiayToUngVienby WHERE iD = '$iD'";
                $this->open_db();
                $giayToUngVienList = array();
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_object()) {
                        $giayToUngVienList[] = $row;
                    }
                }
                $this->close_db();
                return $giayToUngVienList;
            } catch(Exception $e) {
                return $e;
            }
        }

        public function addGiayToUngVien($giayToUngVien) {
            try {
                $this->checkHaveParams($giayToUngVien, ['iD', 'CV', 'soYeuLyLich', 'donXinViec', 'CCCD', 'giayKhaiSinh', 'soHoKhau', 'giayKhamSucKhoe', 'anh']);
                $query = "INSERT INTO GiayToUngVien Values (?,?,?,?,?,?,?,?,?)";
                $this->open_db();
                $pttm = $this->condb->prepare($query);
                $pttm->bind_param("sssssssss", $iD, $CV, $soYeuLyLich, $donXinViec, $CCCD, $giayKhaiSinh, $soHoKhau, $giayKhamSucKhoe, $anh);
                $iD = $giayToUngVien->iD;
                $CV = $giayToUngVien->CV;
                $soYeuLyLich = $giayToUngVien->soYeuLyLich;
                $donXinViec = $giayToUngVien->donXinViec;
                $CCCD = $giayToUngVien->CCCD;
                $giayKhaiSinh = $giayToUngVien->giayKhaiSinh;
                $soHoKhau = $giayToUngVien->soHoKhau;
                $giayKhamSucKhoe = $giayToUngVien->giayKhamSucKhoe;
                $anh = $giayToUngVien->anh;
                $pttm->execute();
                $this->close_db();
                return true;
            } catch (Exception $e) {
                return $e;
            }
        }
        public function deleteGiayToUngVienbyID(string $iD) {
            try {
                $query = "DELETE FROM GiayToUngVien WHERE iD = ?";
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