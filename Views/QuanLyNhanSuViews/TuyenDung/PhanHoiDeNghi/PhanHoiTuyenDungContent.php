<?php declare(strict_types = 1)?>
<?php $this->layout('QuanLyNhanSuView')?>
<?php $this->section('Content'); ?>
    <div class="color-primary mb-5 text-center">
        <h1>
        <strong>
            Phản hồi đề nghị tuyển dụng
        </strong>
        </h1>
    </div>
    <div class="allDeNghi container">
        <div class="row gx-3 gy-3 justify-content-center">
            <?php
                foreach($deNghiTuyenDungList as $deNghiTuyenDung) {
            ?>
                <div class="shadow-lg bg-body rounded border border-1 col col-8">
                    <div class="m-3">
                        <h5 class="fw-bold">
                            Đề nghị tuyển dụng
                            <i class="fa-solid fa-triangle-exclamation" style="color: #ceaf12;"></i>
                        </h5>
                        <span class="fs-6">Từ phòng ban: <strong><?=$deNghiTuyenDung->tenPb?></strong></span>
                    </div>
                    <hr>
                    <div class="m-3">
                        <p class="color-primary"><?=$deNghiTuyenDung->noiDung?></p>
                    </div>
                    <hr>
                    <form class="m-3" action="/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/XuLyDeNghi/PhanHoiDeNghi.php" method="post" onsubmit="phanHoiDeNghi(event)">
                        <input name="iD" id="iDDeNghiTuyenDung" class="visually-hidden" value="<?=$deNghiTuyenDung->iD?>">
                        <input type="text" class="form-control" name="phanHoi" placeholder="Nhập phản hồi">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="mt-3 mb-3 btn btn-outline-primary">Phản hồi</button>
                        </div>
                    </form>
                </div>
                <div class="w-100"></div>
            <?php
                }
            ?>
        </div>
    </div>
    <script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/PhanHoiDeNghi/PhanHoiDeNghiContent.js"></script>
<?php $this->end(); ?>