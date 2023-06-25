<?php
    require 'Models/QuanLyHoSoModels/UngVienEntity.php';
    require 'Models/QuanLyHoSoModels/UngVienModel.php';
    require_once 'config.php';

	session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

    class QuanLyUVController{
        function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =   new UngVienModel($this->objconfig);
			$this->objsmnv =  new NhanVienModel($this->objconfig);
			$this->objsmhd =  new HopDongModel($this->objconfig);
			$this->objsm3 =  new PhongBanModel($this->objconfig);
			$this->objsm4 =  new ChucVuModel($this->objconfig);
		}

        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{	
				case 'valid' :					
					$this ->valid();
					break;
				case 'search' :					
					$this ->search();
					break;	
				case 'single':
					$this -> single();		
					break;	
				case 'addView' :
					$this -> addView();		
					break;
				case 'add' :
					$this -> insert();		
					break;	
				default:
                    $this->list();
					break;
			}
		}

        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}

        public function list(){
            $result=$this->objsm->selectRecord(0);
            include "Views/QuanLyNhanSuViews/HoSo/QLUV//QuanLyUngVienView.php";                                              
        }

		public function search(){
			if(isset($_POST['find'])){
				$maUV = $_POST['ma-ung-vien'];
				$tenUV = $_POST['ten-ung-vien'];;
				$vtUT = $_POST['vi-tri-ut'];
				$queQuan = $_POST['que-quan'];
				$email = $_POST['email'];
				$sdt = $_POST['sdt'];
				$ngayNop = $_POST['ngay-nop'];
				$result=$this->objsm->searchCandidate($maUV, $tenUV, $vtUT, $queQuan, $email, $sdt, $ngayNop);
				include "Views/QuanLyNhanSuViews/HoSo/QLUV/QuanLyUngVienView.php";
			} 

			if(isset($_POST['search-name'])){
				$tenUV = $_POST['cele2-search'];
				$result=$this->objsm->searchCandidate('', $tenUV,'' ,'' , '', '','');
				include "Views/QuanLyNhanSuViews/HoSo/QLUV/QuanLyUngVienView.php";
			}
		}

		public function addView(){
			$pb = $this -> objsm3 ->selectRecord(0);
			$cv = $this -> objsm4 ->selectRecord(0);
			include 'Views/QuanLyNhanSuViews/HoSo/QLUV/QLUV-DuyetInter.php';
		
		}

		public function single(){
			$maUV = $_GET['maUV'];
			$result=$this->objsm->selectRecord($maUV);
			include "Views/QuanLyNhanSuViews/HoSo/QLUV/QLUV-ViewInter.php";
		}

		public function valid(){
			$maUV = $_GET['maUV'];
			$result=$this->objsm->selectRecord($maUV);
			include "Views/QuanLyNhanSuViews/HoSo/QLUV/QLUV-DuyetInter.php";
		}

		public function delete($maUV){
			try
            {
                    $res=$this->objsm->deleteRecord($maUV);                 
            }
            catch (Exception $e) 
            {
                $this->close_db();				
                throw $e;
            }
		}

		public function checkValidation($NhanVien, $HopDong)
		{
			$mess = "";
			$messNgayHD = $messCountSdt = $messCountSdt = $messTuoi = '';
			if ($NhanVien->tuoi > 50) {
				$messTuoi = "Số tuổi phải nhỏ hơn 50, ";
				$mess .= $messTuoi;
			}

			if (!ctype_digit($NhanVien->sdt)) {
				$messNumberSdt = "Số điện thoại phải có ký tự là các chữ số, ";
				$mess .= $messNumberSdt;
			}
			else if(strlen($NhanVien->sdt) != 10 && strlen($NhanVien->sdt) != 0 ){
				$messCountSdt = "Số điện thoại phải có 10 ký tự, ";
				$mess .= $messCountSdt;
			}


			if (strtotime($HopDong->ngayHieuLuc) > strtotime($HopDong->ngayHet) || strtotime($HopDong->ngayKy) > strtotime($HopDong->ngayHet) || strtotime($HopDong->ngayKy) > strtotime($HopDong->ngayHieuLuc)) {
				$messNgayHD = "Ngày hiệu lực và ngày ký phải trước ngày hết hạn, ";
				$mess .= $messNgayHD;
			}

			if((date("Y") - substr($NhanVien->ngaySinh, 0, 4)) < 18){
				$messTuoi = "Chưa đủ tuổi";
				$mess .= $messTuoi;
			}

			$mess = rtrim($mess, " ,");

			return $mess;
		}


		public function insert()
		{
            try{
                $NhanVien=new NhanVienEntity();
				$HopDong = new HopDongEntity();
                if (isset($_POST['addbtn'])) 
                {   
                    // read form value
					$NhanVien->tenNV = trim($_POST['ten-nhan-vien']);
					$NhanVien->tuoi = (int)(trim($_POST['tuoi'])); // nhỏ hơn 50
					$NhanVien->gioiTinh = trim($_POST['gioi-tinh']);
					$NhanVien->ngaySinh = trim($_POST['ngay-sinh']); // không được quá với số năm hiện hành -18
					$NhanVien->sdt = trim($_POST['so-dien-thoai']); // 10 ký tự
					$NhanVien->email = trim($_POST['email']);
					$NhanVien->queQuan = trim($_POST['que-quan']); 
					$NhanVien->diaChi = trim($_POST['dia-chi']);
					$NhanVien->honNhan = trim($_POST['hon-nhan']);
					$NhanVien->maPb = trim($_POST['ten-phong-ban']); // * v
					$NhanVien->maChucVu = trim($_POST['chuc-vu']); // * v
					$NhanVien->trinhDo = trim($_POST['trinh-do']);
					$NhanVien->chuyenMon = trim($_POST['chuyen-mon']);
					$NhanVien->danToc = trim($_POST['dan-toc']);
					$NhanVien->quocTich = trim($_POST['quoc-tich']);
					$NhanVien->soCMND = trim($_POST['so-cmnd']);
					$NhanVien->linkCMND = trim($_POST['cmnd']);
					$NhanVien->hoKhau = trim($_POST['ho-khau']);
					$NhanVien->linkHoKhau = trim($_POST['hk']);
					$NhanVien->linkBangCap = trim($_POST['bc']);
					$NhanVien->linkGiayKhaiSinh = trim($_POST['gks']);
					$NhanVien->nganHang = trim($_POST['ngan-hang']);
					$NhanVien->soTK = trim($_POST['so-tai-khoan']);
					$NhanVien->maSoThue = trim($_POST['ma-so-thue']);
					$NhanVien->tinhTrang = 'Đang làm việc';
					//Xử lý mã nhân viên: 
					$NhanVien->maNV = 'NV'.substr($NhanVien->soCMND,-5);

					
					$HopDong->linkHopDong = trim($_POST['hdld']);
					$HopDong->loaiHD = trim($_POST['loai-hop-dong']);//* v
					$HopDong->maNV = $NhanVien->maNV;
					$HopDong->daiDien = trim($_POST['dai-dien']);
					$HopDong->ngayKy = trim($_POST['ngay-ky']);
					$HopDong->ngayHieuLuc = trim($_POST['ngay-hieu-luc']);
					$HopDong->ngayHet = trim($_POST['ngay-het-han']);
					$HopDong->luong = (int)(trim($_POST['luong']));
					$HopDong->ngayTra = trim($_POST['ngay-tra-luong']);
					$HopDong->phuCap = (int)(trim($_POST['phu-cap']));
					$HopDong->baoHiem = trim($_POST['bao-hiem']); // đâyyyy
					$HopDong->tinhTrangHD = 'Đang hiệu lực';// đã hết hạn, đã nghỉ
					$HopDong->maHD = 'HD'.substr($NhanVien->soCMND,-5).'1';


					$chk=$this->checkValidation($NhanVien,$HopDong);
					if($chk == '')
                    {   
						$uploadDir = './imagesConstract/'.$NhanVien->maNV.'/'; // Đường dẫn tới thư mục mới
						if (!file_exists($uploadDir)) {
							mkdir($uploadDir, 0777, true); // Tạo thư mục mới nếu chưa tồn tại
						}
	
						if (isset($_FILES['cmnd']) && $_FILES['cmnd']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['cmnd']['tmp_name'];
							$targetPath = $uploadDir . 'cmnd.jpg';
							move_uploaded_file($tempPath, $targetPath);
						}
					
						if (isset($_FILES['hk']) && $_FILES['hk']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['hk']['tmp_name'];
							$targetPath = $uploadDir . 'hk.jpg';
							move_uploaded_file($tempPath, $targetPath);
						}
					
						if (isset($_FILES['bc']) && $_FILES['bc']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['bc']['tmp_name'];
							$targetPath = $uploadDir . 'bc.jpg';
							move_uploaded_file($tempPath, $targetPath);
						}
					
						if (isset($_FILES['gks']) && $_FILES['gks']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['gks']['tmp_name'];
							$targetPath = $uploadDir . 'gks.jpg';
							move_uploaded_file($tempPath, $targetPath);
						}
					
						if (isset($_FILES['hdld']) && $_FILES['hdld']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['hdld']['tmp_name'];
							$targetPath = $uploadDir . 'hdld.jpg';
							move_uploaded_file($tempPath, $targetPath);      
						}
                        //call insert record            
						$pid = $this -> objsmnv ->insertRecord($NhanVien);
						$pid2 = $this -> objsmhd ->insertRecord($HopDong);

						if($pid != '' && $pid2 != ''){			
							$this->delete($_POST['ma-ung-vien']);
							$this->pageRedirect("direct.php?route=quanlynv"); 
						}else{
							echo "Somthing is wrong..., try again.";
						}
                    }

					else{
						echo '<div class="message" style="width: 300px; margin: 0 auto; text-align: center; background-color: #f2f2f2; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: Arial, sans-serif;">' . $chk . '</div>'; // Hiển thị thông báo trong thẻ div với các thuộc tính CSS được đưa vào trực tiếp
					}
                }

            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }
    }
?>