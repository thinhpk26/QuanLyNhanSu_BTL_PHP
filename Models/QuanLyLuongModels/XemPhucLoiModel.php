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
        padding: 20px;
        background-color: #f0f0f0;
    }
    .RContent p {
        color: orange;
        font-size: 40px;
        text-align: center;
        font-weight: bold;
        margin-bottom: 30px;
    }
    .RContent table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    .RContent th {
        background-color: #ffa500;
        color: white;
        padding: 8px;
        font-size: 25px;
    }

    .RContent td {
        padding: 8px;
        text-align: center;
        font-weight: bold;
    }
    .orange-button {
       
        background-color: orange;
        color: white;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        width: fit-content;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 25px;
        font-weight: bold;
        cursor: pointer;
        margin: 0 auto;
        margin-top: 120px;
    }
    .orange-button-1 {
       
       background-color: red;
       color: white;
       text-align: center;
       display: flex;
       justify-content: center;
       align-items: center;
       width: fit-content;
       padding: 10px 20px;
       border: none;
       border-radius: 4px;
       font-size: 25px;
       font-weight: bold;
       cursor: pointer;
       margin: 0 auto;
       margin-top: 30px;
   }
   .ploi {
    background-color: orange;
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
                <ul>
                    <li>
                        <i class="fa fa-user fa-2x"></i>
                        <a href="XemDoanhSoModel.php">Doanh số</a>
                    </li>
                </ul>
                <ul class="ploi">
                    <li>
                        <i class="fa fa-star fa-2x"></i>
                        <a href="#">Phúc lợi</a>
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
        <p>Phúc Lợi</p>
    <?php
include_once('QuanLyLuongModel.php');

class PhucLoiModel extends QuanLyLuongModel
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

    public function displayPhucLoi()
    {
      
        $this->open_db();

        $sql = "SELECT TenPL, MoTaPL, SoTien, DonVi, HanSuDung FROM PhucLoi";
        $result = $this->condb->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>Tên Phúc lợi</th>";
            echo "<th>Mô tả</th>";
            echo "<th>Số lượng</th>";
            echo "<th>Đơn vị</th>";
            echo "<th>Hạn Sử Dụng</th>";
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["TenPL"]. "</td>";
                echo "<td>" . $row["MoTaPL"]. "</td>";
                echo "<td>" . $row["SoTien"]. "</td>";
                echo "<td>" . $row["DonVi"]. "</td>";
                echo "<td>" . $row["HanSuDung"]. "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Không có dữ liệu";
        }

        
        $this->close_db();
    }

}

$inforDb = new stdClass();
$inforDb->host = 'localhost';
$inforDb->pass = '';
$inforDb->user = 'root';
$inforDb->db = 'quanlyluong';
$dscnModel = PhucLoiModel::withDifferentHost($inforDb);
$dscnModel->displayPhucLoi();
?>
<form method="post">
    <input type="button" name="Xem" value="Khiếu Nại" class="orange-button-1">
</form>
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