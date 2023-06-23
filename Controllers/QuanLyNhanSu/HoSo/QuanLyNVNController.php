<?php
    require 'Models/QuanLyHoSoModels/NghiViecEntity.php';
    require 'Models/QuanLyHoSoModels/NghiViecModel.php';
    require_once 'config.php';

    class QuanLyNVNController{
        function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =  new NhanVienModel($this->objconfig);
            $this->objsm2 =  new NghiViecModel($this->objconfig);
		}

        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{	
				case 'delete' :					
					$this -> delete();
					break;
				case 'search' :					
					$this -> search();
					break;									
				default:
                    $this->list();
			}
		}

        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}

        public function list(){
			$result2=$this->objsm2->selectRecord();
            include "Views/QuanLyNhanSuViews/HoSo/QLNVN/QuanLyNghiViecView.php";                                              
        }

		public function search(){
			if(isset($_POST['find2'])){
				$maNV = $_POST['ma-nhan-vien'];
				$tenNV = $_POST['ten-nhan-vien'];;
				$tenPB = $_POST['ten-phong-ban'];
				$queQuan = $_POST['que-quan'];
				$chucVu = $_POST['chuc-vu'];
				$chuyenMon = $_POST['chuyen-mon'];
				$result2=$this->objsm2->searchOldEmployee($maNV, $tenNV, $tenPB, $queQuan, $chucVu, $chuyenMon);
				include "Views/QuanLyNhanSuViews/HoSo/QLNVN/QuanLyNghiViecView.php";
			} 
		}

        
    }
?>