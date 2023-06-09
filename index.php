<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="d-flex justify-content-center align-items-center" style="background: #efefef; height: 100vh;">
    <div class="login d-flex overflow-hidden shadow-sm rounded bg-white" style="width: 680px; height: 450px;">
        <div class="position-relative">
            <img src="/QuanLyNhanSu_BTL_PHP/Assets/Images/Login.jpg" style="width: 230px;margin-top: 50px;margin-left: 30px;" />
        </div>
        <div>
            <form class="p-4 mt-4" action="#" method="post" style="width: 350px;" onsubmit="sendRequestLogin(event)">
                <div class="d-flex flex-column align-items-center">
                    <img src="/QuanLyNhanSu_BTL_PHP/Assets/Images/logoCompany.jpg" alt="Logo công ty" width="50">
                    <h4 class="fw-bold text-nowrap" style="color: #FF8A00; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Công ty TNHH may mặc 3T</h4>
                </div>
                <div class="form-floating mt-4">
                    <input class="form-control" id="username" type="text" name="username"/>
                    <label for="username">Tài khoản</label>
                </div>
                <div class="form-floating mt-4">
                    <input class="form-control" id="password" type="password" name="password"/>
                    <label for="password">Mật khẩu</label>
                </div>
                <div class="input-group mt-3 align-items-center">
                    <div>
                        <input class="form-check-input" id="rememberAccount" class="rememberAccount" type="checkbox" name="rememberAccount"/>
                    </div>
                    <label for="rememberAccount" class="ms-1" style="font-size: 14px;">Ghi nhớ mật khẩu</label>
                </div>
                <div class="d-grid mt-2">
                    <input class="btn btn-primary btn-lg mt-4" type="submit" value="Đăng nhập">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="/QuanLyNhanSu_BTL_PHP/index.js"></script>
</html>
