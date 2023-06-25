<?php $this->layout('QuanLyNhanSuView'); ?>

<?php $this->section('Content'); ?>
  <div>
    <h2 class="text-center mb-5">
      <strong>Kế hoạch đang thực thi</strong>
    </h2>
    <div>
      <table class="table table-hover table-bordered">
        <thead class="background-primary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Thời gian triển khai</th>
            <th scope="col">Ghi chú</th>
            <th scope="col">Website đăng tuyển</th>
            <th scope="col">Hồ sơ</th>
          </tr>
        </thead>
        <tbody>
            <?php $content = 1;
            foreach($keHoachTuyenDungList as $keHoachTuyenDung) {?>
            <tr>
                <th scope="row"><?=$content?></th>
                <td><?=$keHoachTuyenDung->iD?></td>
                <td><?=$keHoachTuyenDung->thoiGianTrienKhai?></td>
                <td><?=$keHoachTuyenDung->ghiChu?></td>
                <td style="cursor: pointer;">
                    <a href="/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/WebsiteTuyenDungController.php?iDKeHoachTuyenDung=<?=$keHoachTuyenDung->iD?>" style="color: #000">Xử lý website đã đăng tuyển</a>
                </td>
                <td>
                    <a href="/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/XuLyHoSoUngTuyenController.php?iDKeHoachTuyenDung=<?=$keHoachTuyenDung->iD?>" style="color: #000">Xử lý hồ sơ</a>
                </td>
            </tr>
          <?php $content++;?>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
<?php $this->end(); ?>