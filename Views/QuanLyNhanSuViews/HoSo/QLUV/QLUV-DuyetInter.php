<?php
    require_once 'config.php';
    $configg = new config();
    $configg->opendb();
    $maUVV = $_GET['maUV']; 
    $sql = "SELECT * FROM UngVien WHERE maUV = '$maUVV'";
    $conn = $configg->conn;
    $result = $conn->query($sql);
    
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/181ea712f3.js" crossorigin="anonymous"></script>
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
            height: 1200px;
            display: block;
        }

        .hd{
            height: 800px;
            display: none;
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


        h1 {
            text-align: center;
        }

        .formm{
            max-width: 100%;
            margin: 0 auto;
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



        .gt input[type="file"] {
            margin-top: 5px;
            display: block;
            margin-bottom:20px;
            padding: 5px;
        }

        .gt input[type="submit"] {
            margin-top: 35%;
            margin-left: 45%;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .gt input[type="submit"]:hover {
            background-color: #45a049;
        }

        .nav-header{
            display: flex;
            line-height: 44.64px;
            margin-bottom: 15px;
            color: #f57d00;
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
                Nhập thông tin cá nhân
            </div>

            <div class="nav-cate nav-ele js-nav-qlhd" onclick="toggleNavCate2()"">
                <i class="fa-sharp fa-solid fa-file-contract"></i>
                Nhập hợp đồng
            </div>
            <!--Con của ông trên-->
            <div class="nav-cate nav-ele js-nav-qlgt">
                <i class="fa-sharp fa-solid fa-image"></i>
                Nhập thông tin giấy tờ
            </div>
        </div>

        <div class="vung-dem">

        </div>

        <div class="content">
            <form method="post" action="direct.php?route=quanlyuv&act=add" class="formm" enctype="multipart/form-data">
                <div class="ttcn js-ttcn">
                    <div class="formm-tit">
                        <h1>Form Nhập Thông Tin Nhân Viên</h1>
                    </div>

                    <div class="formm-content">

                        <div class="form-group">
                            <label for="ten-nhan-vien">Tên nhân viên:</label>
                            <input type="text" id="ten-nhan-vien" name="ten-nhan-vien" value="<?=$row['tenUV']?>">
                            <input type="text" style="display: none;" id="ma-ung-vien" name="ma-ung-vien" value="<?=$row['maUV']?>">
                        </div>

                        <div class="form-group">
                            <label for="tuoi">Tuổi:</label>
                            <input type="number" id="tuoi" name="tuoi" required>
                        </div>

                        <div class="form-group">
                            <label for="gioi-tinh">Giới tính:</label>
                            <?php
                                echo '<select id="gioi-tinh" name="gioi-tinh">
                                        <option value="Nam" ' . ($row['sex'] == "Nam" ? "selected" : "") . '>Nam</option>
                                        <option value="Nữ" ' . ($row['sex'] == "Nữ" ? "selected" : "") . '>Nữ</option>
                                    </select>';
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="ngay-sinh">Ngày sinh (yy/mm/dd):</label>
                            <input type="date" id="ngay-sinh" name="ngay-sinh" value="<?=$row['ngaySinh']?>" >
                        </div>

                        <div class="form-group">
                            <label for="so-dien-thoai">Số điện thoại:</label>
                            <input type="text" id="so-dien-thoai" name="so-dien-thoai" value="<?=$row['sdt']?>" >
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="<?=$row['email']?>" >
                        </div>

                        <div class="form-group">
                            <label for="que-quan">Quê quán:</label>
                            <input type="text" id="que-quan" name="que-quan" value="<?=$row['queQuan']?>" >
                        </div>

                        <div class="form-group">
                            <label for="dia-chi">Địa chỉ:</label>
                            <input type="text" id="dia-chi" name="dia-chi" required>
                        </div>

                        <div class="form-group">
                            <label for="hon-nhan">Hôn nhân:</label>
                            <select id="hon-nhan" name="hon-nhan" required>
                                <option value="doc-than">Độc thân</option>
                                <option value="da-ket-hon">Đã kết hôn</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ten-phong-ban">Tên phòng ban:</label>
                            <select id="ten-phong-ban" name="ten-phong-ban" required>
                                <?php
                                    if ($pb->num_rows > 0) {
                                        while ($row = $pb->fetch_assoc()) {
                                            echo "<option value='" . $row['maPb'] . "'>" . $row['tenPb'] . "</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="chuc-vu">Chức vụ:</label>
                            <select id="chuc-vu" name="chuc-vu" required>
                                <?php
                                    if ($cv->num_rows > 0) {
                                        while ($row = $cv->fetch_assoc()) {
                                            echo "<option value='" . $row['maChucVu'] . "'>" . $row['tenChucVu'] . "</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="trinh-do">Trình độ:</label> 
                            <input type="text" id="trinh-do" name="trinh-do" required>
                        </div>

                        <div class="form-group">
                            <label for="chuyen-mon">Chuyên môn:</label>
                            <input type="text" id="chuyen-mon" name="chuyen-mon" required>
                        </div>

                        <div class="form-group">
                            <label for="dan-toc">Dân tộc:</label>
                            <input type="text" id="dan-toc" name="dan-toc" required>
                        </div>

                        <div class="form-group">
                            <label for="quoc-tich">Quốc tịch:</label>
                            <input type="text" id="quoc-tich" name="quoc-tich" required>
                        </div>

                        <div class="form-group">
                            <label for="so-cmnd">Số chứng minh nhân dân:</label>
                            <input type="text" id="so-cmnd" name="so-cmnd" required>
                        </div>

                        <div class="form-group">
                            <label for="ho-khau">Hộ khẩu:</label>
                            <input type="text" id="ho-khau" name="ho-khau" required>
                        </div>

                        <div class="form-group">
                            <label for="ngan-hang">Ngân hàng:</label>
                            <input type="text" id="ngan-hang" name="ngan-hang" required>
                        </div>

                        <div class="form-group">
                            <label for="so-tai-khoan">Số tài khoản:</label>
                            <input type="text" id="so-tai-khoan" name="so-tai-khoan" required>
                        </div>

                        <div class="form-group">
                            <label for="ma-so-thue">Mã số thuế:</label>
                            <input type="text" id="ma-so-thue" name="ma-so-thue" required>
                        </div>

                    </div>

                    
                </div>


                <div class="hd js-hd">
                    <div class="formm-tit">
                        <h1>Form Nhập Thông Tin Hợp Đồng Nhân Viên</h1>
                    </div>
                    
                    <div class="formm-content">

                        <div class="form-group">
                            <label for="loai-hop-dong">Loại hợp đồng:</label>
                            <select id="loai-hop-dong" name="loai-hop-dong" required>
                                <option value="thuc-tap">Hợp đồng thực tập</option>
                                <option value="thu-viec">Hợp đồng thử việc</option>
                                <option value="chinh-thuc">Hợp đồng nhân viên chính thức</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="dai-dien">Đại diện:</label>
                            <input type="text" id="dai-dien" name="dai-dien" required>
                        </div>

                        <div class="form-group">
                            <label for="ngay-ky">Ngày ký:</label>
                            <input type="date" id="ngay-ky" name="ngay-ky" required>
                        </div>

                        <div class="form-group">
                            <label for="ngay-hieu-luc">Ngày hiệu lực:</label>
                            <input type="date" id="ngay-hieu-luc" name="ngay-hieu-luc" required>
                        </div>

                        <div class="form-group">
                            <label for="ngay-het-han">Ngày hết hạn:</label>
                            <input type="date" id="ngay-het-han" name="ngay-het-han" required>
                        </div>

                        <div class="form-group">
                            <label for="luong">Lương:</label>
                            <input type="number" id="luong" name="luong" required>
                        </div>

                        <div class="form-group">
                            <label for="ngay-tra-luong">Ngày trả lương:</label>
                            <input type="number" id="ngay-tra-luong" name="ngay-tra-luong" required>
                        </div>

                        <div class="form-group">
                            <label for="phu-cap-bao-hiem">Phụ cấp:</label>
                            <input type="number" id="phu-cap" name="phu-cap" required>
                        </div>

                        <div class="form-group">
                            <label for="phu-cap-bao-hiem">Bảo hiểm:</label>
                            <input type="text" id="bao-hiem" name="bao-hiem" required>
                        </div>

                    </div>
                </div>

                <div class="gt js-gt">
                        <div class="formm-tit">
                            <h1>Tải lên ảnh</h1>
                        </div>

                        <div class="formm-content">
                            <div class="form-group">
                                <label for="cmnd">Ảnh căn cước công dân:</label>
                                <input type="file" name="cmnd" id="cmnd" required>
                            </div>

                            <div class="form-group">
                                <label for="hk">Ảnh hộ khẩu:</label>
                                <input type="file" name="hk" id="hk" required>
                            </div>

                            <div class="form-group">
                                <label for="bc">Ảnh bằng cấp:</label>
                                <input type="file" name="bc" id="bc" required>
                            </div>

                            <div class="form-group">
                                <label for="gks">Ảnh giấy khai sinh:</label>
                                <input type="file" name="gks" id="gks" required>
                            </div>

                            <div class="form-group">
                                <label for="hdld">Ảnh hợp đồng lao động:</label>
                                <input type="file" name="hdld" id="hdld" required>
                            </div>
                            
                        </div>
                        <div class="sub-button">
                            <input type="submit" name="addbtn" value="Xác nhận">
                        </div>
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
        </script>
    </div>
</body>
</html>