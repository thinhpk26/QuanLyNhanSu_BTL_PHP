<!DOCTYPE html>
<html>
<head>
    <title>Bảng nhân viên</title>
    
    <script src="https://kit.fontawesome.com/181ea712f3.js" crossorigin="anonymous"></script>
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

        .container{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        .navbar{
            position: fixed;
            width: 16%; 
            background-color: white;
            padding: 10px;
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
            font-size: 14px;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: 600;
            line-height: 38px;
        }

        .nav-cate:hover,
        .nav-cate2:hover{
            background-color: #f57d00;
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

    </style>
</head>
<style>
    .color-primary {
        color: #FF914C;
    }
    .background-primary {
        background-color: #FF914C;
    }
</style>
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
                <a href="" style="display: inline; color: black;">Quản lý ứng viên</a>
                
            </div>

            <div class="nav-cate2 nav-ele">
                <i class="fa-solid fa-person"></i>
                <a href="" style="display: inline; color: black;">Quản lý nhân viên </a>
            </div>

            <div class="nav-cate2 nav-ele">
                <i class="fa-solid fa-ban"></i>
                <a href="" style="display: inline; color: black;">Quản lý nghỉ việc </a>
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
            <?php $this->renderSection('Content'); ?>

        </div>

    </div>       

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
</body>
</html>

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
</script>
