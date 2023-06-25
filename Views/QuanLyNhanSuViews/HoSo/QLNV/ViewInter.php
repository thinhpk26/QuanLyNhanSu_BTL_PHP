<?php
    require_once '../../../../config.php';
    $configg = new config();
    $configg->opendb();
    $maNVV = $_GET['maNV']; 
    $sql = "SELECT * FROM nhanvien WHERE maNV = '$maNVV'";
    $sql2 = "SELECT * FROM phongban";
    $sql3 = "SELECT * FROM chucvu";
    $sql4 = "SELECT * FROM hopdong WHERE maNV = '$maNVV'";
    $conn = $configg->conn;

    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    $result4 = $conn->query($sql4);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $row = null; 
    }

    $conn->close(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/181ea712f3.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        a{
            text-decoration: none;
            color: white;
            height: 100%;
            width: 100%;
            display: block;
        }

        .container{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .navbar{
            position: fixed;
            width: 16%; 
            padding: 10px;
            bottom: 0;
            top: 0;
            background-color: white;
        }

        .nav-ele{
            padding: 5px 0px;
            height: 6%;

        }

        .nav-ele i{
            min-width: 20px;
        }

        .vung-dem{
            width: calc(16% + 20px);
        }

        .nav-cate{
            font-size: 14px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: 600;
            line-height: 38px;
        }

        .nav-cate:hover{
            background-color: #f57d00;
        } 

        .nav-cate{
            margin-left: -10px;
            margin-right: -10px;
        }

        .ttcn,
        .hd,
        .gt{
            
            background-color:#D9D9D9;
        }


        
        .ttcn{
            display: block;
            height: 1200px;
        }

        .hd{
            display: none;
            height: 800px;
        }

        .gt{
            display: none;
            height: 700px;
        }
        
        .content{
            flex: 1;
        }

        .formm-tit{
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
            margin-left: 14%;
            margin-top: 10px;
            background-color: #f57d00;
        }

        .formm-titgt{
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
            margin-top: 10px;
            margin-bottom: 20px;
            background-color: #f57d00;
        }

        h1 {
            text-align: center;
        }

        .formm{
            max-width: 100%;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .formm-content {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            margin-left: 12%;
            position: absolute;
            top: 80px;
        }

        .form-group {
        flex-basis: 50%;
        margin-bottom: 20px;
        }

        .form-group input{
            max-width: 300px;
        }

        .form-group label {
            display: block;
            font-style:italic;
            font-weight: 500;
            margin-bottom: 5px;
        }


        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        }

        .form-group select {
        height: 34px;
        max-width: 318px;
        }

        .form-group .submit-button {
        display: flex;
        justify-content: center;
        flex-basis: 100%;
        }

        

        .form-group input[type="submit"]:hover {
        background-color: #45a049;
        }


        h1 {
            color: #333;
            text-align: center;
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        .gt{
           padding-left: 50px;
        }

        .gt input[type="file"] {
            margin-top: 5px;
            display: block;
            margin-bottom:20px;
            padding: 5px;
        }

        label{
            display: inline-block;
        }

        
        .nav-header{
            display: flex;
            line-height: 44.64px;
            margin-bottom: 15px;
            color: #f57d00;
        }  

        .gt > .form-group > button{         
            background-color: #888888;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 8px;
            min-width: 300px;
        }
        

    </style>
</head>
<body>
<div class="container">
        <div class="navbar">
            <div class="nav-header nav-ele">
                <img src="./bg.png" alt="" class="nav-img">
                <h3 class="nav-tit">Công ty TNHH 3T</h3>
            </div>
            <div class="nav-cate nav-ele js-nav-qlttcn">
                <i class="fa-sharp fa-solid fa-person"></i>
                Xem thông tin cá nhân
            </div>

            <div class="nav-cate nav-ele js-nav-qlhd" onclick="toggleNavCate2()"">
                <i class="fa-sharp fa-solid fa-file-contract"></i>
                Xem thông tin hợp đồng
            </div>
            <!--Con của ông trên-->
            <div class="nav-cate nav-ele js-nav-qlgt">
                <i class="fa-sharp fa-solid fa-image"></i>
                Xem thông tin giấy tờ
            </div>

            <div class="nav-cate nav-ele js-nav-qlgt">
                <i class="fa-solid fa-star"></i>
                Khen thưởng và kỷ luật
            </div>
        </div>

        <div class="vung-dem">

        </div>

        <div class="content">
            <form method="post" action="" class="formm">
                <div class="ttcn js-ttcn">
                    <div class="formm-tit">
                        <h1>Thông Tin Nhân Viên</h1>
                    </div>

                    <div class="formm-content">
                        <div class="form-group">
                            <label for="ma-nhan-vien">Mã nhân viên:</label>
                            <input type="text" id="ma-nhan-vien" name="ma-nhan-vien" value="<?=$row['maNV']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ten-nhan-vien">Tên nhân viên:</label>
                            <input type="text" id="ten-nhan-vien" name="ten-nhan-vien" value="<?=$row['tenNV']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="tuoi">Tuổi:</label>
                            <input type="number" id="tuoi" name="tuoi" value="<?=$row['tuoi']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="gioi-tinh">Giới tính:</label>
                            <!-- Hỏi chat gpt về vậy có cách nào để tôi có thể tự chọn trước kết quả cho thẻ select bằng cách đưa 1 biến giá trị bên ngoài vào không ? -->
                            <?php
                                echo '<select id="gioi-tinh" name="gioi-tinh">
                                        <option value="Nam" ' . ($row['gioiTinh'] == "Nam" ? "selected" : "") . '>Nam</option>
                                        <option value="Nữ" ' . ($row['gioiTinh'] == "Nữ" ? "selected" : "") . '>Nữ</option>
                                    </select>';
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="ngay-sinh">Ngày sinh (yy/mm/dd):</label>
                            <input type="text" id="ngay-sinh" name="ngay-sinh"  value="<?=$row['ngaySinh']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="so-dien-thoai">Số điện thoại:</label>
                            <input type="text" id="so-dien-thoai" name="so-dien-thoai" value="<?=$row['sdt']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="<?=$row['email']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="que-quan">Quê quán:</label>
                            <input type="text" id="que-quan" name="que-quan" value="<?=$row['queQuan']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="dia-chi">Địa chỉ:</label>
                            <input type="text" id="dia-chi" name="dia-chi" value="<?=$row['diaChi']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="hon-nhan">Hôn nhân:</label>
                            <?php
                                echo '<select id="hon-nhan" name="hon-nhan">
                                    <option value="Độc thân" ' . ($row['honNhan'] == "doc-than" ? "selected" : "") . '>Độc thân</option>
                                    <option value="Đã kết hôn" ' . ($row['honNhan'] == "da-ket-hon" ? "selected" : "") . '>Đã kết hôn</option>
                                </select>';
                            ?>

                        </div>

                        <div class="form-group">
                            <label for="ten-phong-ban">Tên phòng ban:</label>
                            <select id="ten-phong-ban" name="ten-phong-ban" required>
                                <?php
                                    
                                        while ($row2 = $result2->fetch_assoc()) {
                                            $selected = ($row['maPb'] == $row2['maPb']) ? "selected" : "";
                                            echo '<option value="' .  $row2['maPb'] . '" ' . $selected . '>' . $row2['tenPb'] . '</option>';
                                        }
                                    
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="chuc-vu">Chức vụ:</label>
                            <select id="chuc-vu" name="chuc-vu" required>
                                <?php
                                    while ($row3 = $result3->fetch_assoc()) {
                                        $selected = ($row['maChucVu'] == $row2['maChucVu']) ? "selected" : "";
                                        echo '<option value="' .  $row3['maChucVu'] . '" ' . $selected . '>' . $row3['maChucVu'] . '</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="trinh-do">Trình độ:</label>
                            <input type="text" id="trinh-do" name="trinh-do" value="<?=$row['trinhDo']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="chuyen-mon">Chuyên môn:</label>
                            <input type="text" id="chuyen-mon" name="chuyen-mon" value="<?=$row['chuyenMon']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="dan-toc">Dân tộc:</label>
                            <input type="text" id="dan-toc" name="dan-toc" value="<?=$row['danToc']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="quoc-tich">Quốc tịch:</label>
                            <input type="text" id="quoc-tich" name="quoc-tich" value="<?=$row['quocTich']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="so-cmnd">Số chứng minh nhân dân:</label>
                            <input type="text" id="so-cmnd" name="so-cmnd" value="<?=$row['soCMND']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ho-khau">Hộ khẩu:</label>
                            <input type="text" id="ho-khau" name="ho-khau" value="<?=$row['hoKhau']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ngan-hang">Ngân hàng:</label>
                            <input type="text" id="ngan-hang" name="ngan-hang" value="<?=$row['nganHang']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="so-tai-khoan">Số tài khoản:</label>
                            <input type="text" id="so-tai-khoan" name="so-tai-khoan" value="<?=$row['soTK']?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ma-so-thue">Mã số thuế:</label>
                            <input type="text" id="ma-so-thue" name="ma-so-thue" value="<?=$row['maSoThue']?>" readonly>
                        </div>
                    </div>

                </div>

                <div class="gt js-gt">
                    <!-- Lôi được biến iD lên đây rồi nói tiếp -->
                    <div class="formm-titgt">
                        <h1>Thông Tin Giấy Tờ</h1>
                    </div>
                    <?php
                        $imageURLcmnd = "../../../../imagesConstract/".$row['maNV']."/cmnd.jpg?t=".time(); // Đường dẫn đến hình ảnh
                        $imageURLbc = "../../../../imagesConstract/".$row['maNV']."/bc.jpg?t=".time(); // Đường dẫn đến hình ảnh
                        $imageURLgks = "../../../../imagesConstract/".$row['maNV']."/gks.jpg?t=".time(); // Đường dẫn đến hình ảnh
                        $imageURLhdld = "../../../../imagesConstract/".$row['maNV']."/hdld.jpg?t=".time(); // Đường dẫn đến hình ảnh
                        $imageURLhk = "../../../../imagesConstract/".$row['maNV']."/hk.jpg?t=".time(); // Đường dẫn đến hình ảnh
                    ?>

                    <div class="form-group">
                        <button onclick="openImagePopup('<?php echo $imageURLcmnd; ?>');return false;">Hiển thị ảnh chứng minh nhân dân</button>
                    </div>

                    <div class="form-group">
                        <button onclick="openImagePopup('<?php echo $imageURLbc; ?>');return false;">Hiển thị ảnh bằng cấp</button>
                    </div>

                    <div class="form-group">
                        <button onclick="openImagePopup('<?php echo $imageURLgks; ?>'); return false;">Hiển thị ảnh giấy khai sinh</button>
                    </div>

                    <div class="form-group">
                        <button onclick="openImagePopup('<?php echo $imageURLhdld; ?>'); return false;">Hiển thị ảnh hợp đồng lao động</button>
                    </div>

                    <div class="form-group">
                        <button onclick="openImagePopup('<?php echo $imageURLhk; ?>'); return false;">Hiển thị ảnh hộ khẩu</button>
                    </div>
     
                </div>


                <div class="hd js-hd">
                    <?php include './QLNV-LookDsHd.php'; ?>
                </div>

         
            </form>
        </div>


        <script>
            // Lấy đối tượng button "Lọc" và form
            const ttcnBut = document.querySelector('.js-nav-qlttcn');
            const hdBut = document.querySelector('.js-nav-qlhd');
            const gtBut = document.querySelector('.js-nav-qlgt');
            const formttcn = document.querySelector('.js-ttcn');
            const formhd = document.querySelector('.js-hd');
            const formgt = document.querySelector('.js-gt');
            

            // Bắt sự kiện click vào nút "Lọc"
            ttcnBut.addEventListener('click', function() {
                // Kiểm tra trạng thái hiển thị của form
                const isFormVisible = formttcn.style.display === 'block';
                if (!isFormVisible) {                  
                    formttcn.style.display = 'block';
                    //document.getElementById('employee-table').style.marginTop = '10px'; // Thay đổi giá trị theo yêu cầu của bạn
                    formhd.style.display = 'none';
                    formgt.style.display = 'none';
                }
            });

            hdBut.addEventListener('click', function() {
                // Kiểm tra trạng thái hiển thị của form
                const isFormVisible = formhd.style.display === 'block';
                if (!isFormVisible) {
                    formhd.style.display = 'block';
                    //document.getElementById('employee-table').style.marginTop = '10px'; // Thay đổi giá trị theo yêu cầu của bạn
                    formttcn.style.display = 'none';
                    formgt.style.display = 'none';
                }
            });

            gtBut.addEventListener('click', function() {
                // Kiểm tra trạng thái hiển thị của form
                const isFormVisible = formgt.style.display === 'block';
                if (!isFormVisible) {
                    formgt.style.display = 'block';
                    //document.getElementById('employee-table').style.marginTop = '10px'; // Thay đổi giá trị theo yêu cầu của bạn
                    formttcn.style.display = 'none';
                    formhd.style.display = 'none';
                }
            });

            function openImagePopup(imageURL) {
                // Tạo cửa sổ nhỏ để hiển thị ảnh
                var popupWindow = window.open(imageURL, "_blank", "width=400,height=400");
            }
        </script>
</body>
</html>