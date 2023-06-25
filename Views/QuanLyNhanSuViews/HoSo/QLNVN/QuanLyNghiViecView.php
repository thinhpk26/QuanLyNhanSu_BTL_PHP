<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/demo.css">
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
            background-color: white;
            padding: 10px;
        }

        .vung-dem{
            width: calc(16% + 20px);
        }

        .content{
            flex: 1;
            min-height: 1000px;
            background-color: #D9D9D9;
            padding-left: 20px;
            padding-right: 20px;
        }

        .nav-ele{
            padding: 5px 0px;
            height: 6%;

        }

        .nav-ele i{
            min-width: 20px;
        }

        .nav-header{
            display: flex;
            line-height: 44.64px;
        }

        .nav-img{
            height: 100%;
            width: 20%; 
        }

        .nav-tit{
            color: #f57d00;
            font-weight: 600;
            text-align: left;
            flex: 1;
            word-spacing: 2px;
            line-height: 30.88px;
        }

        .nav-choice{
            text-align: center;
            line-height: 30px;
        }

        .ti{
            margin: 0 16px;
        }

        .nav-search-form{
            width: 100%;
        }

        .nav-search{
            width: 100%;
        }

        .nav-search-form{
            display: flex;

        }

        .nav-search-ip{
            width: 70%;
            padding: 5px;
            
        }

        .nav-search-sub{
            flex: 1;
            margin: 0 3px;
            background-color: #f57d00;
        }

        .nav-cate,
        .nav-cate2{
            font-size: 14px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: 600;
            line-height: 38px;
        }

        .nav-cate:hover,
        .nav-cate2:hover{
            background-color: #f57d00;
        } 
        .nav-cate{
            margin-left: -10px;
            margin-right: -10px;
        }

        .nav-cate2{
            margin-left: -10px;
            margin-right: -10px;
            padding-right: 10px;
            padding-left: 30px;
            display: none;
            background-color: #DDDDDD;
        }

        .ct-ele1{
            color: #FF914C;
            font-weight: 600;
            margin: 16px 0;
        }

        .ct-ele2{
            width: 100%;
            height: 50px;
        }

        #cele2-search{
            float:left;
            margin-bottom: 5px;
        }

        #cele2-search-ip{
            height: 25px;
            width: 250px;
        }

        #cele2-search-bt{
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            color: white;
            margin-bottom: 5px;
            background-color: #FF5722;
        }

        .cele2-filter-button,
        .cele2-add-button {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            color: white;
            margin-bottom: 5px;
            float: right;
        }

        .cele2-filter-button {
            background-color: #FF5722;
        }

        .cele2-add-button {
            background-color: #4CAF50;
            margin-right: 5px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #FF914C;
            color: white;
        }

        .tb-buttons {
            justify-content: space-around;
        }

        .tb-buttons button {
            padding: 8px 8px;
            border: none;
            cursor: pointer;
            color: white;
        }

        .tb-view-button {
            background-color: #2196F3;
        }

        .tb-edit-button {
            background-color: #FFC107;
        }

        .tb-delete-button {
            background-color: #F44336;
        }

        .model {
            background: rgba(0, 0, 0, 0.3);
            font-family: Arial, Helvetica, sans-serif;
            display: none;
            width: 100%;
            background-color: #b2b2b2;
            height: 250px;
                
        }

        .ft-form-row{
            width:30%;
            float:left;
            height: 30%;
            text-align: left;
            line-height: 100px;
            margin-left: 20px;
        }

        .ft-form-row input,
        .ft-form-row select{
            width: 30%;
        }

        .form-row-radio{
            width: 5% !important;
        }

        .ft-form{
            width: 100%;
            height: 100%;
        }

        .form-row-tit{
            display: inline-block;
            min-width: 160px;
        }

        #form-row-find{
            margin-top:35px;
            width: 87%;
            display: block;
            height: 30px;
            background-color: #4CAF50;
            color: white;
        }

        #employee-table{
            font-size: 13px;
        }

        .Notice-NghiViec {
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
            text-align: center;
            display: none;
        }

        .nvi-tit {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
        }

        .confirm-btn {
            background-color: #4caf50;
            color: white;
        }

        .cancel-btn {
            background-color: #ccc;
            color: black;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="nav-header nav-ele">
                <img src="/bg.png" alt="" class="nav-img">
                <h3 class="nav-tit">Công ty TNHH 3T</h3>
            </div>

            <div class="nav-choice nav-ele">
                <i class="fa fa-light fa-user ti"></i>
                <i class="fa fa-light fa-gear ti"></i>
                <i class="fa fa-light fa-bell ti"></i>
            </div>

            <div class="nav-search nav-ele">
                <form action="" method="get" class="nav-search-form">
                    <input type="text" name="nav-search-ip" class="nav-search-ip" placeholder="Tìm kiếm">
                    <button type="submit" class="nav-search-sub">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

            <div class="nav-cate nav-ele">
                <i class="fa-solid fa-house"></i>
                Tổng quan
            </div>

            <div class="nav-cate nav-ele nav-qlhs" onclick="toggleNavCate2()"">
                <i class="fa-solid fa-file"></i>
                Quản lý hồ sơ
            </div>
            <!--Con của ông trên-->
            <div class="nav-cate2 nav-ele">
                <i class="fa-solid fa-star"></i>
                <a href="direct.php?route=quanlyuv" style="display: inline; color: black;">Quản lý ứng viên</a>
            </div>

            <div class="nav-cate2 nav-ele">
                <i class="fa-solid fa-person"></i>
                <a href="direct.php?route=quanlynv" style="display: inline; color: black;">Quản lý nhân viên </a>
            </div>

            <div class="nav-cate2 nav-ele">
                <i class="fa-solid fa-ban"></i>
                <a href="" style="display: inline; color: black;">Quản lý nghỉ việc </a>
            </div>

            <div class="nav-cate nav-ele">
                <i class="fa-solid fa-person"></i>
                Tuyển dụng
            </div>

            <div class="nav-cate nav-ele">
                <i class="fa-solid fa-money-bill"></i>
                Lương và doanh số
            </div>

            <div class="nav-cate nav-ele">
                <i class="fa-solid fa-door-closed"></i>
                Phòng làm việc
            </div>

            <div class="nav-cate nav-ele">
                <i class="fa-solid fa-book"></i>
                Đào tạo
            </div>
        </div>

        <div class="vung-dem">

        </div>

        <div class="content">
            <h1 class="ct-ele1">Quản lý hồ sơ nhân viên nghỉ việc</h1>
            <div class="ct-ele2">
                    <form action="" method="get" id="cele2-search">
                        <input type="text" name="" id="cele2-search-ip" placeholder="Tìm kiếm theo tên nhân viên">
                        <button type="submit" id="cele2-search-bt">Tìm</button>
                    </form>
                    <button class="cele2-filter-button js-filter-button">Lọc</button>
            </div>
            
            <div class="model js-model">
                <form action="" method="post" id="ft-form">
                    <div class="ft-form-row">
                        <div class="form-row-tit">Mã Nhân Viên:</div>
                        <input type="text" id="ma-nhan-vien" name="ma-nhan-vien" >
                    </div>
                
                    <div class="ft-form-row">
                        <div class="form-row-tit">Tên Nhân Viên:</div>
                        <input type="text" id="ten-nhan-vien" name="ten-nhan-vien" >
                    </div>
                    
                    <div class="ft-form-row">
                        <div class="form-row-tit">Tên Phòng Ban:</div>
                        <input type="text" id="ten-phong-ban" name="ten-phong-ban" >
                    </div>
                    
                    <div class="ft-form-row">
                        <div class="form-row-tit">Tình Trạng Hợp Đồng:</div>
                        <select id="tinh-trang-hop-dong" name="tinh-trang-hop-dong" >
                            <option value="HopDongDaiHan">Hợp Đồng Dài Hạn</option>
                            <option value="HopDongNganHan">Hợp Đồng Ngắn Hạn</option>
                            <option value="HetHopDong">Hết Hợp Đồng</option>
                        </select>
                    </div>
                    
                    <div class="ft-form-row">
                        <div class="form-row-tit">Giới Tính:</div>
                        <input type="radio" class="form-row-radio" id="gioi-tinh-nam" name="gioi-tinh" value="Nam" > Nam 
                        <input type="radio" class="form-row-radio" id="gioi-tinh-nu" name="gioi-tinh" value="Nữ" > Nữ                     
          
                    </div>
                    
                    <div class="ft-form-row">
                        <div class="form-row-tit">Quê Quán:</div>
                        <input type="text" id="que-quan" name="que-quan" >
                    </div>
                    
                    <div class="ft-form-row">
                        <div class="form-row-tit">Chức Vụ:</div>
                        <input type="text" id="chuc-vu" name="chuc-vu" >
                    </div>
                    
                    <div class="ft-form-row">
                        <div class="form-row-tit">Chuyên Môn:</div>
                        <input type="text" id="chuyen-mon" name="chuyen-mon" >
                    </div>

                    <div class="ft-form-row sub">
                        <button type="submit" id="form-row-find" name="find2">Tìm kiếm</button>
                    </div>
                </form>
            </div>
    
            
            <?php
                echo "<table class=\"employee-table\">
                    <tr>
                        <th>Mã Nhân Viên</th>
                        <th>Tên Nhân Viên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày nghỉ</th>
                        <th>Hành động</th>
                    </tr>";

                while($row = mysqli_fetch_array($result2)){
                        echo "<tr>";
                        echo "<td>".$row['maNV']."</td>";
                        echo "<td>".$row['tenNV']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['sdt']."</td>";
                        echo "<td>".$row['ngayNghi']."</td>";
                        echo "
                        <td>
                            <button class=\"tb-view-button\"><a href=\"./Views/QuanLyNhanSuViews/HoSo/QLNVN/QLNVN-ViewInter.php?maNV=".$row['maNV']."\">Xem</a></button>
                        </td>";
                        echo "</tr>";
                }
                echo "</table>";
            ?>
        </div>

        <div class="Notice-NghiViec js-Notice-NghiViec">
            <form action="" method="post">
                <p class="nvi-tit">Bạn có chắc chắn chọn lựa này không?</p>
                <div class="buttons">
                    <button type="submit" class="confirm-btn">Xác nhận</button>
                    <button type="reset" class="cancel-btn">Hủy</button>
                </div>
            </form>
        </div>

        
    </div>
</body>
</html>

<script>
   function toggleNavCate2() {
    var navCate2List = document.querySelectorAll('.nav-cate2');
    navCate2List.forEach(function(navCate2) {
        if (navCate2.style.display === 'none') {
        navCate2.style.display = 'block';
        } else {
        navCate2.style.display = 'none';
        }
    });
    }

    // Lấy đối tượng button "Lọc" và form
    const filterButton = document.querySelector('.js-filter-button');
    const NghiButton = document.querySelector('.js-nghi');
    const form = document.querySelector('.js-model');
    const formNoticeNghi = document.querySelector('.js-Notice-NghiViec');

    // Bắt sự kiện click vào nút "Lọc"
    filterButton.addEventListener('click', function() {
        // Kiểm tra trạng thái hiển thị của form
        const isFormVisible = form.style.display === 'flex';
        if (isFormVisible) {
            // Thu gọn form và hiển thị lại bảng nhân viên
            form.style.display = 'none';
            document.getElementById('employee-table').style.marginTop = '0';
        } else {
            // Hiển thị form và đẩy bảng nhân viên xuống
            form.style.display = 'flex';
            document.getElementById('employee-table').style.marginTop = '10px'; // Thay đổi giá trị theo yêu cầu của bạn
        }
    });

    // Bắt sự kiện click vào nút "Lọc"
    NghiButton.addEventListener('click', function() {
        // Kiểm tra trạng thái hiển thị của form
        const isFormVisible = formNoticeNghi.style.display === 'block';
        if (isFormVisible) {
            // Thu gọn form và hiển thị lại bảng nhân viên
            formNoticeNghi.style.display = 'none';
        } else {
            // Hiển thị form và đẩy bảng nhân viên xuống
            formNoticeNghi.style.display = 'block';
        }
    });
</script>