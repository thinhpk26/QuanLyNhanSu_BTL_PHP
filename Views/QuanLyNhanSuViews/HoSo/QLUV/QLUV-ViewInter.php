<?php
    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị thông tin UngVien</title>
    <style>

        *{
            margin: 0;
            padding: 0;
        }
        .container{
            background-color: #D9D9D9;
            height: 1000px;
        }

        .content {
            max-width: 800px;
            margin: 0px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
        }
        
        .row {
            display: flex;
            margin-bottom: 10px;
        }
        
        .row label {
            width: 150px;
            font-weight: bold;
        }
        
        .row span {
            margin-left: 10px;
        }

        h2{
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2>Thông tin Ứng Viên</h2>
            <div class="row">
                <label>Mã ứng viên:</label>
                <span><?=$row['maUV']?></span>
            </div>
            <div class="row">
                <label>Tên ứng viên:</label>
                <span><?=$row['tenUV']?></span>
            </div>
            <div class="row">
                <label>Ngày nộp hồ sơ:</label>
                <span><?=$row['ngayNop']?></span>
            </div>
            <div class="row">
                <label>Giới tính:</label>
                <span><?=$row['sex']?></span>
            </div>
            <div class="row">
                <label>Ngày sinh:</label>
                <span><?=$row['ngaySinh']?></span>
            </div>
            <div class="row">
                <label>Quê quán:</label>
                <span><?=$row['queQuan']?></span>
            </div>
            <div class="row">
                <label>Email:</label>
                <span><?=$row['email']?></span>
            </div>
            <div class="row">
                <label>Số điện thoại:</label>
                <span><?=$row['sdt']?></span>
            </div>
            <div class="row">
                <label>Vị trí ứng tuyển:</label>
                <span><?=$row['viTriUT']?></span>
            </div>
        <!-- Thêm các div khác tương ứng với dữ liệu từ bảng UngVien của bạn -->
        </div>
    </div>
</body>
</html>
