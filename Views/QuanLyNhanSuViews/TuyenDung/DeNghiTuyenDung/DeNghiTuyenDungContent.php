<?php $this->layout('NhanVienView'); ?>

<?php $this->section('Content'); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <div class="color-primary mb-5 text-center"><h1>Đề nghị tuyển dụng</h1></div>
  <div id="content_container" class="d-flex flex-column align-items-center w-100">
        <div class="content_container__deNghiTruocDo accordion" style="width: 500px;">
            <h5 class="mb-4">Các đề nghị trước đó</h5>
            <div class="accordion" id="accordionExample">
            <?php
              $deNghiTuyenDungList;
              for($i = 0; $i <count($deNghiTuyenDungList); $i++) {
                  echo '<div class="accordion-item">
                  <h2 class="accordion-header" id="'. 'row'. $i .'">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#'. 'btn'. $i .'" aria-expanded="true" aria-controls="'. 'btn'. $i .'">
                    '. 'Đề nghị của bạn: ' . '<strong class="ms-2">' .$deNghiTuyenDungList[$i]->noiDung. '</strong>' . '
                    </button>
                  </h2>
                  <div id="'. 'btn'. $i .'" class="accordion-collapse collapse" aria-labelledby="'. 'row'. $i .'" data-bs-parent="#accordionExample">
                    <div class="accordion-body">'
                    . 'Phản hồi của quản lý nhân sự: '. '<strong class="ms-2">' . $deNghiTuyenDungList[$i]->phanHoi . '</strong>'
                    .'</div>
                  </div>
                </div>';
              }
            ?>
            </div>
        </div>
        <div class="content_container__guiDeNghi mt-5" style="width: 500px;">
            <form action="/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/DeNghiTuyenDung/CreateDeNghi.php" method="post">
                <h3>Viết đề nghị gửi cho quản lý nhân sự</h3>
                <hr>
                <div class="mb-3">
                    <label for="deNghi" class="form-label">Viết đề nghị</label>
                    <input type="text" class="form-control" id="deNghi" name="deNghi" placeholder="Đề nghị của bạn">
                </div>
                <button type="submit" class="btn btn-primary">Gửi đề nghị</button>
            </form>
        </div>
    </div>
<?php $this->end(); ?>