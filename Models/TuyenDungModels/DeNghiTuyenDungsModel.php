<?php declare(strict_types = 1);
    include_once('TuyenDungModel.php');
    class DeNghiTuyenDungsModel extends TuyenDungModel {

        public function getAllDeNghiTuyenDungByIDPhongBan($iDPhongBan) {
            
        }
        
        public function addDeNghiTuyenDung(DeNghiTuyenDungs $deNghiTuyenDungs) {
            try {
                $this->open_db();
                $stmt = $this->condb->prepare("INSERT INTO denghituyenDung values (?,?,?,?)");
                $iD = substr(uniqid(), 0, 13);
                $stmt->bind_param("ssss", $deNghiTuyenDungs->iD, $deNghiTuyenDungs->iDPhongBan, $deNghiTuyenDungs->noiDung, $deNghiTuyenDungs->phanHoi);
                $stmt->execute();
                return 1;
            } catch(Exception $ex) {
                $this->close_db();
                $ero = include_once '.../Views/ErrorPage.php';
                echo $ero;
            }
            return 0;
        }
    }

    include_once('DeNghiTuyenDungs.php');
    $inforDb = new stdClass();
    $inforDb->host = 'localhost';
    $inforDb->pass = '';
    $inforDb->user = 'root';
    $inforDb->db = 'quanlynhansu';
    $deNghiTuyenDungModel = new DeNghiTuyenDungsModel($inforDb);

    $deNghiTuyenDung = new DeNghiTuyenDungs("sdfdd", "mapb01", "sfdsd", "");


    $deNghiTuyenDungModel->addDeNghiTuyenDung($deNghiTuyenDung);
?>