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
                $query = "SELECT * FROM GiayToUngVien WHERE iD = '$iD'";
                $this->open_db();
                $giayToUngVien = null;
                $result = $this->condb->query($query);
                if($result->num_rows > 0) {
                    $giayToUngVien = $result->fetch_object();
                }
                $this->close_db();
                return $giayToUngVien;
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