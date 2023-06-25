<?php
    require_once '../../../../config.php';
    $configg = new config();
    $configg->opendb();
    $maNVV = $_GET['maNV']; 
    $sql = "SELECT * FROM nhanvien WHERE maNV = '$maNVV'";
    $conn = $configg->conn;

    $result = $conn->query($sql);
    $today = date("Y-m-d");
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $row = null; 
    }

    $conn->close(); 
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
            text-decoration: none;
        }

        a{
            color: white;
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
            min-width: 150px;
            font-weight: bold;
        }
        
        .row span {
            margin-left: 10px;
        }

        h2{
            margin-bottom: 15px;
        }

        .btn{
            margin-left: 280px;
        }

        .row > input[type='submit'],
        .row > button
        {
            background-color: green;
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
            min-width: 100px;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="../../../../index.php?route=quanlynv&act=delete" method="post">
            <div class="content">
                <h2>Nhập cho nhân viên nghỉ việc</h2>
                <div class="row">
                    <label>Mã nhân viên:</label>
                    <span><?=$row['maNV']?></span>
                    <input type="text" name="ma-nhan-vien" value="<?=$row['maNV']?>" hidden>
                </div>
                <div class="row">
                    <label>Tên nhân viên:</label>
                    <span><?=$row['tenNV']?></span>
                </div>
                <div class="row">
                    <label>Ngày nghỉ việc:</label>
                    <span><input type="date" name="ngay-nghi-viec" value="<?=$today?>" id=""></span>
                </div>
                <div class="row">
                    <label>Lý do nghỉ việc:</label>
                    <span><textarea id="ly-do" name="ly-do" rows="4" cols="50"></textarea></span>
                </div>
            <!-- Thêm các div khác tương ứng với dữ liệu từ bảng UngVien của bạn -->
                <div class="row btn">
                    <input type="submit" name="but" value="Xác nhận">
                    <button><a href="../index.php?route=quanlynv">Hủy</a></button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
