<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi hồ sơ ứng tuyển</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .color-primary {
        color: #FF914C !important;
      }
      .background-primary {
        background-color: #FF914C !important;
      }
      .color-white {
        color: #fffcfc !important;
      }
    </style>
</head>
<body class="position-relative">
<div class="d-flex flex-column align-items-center" style="width: 100%;">
    <img src="/QuanLyNhanSu_BTL_PHP/Assets/Images/logoCompany.jpg" width="150">
    <h1>Chào mừng bạn đến công ty may mặc 3T!</h1>
    <h3>Hãy gửi CV ngay để trở thành thành viên của đại gia đình</h3>
    <i class="fa-solid fa-hand-pointer color-primary mt-2 mb-5" style="font-size: 32px; transform: rotateZ(180deg);"></i>
    <div style="width: 800px;">
    <form action="" method="post" enctype="multipart/form-data" id="generalInformation">
        <div class="input-group mb-3">
        <div class="input-group-text"><p class="m-0">Họ tên <strong style="color: red;">*</strong></p></div>
        <input type="text" class="form-control isHaveValue" id="hoTen" name="hoTen" placeholder="VD: Nguyễn Văn A">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text"><p class="m-0">Email <strong style="color: red;">*</strong></p></div>
        <input type="email" class="form-control" id="email" name="email" placeholder="VD: thinhpk26@gmail.com">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text"><p class="m-0">Số điện thoại <strong style="color: red;">*</strong></p></div>
        <input type="text" class="form-control " id="soDienThoai" name="soDT" placeholder="VD: 0987654321">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text"><p class="m-0">Ngày sinh <strong style="color: red;">*</strong></p></div>
        <input type="date" class="form-control isHaveValue" id="ngaySinh" name="ngaySinh">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text"><p class="m-0">Địa chỉ <strong style="color: red;">*</strong></p></div>
        <input type="text" class="form-control isHaveValue" id="diaChi" name="diaChi" placeholder="VD: số 62, đường Phạm Văn Đồng, Cầu Giấy, Hà Nội">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">Tin nhắn của bạn</div>
        <input type="text" class="form-control" name="ghiChu" placeholder="VD: Ứng tuyển chức vụ manager">
        </div>
    </form>
    <form action="" method="post" id="documents">
        <div class="input-group mb-3">
        <div class="input-group-text"><p class="m-0">CV <strong style="color: red;">*</strong></p></div>
        <input type="file" class="form-control isHaveValue isImage" name="CV" placeholder="Chọn ảnh của bạn">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">Sơ yếu lý lịch</div>
        <input type="file" class="form-control isImage" name="soYeuLyLich" placeholder="Chọn ảnh của bạn">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">Đơn xin việc</div>
        <input type="file" class="form-control isImage" name="donXinViec" placeholder="Chọn ảnh của bạn">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">CCCD/Số CMT</div>
        <input type="file" class="form-control isImage" name="CCCD" placeholder="Chọn ảnh của bạn">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">Giấy khai sinh</div>
        <input type="file" class="form-control isImage" name="giayKhaiSinh" placeholder="Chọn ảnh của bạn">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">Sổ hộ khẩu</div>
        <input type="file" class="form-control isImage" name="soHoKhau" placeholder="Chọn ảnh của bạn">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">Giấy khám sức khỏe</div>
        <input type="file" class="form-control isImage" name="giayKhamSucKhoe" placeholder="Chọn ảnh của bạn">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-text">Ảnh 4x4</div>
        <input type="file" class="form-control isImage" name="anh" placeholder="Chọn ảnh của bạn">
        </div>
    </form>
    <form action="" method="post" id="certificateInformation">
        <h6>Chọn chứng chỉ</h6>
        <div>
        <div class="input-group mb-3">
            <div class="input-group-text">Tên chứng chỉ</div>
            <input type="text" class="form-control" name="tenChungChi0">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-text">Ảnh chứng chỉ</div>
            <input type="file" class="form-control isImage" name="anhChungChi0" placeholder="Chọn ảnh của bạn">
        </div>
        </div>
    </form>
    <div>
        <button class="btn btn-primary" onclick="addChungChi(event)">Thêm chứng chỉ</button>
    </div>
    <div class="d-flex justify-content-end">
        <span><strong style="color: red;">*</strong> là những trường bắt buộc</span>
    </div>
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary mt-2 mb-5" data-passevent="confirmGuiHoSo" onclick="confirmSend(event)">Gửi hồ sơ</button>
    </div>
    </div>
</div>

<div class="position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#confirmGuiHoSo">
    <div class="shadow-lg position-relative rounded-3 shadow-lg" style="width: 500px; background-color: #fffcfc;">
        <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;"  data-passevent="confirmGuiHoSo" onclick="toggleNotify(event)">
            <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
        </div>
        <div class="m-4">
        <h5 class="text-center">Xác nhận gửi hồ sơ</h5>
        <p class="mb-5 mt-5">Bạn chắc chắn muốn gửi hồ sơ này? (1 ngày chỉ được 1 lần gửi duy nhất)</p>
        <form action="/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/GuiHoSoController.php" id="extendInformation" method="post" class="m-4" onsubmit="addThongTinHoSo(event)">
            <input type="text" id="iDkeHoachTuyenDung" class="visually-hidden" name="iDKeHoachTuyenDung" value="<?=$iDKeHoachTuyenDung?>">
            <input name="action" value="addThongTinHoSo" class="visually-hidden">
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn background-primary color-white">Xác nhận</button>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/UtilitiesFunction.js"></script>
<script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/GuiHoSoUngTuyen/GuiHoSoUngTuyen.js"></script>
</html>