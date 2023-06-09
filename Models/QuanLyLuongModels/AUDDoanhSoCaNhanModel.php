<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Công ty TNHH 3T</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    

</head>
<style>
    @font-face {
        font-family: Arial;
        src: url(./Font/SVN-Arial\ 2.ttf);
    }
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed, 
    figure, figcaption, footer, header, hgroup, 
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }
    /* HTML5 display-role reset for older browsers */
    article, aside, details, figcaption, figure, 
    footer, header, hgroup, menu, nav, section {
        display: block;
    }
    body {
        line-height: 1;
    }
    ol, ul {
        list-style: none;
    }
    blockquote, q {
        quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
        content: '';
        content: none;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    
    /* Code was started here */
    body {
        width: 100vw;
        height: 100vh;
        display: flex;
    }
    /* Left Content */
    .LContent {
        width: 20vw;
        height: 100%;
    }
    
    .LContent .logo {
        margin-left: 20px;
        width: 100%;
        display: flex;
        
    }
    
    .logo img {
        width: 30%;
        height: 100px;
    }
    .logo p {
        display: inline-block;
        text-align: center;
        font-size: 20px;
        color: orange;
        font-weight: bold;
        margin-top: 35px;
        font-family: Arial;
    }
    .contain  {
        display: flex;
        width: 100%;
        height: 40px;
        margin-top: 20px;
    }
    
    .contain i {
        color: silver;
        margin-left: 60px;
    }
    .contain i:hover {
        color: orange;
    }
    .contain i.selected {
        color: orange;
    }
    form {
        width: 100%;
        display: grid;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }
    
    form .search {
        width: 300px;
        padding: 10px;  
        font-size: 16px;
        border-color: white;
        background-color: rgb(235, 235, 235);
    }
    .ChucNang  {
        display: block;
    }
    
    .ChucNang ul {
        display: flex;
    }
    
    .ChucNang ul li {
        display: inline-block;
        margin-top:30px;
        margin-left: 20px;
        padding: 5px;
    }
    .ChucNang ul li a {
        width: 70%;
        margin-left: 20px;
        text-decoration: none;
        color: black;
        font-size: 25px;
        font-weight: 500;
        font-family: Arial;
    }
    
    /* Right Content */
    .RContent {
        width: 80vw;
        height: 100%;
        background-color: rgb(236, 236, 236);
        flex-grow: 1;
        overflow-y: auto;
    }
    .ChucNang ul li a:hover{
        border-color: orange;
        color: orange;
    }
    .ChucNang ul {
        display: flex;
        align-items: center;
        position: relative;
        padding: 0;
        margin: 0;
        border-bottom: 1px solid white;
        transition: border-color 0.3s;
    }
    
    .ChucNang ul.selected {
        border-color: orange;
        background-color: orange;
    }
    
    .ChucNang ul.selected a {
        color: white;
    }
    
    .ChucNang ul.selected i {
        color: white;
    }
    
    .ChucNang ul.selected::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 20px;
        background-color: orange;
    }
