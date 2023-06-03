<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/QuanLyNhanSu_BTL_PHP/content/grid.css">
    <script src="https://kit.fontawesome.com/181ea712f3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/QuanLyNhanSu_BTL_PHP/content/style.css">
</head>
<body>
    <div class="container">
        <div class="navbar">
            <div class="nav-header nav-ele">
                <img src="./bg.png" alt="Anh logo" class="nav-img">
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
                Quản lý ứng viên
            </div>

            <div class="nav-cate2 nav-ele">
                <i class="fa-solid fa-person"></i>
                Quản lý nhân viên
            </div>

            <div class="nav-cate2 nav-ele">
                <i class="fa-solid fa-ban"></i>
                Quản lý nghỉ việc
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

        <div class="content">

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
</script>
