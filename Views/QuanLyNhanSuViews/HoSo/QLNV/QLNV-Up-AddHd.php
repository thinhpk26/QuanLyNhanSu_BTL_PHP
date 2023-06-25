
<!DOCTYPE html>
<html>
<head>
  <title>Form Nhập Thông Tin Hợp Đồng Nhân Viên</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .container-tit {
      background-color:  #f57d00;
      padding: 10px;
      color: white
    }

    h1 {
      text-align: center;
    }

    .form-container {
      max-width: 800px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      padding: 20px;
      background-color: #D9D9D9;
    }

    .form-group {
      flex-basis: 50%;
      margin-bottom: 20px;
    }

    .form-group input {
      max-width: 300px;
    }

    .form-group label {
      display: block;
      font-style: italic;
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

    .sub {
      text-align: center;
      margin: 0 auto;
    }

    .sub input {
      width: 100px;
      padding: 10px;
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-bottom: 10px;
    }

    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <form method="post" action="../../../../direct.php?route=quanlynv&act=add" class="form-container">
    <div class="container-tit">
      <h1>Form Sửa Thông Tin Hợp Đồng Nhân Viên</h1>
    </div>
    <div class="container">
      <div class="form-group">
        <label for="loai-hop-dong">Loại hợp đồng:</label>
        <select id="loai-hop-dong" name="loai-hop-dong">
          <option value="toan-thoi-gian">Toàn thời gian</option>
          <option value="ban-thoi-gian">Bán thời gian</option>
        </select>
      </div>

      <div class="form-group">
        <label for="ma-nhan-vien">Mã nhân viên:</label>
        <input type="text" id="ma-nhan-vien" name="ma-nhan-vien" value="<?=$_GET['maNV']?>" readonly>
      </div>

      <div class="form-group">
        <label for="dai-dien">Đại diện:</label>
        <input type="text" id="dai-dien" name="dai-dien" >
      </div>

      <div class="form-group">
        <label for="ngay-ky">Ngày ký:</label>
        <input type="date" id="ngay-ky" name="ngay-ky" >
      </div>

      <div class="form-group">
        <label for="ngay-hieu-luc">Ngày hiệu lực:</label>
        <input type="date" id="ngay-hieu-luc" name="ngay-hieu-luc" >
      </div>

      <div class="form-group">
        <label for="ngay-het-han">Ngày hết hạn:</label>
        <input type="date" id="ngay-het-han" name="ngay-het-han" >
      </div>

      <div class="form-group">
        <label for="luong">Lương:</label>
        <input type="number" id="luong" name="luong" >
      </div>

      <div class="form-group">
        <label for="ngay-tra-luong">Ngày trả lương:</label>
        <input type="text" id="ngay-tra-luong" name="ngay-tra-luong" >
      </div>

      <div class="form-group">
        <label for="phu-cap">Phụ cấp:</label>
        <input type="number" id="phu-cap" name="phu-cap" >
      </div>

      <div class="form-group">
        <label for="bao-hiem">Bảo hiểm:</label>
        <input type="text" id="bao-hiem" name="bao-hiem" >
      </div>

      <div class="sub">
        <input type="submit" name="addHdBtn" value="Xác nhận sửa">
      </div>
    </div>

  </form>
</body>
</html>
