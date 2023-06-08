<?php declare(strict_types = 1)?>
<?php $this->layout('QuanLyNhanSuView')?>
<?php $this->section('Content'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="color-primary mb-5 text-center"><h1>Đề nghị tuyển dụng</h1></div>
    <div class="allDeNghi" style="width: 700px;">
        <div class="shadow bg-body rounded border-1">
            <div class="m-3">
                <h5>Đề nghị tuyển dụng</h5>
                <span class="fs-6">Từ phòng ban: <strong>phòng công nghệ</strong></span>
            </div>
            <hr>
            <div class="m-3">
                <p class="color-primary">Hiện nay đang thiếu khoảng 3 nhân viên công nghệ thông tin</p>
            </div>
            <hr>
            <form class="m-3" action="" method="post">
                <input type="text" class="form-control" name="phanHoi" placeholder="Nhập phản hồi">
                <div class="d-flex justify-content-end">
                <button type="submit" class="mt-3 mb-3 btn btn-outline-primary">Phản hồi</button>
                </div>
            </form>
        </div>
    </div>


<?php $this->end(); ?>