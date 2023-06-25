<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Công ty TNHH 3T</title>
    <script src="https://kit.fontawesome.com/181ea712f3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

        .cover_all{
            width: 100%;
            position: relative;
            flex-wrap: wrap;
        }

        .navbar{
            position: fixed;
            width: 350px; 
            height: 100%;
            background-color: white;
            padding: 10px;
            border-right: 1px solid #ccc;
        }

        .vung-dem{
            width: calc(16% + 20px);
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
            display: flex;
            align-items: center;
            font-size: 18px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: 600;
            line-height: 38px;
            height: 60px;
        }

        .nav-cate:hover,
        .nav-cate2:hover{
            background-color: #f57d00;
            cursor: pointer;
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
        .content {
            margin-left: 350px;
            padding: 24px;
        }
        .color-primary {
            color: #FF914C !important;
        }
        .background-primary {
            background-color: #FF914C !important;
        }
        .accordion-button {
            padding: 1rem 0;
        }
        .accordion-button:focus {
            box-shadow: none;
        }
        .accordion-button:not(.collapsed) {
            background-color: transparent;
        }
        .navbar-subItem {
            padding: 6px 12px;
        }
        .navbar-subItem:hover {
            background-color: #FF914C !important;
            cursor: pointer;
        }
        .dropdown-menu  {
            width: max-content;
        }
        .active {
            background-color: #FF914C !important;
        }
    </style>
</head>
<body style="width: 100%; height: 100vh;">
    <div class="cover_all" style="width: 100%; height: 100%">
        <div class="navbar d-block accordion accordion-flush" id="Navbar">
            <div class="nav-header nav-ele">
                <img src="/QuanLyNhanSu_BTL_PHP/View_Engine/bg.png" alt="Anh logo" class="nav-img">
                <h3 class="nav-tit">Công ty TNHH 3T</h3>
            </div>
            <div class="nav-choice nav-ele mt-3">
                <i class="fa fa-light fa-user ti"></i>
                <i class="fa fa-light fa-gear ti"></i>
                <i class="fa fa-light fa-bell ti"></i>
            </div>

            <div class="nav-search nav-ele mt-3">
                <form action="" method="get" class="nav-search-form">
                    <input type="text" name="nav-search-ip" class="nav-search-ip" placeholder="Tìm kiếm">
                    <button type="submit" class="nav-search-sub">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class="nav-cate nav-ele mt-5" id="navItem--tongQuan" onclick="toggleActiveItemNavbar(event)">
                <i class="fa-solid fa-house me-3"></i>
                Tổng quan
            </div>
            <div class="nav-cate nav-ele active" id="navItem--deNghi" onclick="toggleActiveItemNavbar(event)">
                <i class="fa-solid fa-circle-info me-3"></i>
                <a href="/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/DeNghiTuyenDung/deNghiTuyenDung.php" style="color: #000">Đề nghị tuyển dụng</a>
            </div>
            <div class="nav-cate nav-ele" id="navItem--chamCong" onclick="toggleActiveItemNavbar(event)">
                <i class="fa-solid fa-pen me-3"></i>
                Chấm công
            </div>
            <div class="nav-cate nav-ele" id="navItem--luongDoanhSo" onclick="toggleActiveItemNavbar(event)">
                <i class="fa-solid fa-money-bill me-3"></i>
                Lương và doanh số
            </div>
            <div class="nav-cate nav-ele" id="navItem--phongLamViec" onclick="toggleActiveItemNavbar(event)">
                <i class="fa-solid fa-door-closed me-3"></i>
                Phòng làm việc
            </div>

            <div class="nav-cate nav-ele" id="navItem--daoTao" onclick="toggleActiveItemNavbar(event)">
                <i class="fa-solid fa-book me-3"></i>
                Đào tạo
            </div>
            <div style="margin-top: 130px;">
                <form action="/QuanLyNhanSu_BTL_PHP/Controllers/DangNhapController/DangNhapController.php" method="POST" onsubmit="logout(event)">
                    <input class="visually-hidden" name="action" value="logout">
                    <button type="submit" style="outline: none;border: none;background: transparent;">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span style="font-size: 18px; font-weight: bold">logout</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="content" style="height: 100%">
            <?php $this->renderSection('Content'); ?>
        </div>

    </div>       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

        const iDActiveElement = localStorage.getItem('elementActive');
        if(iDActiveElement !== undefined && iDActiveElement !== null) {
            const activeElements = document.getElementsByClassName('active');
            for(let i=0; i<activeElements.length; i++) {
                activeElements[i].classList.remove('active');
            }
            document.getElementById(iDActiveElement).classList.add('active');
        }

        function toggleActiveItemNavbar(event) {
            const currElement = event.currentTarget;
            const activeElements = document.getElementsByClassName('active');
            for(let i=0; i<activeElements.length; i++) {
                activeElements[i].classList.remove('active');
            }
            currElement.classList.add('active');
            localStorage.setItem('elementActive', currElement.id);
        }

        function logout(event) {
            localStorage.removeItem('elementActive');
        }

    </script>
</body>
</html>