/* RContent */
    .RContent {
        width: 80vw;
    }
    .RContent h3 {
        color: blue;
        font-size: 40px;
        font-weight: bold;
        font-family: Arial;
    }
    
    .RContent form {
        background-color: lightsalmon;
        padding: 20px;
        position: relative;
    }
    
    
    .RContent label {
        font-size: 20px;
        font-weight: bold;
        color: white;
        margin-bottom: 5px;
    }
    
    .RContent input[type="text"] {
        border: none;
        border-bottom: 2px solid white;
        background-color: transparent;
        color: white;
        padding: 5px;
        margin-bottom: 10px;        
    }
    
    .RContent input[type="text"]::placeholder {
        color: red;
        opacity: 0.5;
    }
    
    .RContent input[type="submit"] {
        background-color: transparent;
        color: white;
        border: 2px solid white;
        padding: 10px 20px;
        cursor: pointer;
    }
    
    .RContent input[type="submit"]:hover {
        background-color: white;
        color: orange;
    }
    .message {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: 350px;
        margin-right: 360px;
        background-color: orange;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .message_sua {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: 740px;
        margin-right: 300px;
        background-color: orange;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .message_xoa {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: 900px;
        margin-right: 300px;
        background-color: orange;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
    }
    .dso {
        background-color: orange;
    }
    .dso a {
        color: white;
    }
</style>
<body>
    <div class="LContent">
        <div class="logo">
            <img src="./bg.png">
            <p>Công ty TNHH 3T</p>
        </div>
        <div class="contain">
            <i class="fa fa-light fa-user fa-3x"></i>
            <i class="fa fa-light fa-gear fa-3x"></i>
            <i class="fa fa-light fa-bell fa-3x"></i>
        </div>
        <form>
            <input type="text" style="font-family: 'Font Awesome 5 Free'; font-weight:700; " name="search" class="search" placeholder=" &#xf002; Tìm kiếm...">
        </form>
        <div class="ChucNang">
            <ul>
                <li>    
                    <i class="fa fa-home fa-2x"></i>
                    <a href="NhanVienView.php">Tổng quan</a>
                </li>
            </ul>
            <ul>
                <li>    
                    <i class="fa fa-calendar fa-2x"></i>
                    <a href="#">Chấm công</a>
                </li>
            </ul>
            <ul>
                    <li>    
                        <i class="fa fa-money fa-2x"></i>  
                        <a href="XemLuongModel.php">Lương</a>
                    </li>
                </ul>
                <ul class="dso">
                    <li>
                        <i class="fa fa-user fa-2x"></i>
                        <a href="XemDoanhSoModel.php">Doanh số</a>
                    </li>
                </ul>
                <ul>
                    <li>
                        <i class="fa fa-star fa-2x"></i>
                        <a href="XemPhucLoiModel.php">Phúc lợi</a>
                    </li>
                </ul>
            <ul>
                <li>    
                    <i class="fa fa-group fa-2x"></i> 
                    <a href="#">Phòng làm việc</a>
                </li>
            </ul>
            <ul>
                <li>    
                    <i class="fa fa-book fa-2x"></i> 
                    <a href="#">Đào tạo</a>
                </li>
            </ul>
            <ul>
                <li>    
                    <i class="fa fa-solid fa-bullhorn fa-2x"></i>   
                    <a href="#">Thông Báo</a>
                </li>
            </ul>
            
        </div>
    </div>
    <div class="RContent">
        <form name="nhap" method="post">
            <h3>Thêm Doanh Số Cá Nhân</h3>
            <label for="money">Nhập doanh số yêu cầu</label>
            <input type="text"  name="money_yc" required>
            <label for="money">Nhập doanh số hiện tại</label>
            <input type="text"  name="money_ht" required>
            <label for="money">Nhập đơn vị</label>
            <input type="text"  name="dvi" required>
            <label for="money">Mã Nhân Viên</label>
            <input type="text"  name="mnv" required>
            <label for="money">Ngày Cập Nhật</label>
            <input type="text"  name="date" required>
            <input type="submit" value="Thêm">
        </form>
        <?php
            include_once('QuanLyLuongModel.php');
            
            class ADDDoanhSoModel extends QuanLyLuongModel
            {
                public static function withDifferentHost($host)
                {
                    $instance = new self();
                    $instance->host = $host->host;
                    $instance->user = $host->user;
                    $instance->pass = $host->pass;
                    $instance->db = $host->db;
                    return $instance;
                }
                
                public function insertDS()
                {
                    if (isset($_POST['money_yc'],$_POST['money_ht'], $_POST['dvi'], $_POST['mnv'], $_POST['date'])) {
                    $this->open_db();
                    $money_yc = $_POST['money_yc'];
                    $money_ht = $_POST['money_ht'];
                    $dvi = $_POST['dvi'];
                    $mnv = $_POST['mnv'];
                    $date = $_POST['date'];
                    
                    $sql_check = "SELECT * FROM DoanhSoCaNhan WHERE maNV = '$mnv'";
                    $result_check = $this->condb->query($sql_check);
                    if ($result_check->num_rows > 0) {
                        echo "<span class='message'>Bạn đã nhập Doanh Số cho nhân viên này</span>";
                    }
                    else {
                    $sql = "INSERT INTO DoanhSoCaNhan (DSYeuCau,DSHienTai, DonVi,NgayCapNhat, maNV)
                            VALUES ('$money_yc','$money_ht','$dvi','$date','$mnv')";

                    $result = $this->condb->query($sql);
                    if ($result) {
                        echo "<span class='message'>Thêm dữ liệu thành công</span>";
                    } else {
                        echo "<span class='message'>Không thể thêm dữ liệu</span> " . $this->condb->error;
                    }
                }
                    $this->close_db();
                    }
                }
            
            }
            
            $inforDb = new stdClass();
            $inforDb->host = 'localhost';
            $inforDb->pass = '';
            $inforDb->user = 'root';
            $inforDb->db = 'quanlynhansu';
            $dscnModel = ADDDoanhSoModel::withDifferentHost($inforDb);
            $dscnModel->insertDS();
        ?>
        <form name="nhap2"method="POST">
            <h3>Sửa Doanh Số Cá Nhân</h3>
            <label for="manv_sua">Nhập Mã của Nhân Viên cần sửa</label>
            <input type="text"  name="manv_sua" required>
            <label for="money_sua">Nhập Doanh số Yêu Cầu</label>
            <input type="text"  name="moneyyc_sua" required>
            <label for="dvi_sua">Nhập Doanh số Hiện tại</label>
            <input type="text"  name="moneyht_sua" required>
            <label for="dvi_sua">Nhập Đơn vị</label>
            <input type="text"  name="dvi_sua" required>
            <label for="date_sua">Ngày Cập Nhật Mới</label>
            <input type="text"  name="date_sua" required>
            <input type="submit" value="Sửa" name="FIX">
        </form>
        <?php
            include_once('QuanLyLuongModel.php');
            
            class UDDSModel extends QuanLyLuongModel
            {
                public static function withDifferentHost($host)
                {
                    $instance = new self();
                    $instance->host = $host->host;
                    $instance->user = $host->user;
                    $instance->pass = $host->pass;
                    $instance->db = $host->db;
                    return $instance;
                }
                
                public function updateDS()
                {
                    if (isset($_POST['moneyyc_sua'], $_POST['moneyht_sua'],$_POST['dvi_sua'], $_POST['manv_sua'], $_POST['date_sua'])) {
                    $this->open_db();
                    $moneyyc_sua = $_POST['moneyyc_sua'];
                    $moneyht_sua = $_POST['moneyht_sua'];
                    $dvi_sua = $_POST['dvi_sua'];
                    $mnv_sua = $_POST['manv_sua'];
                    $date_sua = $_POST['date_sua'];
                    
                    $sql_check_sua = "SELECT * FROM doanhsocanhan WHERE maNV = '$mnv_sua'";

                    $result_check_sua = $this->condb->query($sql_check_sua);
                    if ($result_check_sua->num_rows > 0) {
                        $sql = "UPDATE doanhsocanhan 
                        SET DSYeuCau = '$moneyyc_sua',
                            DSHienTai = '$moneyht_sua',
                            DonVi = '$dvi_sua',
                            NgayCapNhat = '$date_sua'
                        WHERE maNV = '$mnv_sua'";
                

                    $result = $this->condb->query($sql);
                    if ($this->condb->query($sql)) {
                        echo "<span class='message_sua'>Thông tin đã được sửa thành công</span>";
                    } else {
                        echo "<span class='message_sua'>Không thể sửa dữ liệu</span> " . $this->condb->error;
                    }
                       
                    }
                    else {
                        echo "<span class='message_sua'>Không có thông tin doanh số của nhân viên</span>";
                }
                    $this->close_db();
                    }
                }
            
            }
            
            $inforDb = new stdClass();
            $inforDb->host = 'localhost';
            $inforDb->pass = '';
            $inforDb->user = 'root';
            $inforDb->db = 'quanlynhansu';
            $dscnModel = UDDSModel::withDifferentHost($inforDb);
            $dscnModel->updateDS();
        ?>
        <form name="nhap2"method="POST">
            <h3>Xóa Doanh Số Cá Nhân</h3>
            <label for="manv_sua">Nhập Mã của Nhân Viên cần xóa</label>
            <input type="text"  name="manv_xoa" required>
            <input type="submit" value="Xóa">
        </form>
        <?php
            include_once('QuanLyLuongModel.php');
            
            class DELLDSModel extends QuanLyLuongModel
            {
                public static function withDifferentHost($host)
                {
                    $instance = new self();
                    $instance->host = $host->host;
                    $instance->user = $host->user;
                    $instance->pass = $host->pass;
                    $instance->db = $host->db;
                    return $instance;
                }
                
                public function deleteDS()
                {
                    if (isset($_POST['manv_xoa'])) {
                    $this->open_db();
                    $mnv_xoa = $_POST['manv_xoa'];
                    
                    $sql_xoa= "SELECT * FROM doanhsocanhan WHERE maNV = '$mnv_xoa'";

                    $result_xoa= $this->condb->query($sql_xoa);
                    if ($result_xoa->num_rows > 0) {
                        $sql = "DELETE FROM doanhsocanhan
                        WHERE maNV = '$mnv_xoa'";
                

                    $result = $this->condb->query($sql);
                    if ($this->condb->query($sql)) {
                        echo "<span class='message_xoa'>Thông tin đã được xóa thành công</span>";
                    } else {
                        echo "<span class='message_xoa'>Không thể sửa dữ liệu</span> " . $this->condb->error;
                    }
                       
                    }
                    else {
                        echo "<span class='message_xoa'>Không có thông tin doanh số của nhân viên</span>";
                }
                    $this->close_db();
                    }
                }
            
            }
            
            $inforDb = new stdClass();
            $inforDb->host = 'localhost';
            $inforDb->pass = '';
            $inforDb->user = 'root';
            $inforDb->db = 'quanlynhansu';
            $dscnModel = DELLDSModel::withDifferentHost($inforDb);
            $dscnModel->deleteDS();
        ?>
    </div>
</body>
<script>
        // Get all the list items within the "ChucNang" class
    
            // Lấy tất cả các phần tử ul trong .ChucNang
            const chucNangItems = document.querySelectorAll('.ChucNang ul');
        
            // Thêm bộ lắng nghe sự kiện click cho mỗi phần tử ul
            chucNangItems.forEach((item) => {
                item.addEventListener('click', function () {
                    // Xóa lớp "selected" khỏi tất cả các phần tử ul trong .ChucNang
                    chucNangItems.forEach((item) => {
                        item.classList.remove('selected');
                    });
        
                    // Thêm lớp "selected" vào phần tử ul được click
                    this.classList.add('selected');
                });
            });
    
        
        const containItems = document.querySelectorAll('.contain i');

        // Add click event listener to each list item
        containItems.forEach((item) => {
            item.addEventListener('click', function () {
                // Remove the "selected" class from all list items
                containItems.forEach((item) => {
                    item.classList.remove('selected');
                });

                // Add the "selected" class to the clicked list item
                this.classList.add('selected');
            });
        });
        function handleLinkClick(event) {
            event.preventDefault();
            loadContent('XemLuong.php');
        }
        
    </script>

</html>