<?php
    require 'Models/QuanLyHoSoModels/NhanVienEntity.php';
    require 'Models/QuanLyHoSoModels/NhanVienModel.php';
	require 'Models/QuanLyHoSoModels/HopDongEntity.php';
    require 'Models/QuanLyHoSoModels/HopDongModel.php';
	require 'Models/QuanLyHoSoModels/PhongBanEntity.php';
    require 'Models/QuanLyHoSoModels/PhongBanModel.php';
	require 'Models/QuanLyHoSoModels/ChucVuEntity.php';
    require 'Models/QuanLyHoSoModels/ChucVuModel.php';
    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

    class QuanLyNVController{
        function __construct() 
		{          
			$this->objconfig = new config();
			$this->objsm =  new NhanVienModel($this->objconfig);
			$this->objsm2 =  new HopDongModel($this->objconfig);
			$this->objsm3 =  new PhongBanModel($this->objconfig);
			$this->objsm4 =  new ChucVuModel($this->objconfig);
			$this->objsm5 =  new NghiViecModel($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'add' :                    
					$this->insert();
					break;						
				case 'update':
					$this->update();
					break;				
				case 'delete':					
					$this -> delete();
					break;
				case 'search':					
					$this -> search();
					break;
				case 'addView':					
					$this -> addView();
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
					$HopDong->ngayTra = (int)(trim($_POST['ngay-tra-luong']));
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
						$pid = $this -> objsm ->insertRecord($NhanVien);
						$pid2 = $this -> objsm2 ->insertRecord($HopDong);

						if($pid != '' && $pid2 != ''){			
							$this->pageRedirect("index.php?route=quanlynv"); 
						}else{
							echo "Somthing is wrong..., try again.";
						}
                    }

					else{
						echo '<div class="message" style="width: 300px; margin: 0 auto; text-align: center; background-color: #f2f2f2; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: Arial, sans-serif;">' . $chk . '</div>'; // Hiển thị thông báo trong thẻ div với các thuộc tính CSS được đưa vào trực tiếp
					}
                }

				else if(isset($_POST['addHdBtn'])){
					$HopDong->linkHopDong = 'aa';
					$HopDong->loaiHD = trim($_POST['loai-hop-dong']);//* v
					$HopDong->maNV = trim($_POST['ma-nhan-vien']);
					$HopDong->daiDien = trim($_POST['dai-dien']);
					$HopDong->ngayKy = trim($_POST['ngay-ky']);
					$HopDong->ngayHieuLuc = trim($_POST['ngay-hieu-luc']);
					$HopDong->ngayHet = trim($_POST['ngay-het-han']);
					$HopDong->luong = (int)(trim($_POST['luong']));
					$HopDong->ngayTra = trim($_POST['ngay-tra-luong']);
					$HopDong->phuCap = (int)(trim($_POST['phu-cap']));
					$HopDong->baoHiem = trim($_POST['bao-hiem']); // đâyyyy
					$HopDong->tinhTrangHD = 'Đang hiệu lực';// đã hết hạn, đã nghỉ
					$resultHd1 =$this->objsm2->selectRecordNV($HopDong->maNV);
					$count = strval(mysqli_num_rows($resultHd1)+1);
					$HopDong->maHD = 'HD'.substr($HopDong->maNV,-5).$count;
					$this -> objsm2 ->resetRecord($HopDong->maNV);
					$resultHd2 = $this -> objsm2 ->insertRecord($HopDong);
					if($resultHd2 != ''){	
	
						$this->pageRedirect("index.php?route=quanlynv"); 
					}else{
						echo "Somthing is wrong..., try again.";
					}
				}

            }catch (Exception $e) 
            {
                $this->close_db();	
                throw $e;
            }
        }

		public function addView(){
				$pb = $this -> objsm3 ->selectRecord(0);
				$cv = $this -> objsm4 ->selectRecord(0);
				include 'Views/QuanLyNhanSuViews/HoSo/QLNV/AddInter.php';
			
		}

        public function list(){
            $result=$this->objsm->selectRecord(0);
            include "Views/QuanLyNhanSuViews/HoSo/QLNV/QuanLyNhanSuView.php";                                              
        }

		public function search(){
			if(isset($_POST['find'])){
				$maNV = $_POST['ma-nhan-vien'];
				$tenNV = $_POST['ten-nhan-vien'];;
				$tenPB = $_POST['ten-phong-ban'];
				$queQuan = $_POST['que-quan'];
				$chucVu = $_POST['chuc-vu'];
				$chuyenMon = $_POST['chuyen-mon'];
				$result=$this->objsm->searchEmployees($maNV, $tenNV, $tenPB, $queQuan, $chucVu, $chuyenMon);
				include "Views/QuanLyNhanSuViews/HoSo/QLNV/QuanLyNhanSuView.php";
			} 

			if(isset($_POST['search-name'])){
				$tenNV = $_POST['cele2-search'];
				$result=$this->objsm->searchEmployees('', $tenNV,'' ,'' , '', '');
				include "Views/QuanLyNhanSuViews/HoSo/QLNV/QuanLyNhanSuView.php";
			}
		}

		public function delete(){
			$NghiViec = new NghiViecEntity();
			$NhanVien = new NhanVienEntity();
			if(isset($_POST['but'])){
				$NghiViec->maNV = $_POST['ma-nhan-vien'];
				$NghiViec->ngayNghi = $_POST['ngay-nghi-viec'];
				$NghiViec->lyDo = $_POST['ly-do'];

				$Nghi = $this -> objsm5 ->insertRecord($NghiViec);
				$Nghi2 = $this -> objsm ->updateStatus($NghiViec->maNV );
				$this -> objsm2 ->resetRecord($HopDong->maNV);

				if($Nghi != ''){			
					$this->pageRedirect("index.php?route=quanlynv"); 
				}else{
					echo "Somthing is wrong..., try again.";
				}
			}
		}

		public function update(){
			$NhanVien=new NhanVienEntity();
			if (isset($_POST['upbtn'])) 
			{ 
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
					$NhanVien->maNV = trim($_POST['ma-nhan-vien']);

					$mess = "";
					$messNumberSdt=$messCountSdt = $messCountSdt = $messTuoi = '';
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

					if((date("Y") - substr($NhanVien->ngaySinh, 0, 4)) < 18){
						$messTuoi = "Chưa đủ tuổi,";
						$mess .= $messTuoi;
					}

					$mess = rtrim($mess, " ,");
					if($mess == ""){
						$uploadDir = './imagesConstract/'.$NhanVien->maNV.'/'; // Đường dẫn tới thư mục mới
						if (!file_exists($uploadDir)) {
							mkdir($uploadDir, 0777, true); // Tạo thư mục mới nếu chưa tồn tại
						}
	
						if (isset($_FILES['cmnd']) && $_FILES['cmnd']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['cmnd']['tmp_name'];
							$targetPath = $uploadDir . 'cmnd.jpg';
							
							if (file_exists($targetPath)) {
								unlink($targetPath); // Xóa tệp tin cũ nếu tồn tại
							}
							
							move_uploaded_file($tempPath, $targetPath); // Di chuyển tệp tin mới vào vị trí đích
						}
					
						if (isset($_FILES['hk']) && $_FILES['hk']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['hk']['tmp_name'];
							$targetPath = $uploadDir . 'hk.jpg';
							if (file_exists($targetPath)) {
								unlink($targetPath); // Xóa tệp tin cũ nếu tồn tại
							}
							
							move_uploaded_file($tempPath, $targetPath); // Di chuyển tệp tin mới vào vị trí đích
						}
					
						if (isset($_FILES['bc']) && $_FILES['bc']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['bc']['tmp_name'];
							$targetPath = $uploadDir . 'bc.jpg';
							if (file_exists($targetPath)) {
								unlink($targetPath); // Xóa tệp tin cũ nếu tồn tại
							}
							
							move_uploaded_file($tempPath, $targetPath); // Di chuyển tệp tin mới vào vị trí đích
						}
					
						if (isset($_FILES['gks']) && $_FILES['gks']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['gks']['tmp_name'];
							$targetPath = $uploadDir . 'gks.jpg';
							if (file_exists($targetPath)) {
								unlink($targetPath); // Xóa tệp tin cũ nếu tồn tại
							}
							
							move_uploaded_file($tempPath, $targetPath); // Di chuyển tệp tin mới vào vị trí đích
						}
					
						if (isset($_FILES['hdld']) && $_FILES['hdld']['error'] === UPLOAD_ERR_OK) {
							$tempPath = $_FILES['hdld']['tmp_name'];
							$targetPath = $uploadDir . 'hdld.jpg';
							if (file_exists($targetPath)) {
								unlink($targetPath); // Xóa tệp tin cũ nếu tồn tại
							}
							
							move_uploaded_file($tempPath, $targetPath); // Di chuyển tệp tin mới vào vị trí đích
						}

						//call insert record            
						$pid = $this -> objsm ->updateRecord($NhanVien);

						if($pid != ''){			
							$this->pageRedirect("index.php?route=quanlynv"); 
						}else{
							echo "Somthing is wrong..., try again.";
						}
					}
					else{						
						echo '<div class="message" style="width: 300px; margin: 0 auto; text-align: center; background-color: #f2f2f2; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: Arial, sans-serif;">' . $chk . '</div>'; // Hiển thị thông báo trong thẻ div với các thuộc tính CSS được đưa vào trực tiếp
					}
			}


		}
    }
?>