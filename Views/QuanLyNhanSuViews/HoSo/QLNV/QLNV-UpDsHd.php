<!DOCTYPE html>
<html>
<head>
    <title>Bảng hợp đồng</title>
    <style>
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
            background-color: #f57d00;
            color: white;
        }

        .filter-add-buttons {
            display: block;
            margin-bottom: 10px;
            margin-left: 84%;
        }

        .filter-button,
        .add-button {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            color: white;
        }

        .filter-button {
            background-color: #FF5722;
        }

        .add-button {
            background-color: green;
        }

        .action-buttons button {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            color: white;
        }

        .view-button {
            background-color: #2196F3;
        }

        .edit-button {
            background-color: #FFC107;
        }

        .delete-button {
            background-color: #F44336;
        }

        .action-buttons button {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            color: white;
        }

        .view-button {
            background-color: #2196F3;
        }

        .dshd-formm-tit{
            padding: 10px;
            display: inline-block;
            border-radius: 5px;
            margin-left: 5%;
            margin-top: 10px;
            background-color: #f57d00;
        }

        .tablee{
            width: 90%;
            margin: 0 5%;
        }

        .model {
            background: rgba(0, 0, 0, 0.3);
            font-family: Arial, Helvetica, sans-serif;
            display: block;
            background-color: #b2b2b2;
            height: 300px;
            margin-left: 5%;   
            margin-right: 5%;  
            margin-bottom: 10px;
        }

        .ft-form-row{
            width:45%;
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

    </style>
</head>
<body>
    <div class="dshd-formm-tit">
            <h1>Danh sách hợp đồng</h1>
    </div>
    <div class="filter-add-buttons">
        <button class="filter-button js-filter-button">Lọc</button>
        <button class="add-button js-add-employee"><a href="../QLNV/QLNV-Up-AddHd.php?maNV=<?=$_GET['maNV']?>">Thêm</a></button>
    </div>

    <div class="model js-model">
        <form action="./index.php?act=search" method="post" id="ft-form">
            <div class="ft-form-row">
                <div class="form-row-tit">Mã Hợp Đồng:</div>
                <input type="text" id="ma-nhan-vien" name="ma-nhan-vien" >
            </div>
        
            <div class="ft-form-row">
                <div class="form-row-tit">Đại diện:</div>
                <input type="text" id="ten-nhan-vien" name="ten-nhan-vien" >
            </div>
            
            <div class="ft-form-row">
                <div class="form-row-tit">Ngày ký:</div>
                <input type="text" id="ten-phong-ban" name="ten-phong-ban" >
            </div>
            
            <div class="ft-form-row">
                <div class="form-row-tit">Tình Trạng Hợp Đồng:</div>
                <select id="tinh-trang-hop-dong" name="tinh-trang-hop-dong" >
                    <option value="Dang-Hieu-Luc">Đang hiệu lực</option>
                    <option value="Da-Huy">Đã Hủy</option>
                </select>
            </div>
            
            <div class="ft-form-row">
                <div class="form-row-tit">Loại Hợp Đồng:</div>
                <select id="loai-hop-dong" name="loai-hop-dong" required>
                    <option value="thuc-tap">Hợp đồng thực tập</option>
                    <option value="thu-viec">Hợp đồng thử việc</option>
                    <option value="chinh-thuc">Hợp đồng nhân viên chính thức</option>
                </select>          
    
            </div>
            

            <div class="ft-form-row sub">
                <button type="submit" id="form-row-find" name="find">Tìm kiếm</button>
            </div>
        </form>
    </div>
    
    <?php
                echo "<table class=\"tablee\">
                    <tr>
                        <th>Mã hợp đồng</th>
                        <th>Loại hợp đồng</th>
                        <th>Ngày hiệu lực</th>
                        <th>Ngày hết hiệu lực</th>
                        <th>Tình trạng</th>
                        <th>Hành động</th>
                    </tr>";

                while($row4 = mysqli_fetch_array($result4)){
                    echo "<tr>";
                    echo "<td>".$row4['maHD']."</td>";
                    echo "<td>".$row4['loaiHD']."</td>";
                    echo "<td>".$row4['ngayHieuLuc']."</td>";
                    echo "<td>".$row4['ngayHet']."</td>";
                    echo "<td>".$row4['tinhTrangHD']."</td>";
                    echo "
                    <td class=\"action-buttons\">
                        <button class=\"view-button\"><a href=\"./QLNV-LookHd.php?maHD=".$row4['maHD']."\">Xem</a></button>
                    </td>";
                    echo "</tr>";
                }

            ?>
</body>
</html>

<script>
    const filterButton = document.querySelector('.js-filter-button');
    const form = document.querySelector('.js-model');

    // Bắt sự kiện click vào nút "Lọc"
    filterButton.addEventListener('click', function() {
        // Kiểm tra trạng thái hiển thị của form
        const isFormVisible = form.style.display === 'block';
        if (isFormVisible) {
            // Thu gọn form và hiển thị lại bảng nhân viên
            form.style.display = 'none';
        } else {
            // Hiển thị form và đẩy bảng nhân viên xuống
            form.style.display = 'block';
        }
    });
</script>
