<?php $this->layout('QuanLyNhanSuView') ?>

<?php $this->section('Content'); ?>
  <div id="content-page">
    <h3 class="mb-3 mt-3 fw-bold text-center">Các kế hoạch chờ thực thi</h3>
    <button class="btn btn-primary mb-2" style="width: 100px;" type="button" data-passevent="themKeHoachTuyenDungContainer" onclick="toggleNotify(event)">Thêm</button>
    <div class="overflow-auto" style="height: 618px">
      <table class="table table-hover table-striped mb-0 border border-3 table-bordered">
        <thead>
          <tr>
            <th scope="col" class="background-primary color-white text-center" style="width: 30px;">STT</th>
            <th scope="col" class="background-primary color-white text-center" style="width: 180px;">Thời gian triển khai</th>
            <th scope="col" class="background-primary color-white text-center">Ghi Chú</th>
            <th scope="col" class="background-primary color-white text-center" style="width: 100px;"></th>
            <th scope="col" class="background-primary color-white text-center" style="width: 30px;"></th>
            <th scope="col" class="background-primary color-white text-center" style="width: 30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $html = '';
            for($i=0; $i<count($keHoachTuyenDungList); $i++) {
              $html .= sprintf('<tr data-iD="%s" style="cursor: pointer;" data-passevent="chiTietKeHoachContainer" onclick="showChiTietKeHoach(event)">
                <td scope="row" class="text-center">%d</td>
                <td class="text-center">%s</td>
                <td>%s</td>
                <td class="text-center" style="width: 102px;">
                  <button class="btn btn-primary btn-thucThiKeHoach" data-iD="%s" data-passevent="xacNhanThucThiKeHoach" onclick="showXacNhanThucThiTuyenDung(event)">Thực thi</button>
                </td>
                <td class="text-center">
                  <form method="post">
                    <input type="text" class="visually-hidden" name="iD" value="%s">
                    <button class="btn btn-primary btn-suaKeHoach" type="button" data-passevent="suaKeHoachTuyenDungContainer" onclick="showSuaKeHoachTuyenDung(event)">Sửa</button>
                  </form>
                </td>
                <td class="text-center">
                  <button class="btn btn-primary btn-xoaKeHoach" type="submit" data-iD="%s" data-passevent="xacNhanXoaKeHoachContainer" onclick="showDeleteKeHoachTuyenDung(event)">Xóa</button>
                </td>
              </tr>', $keHoachTuyenDungList[$i]->iD, $i, $keHoachTuyenDungList[$i]->thoiGianTrienKhai, $keHoachTuyenDungList[$i]->ghiChu, $keHoachTuyenDungList[$i]->iD, $keHoachTuyenDungList[$i]->iD, $keHoachTuyenDungList[$i]->iD);
            }
            echo $html;
          ?>
          
        </tbody>
      </table>
    </div>

    <!-- thêm kế hoạch thực thi -->
    <div class="position-absolute justify-content-center align-items-center" data-toggle="#themKeHoachTuyenDungContainer" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;">
      <div class="themKeHoachTuyenDungForm shadow-lg position-relative rounded-3 shadow-lg" style="width: 500px; height: 300px; background-color: #fffcfc;">
        <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="themKeHoachTuyenDungContainer" onclick="toggleNotify(event)">
          <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
        </div>
        <div class="themKeHoachTuyenDungForm__content m-4">
            <h4 class="fw-bold text-center color-primary mb-4">Thêm kế hoạch bảo trì</h4>
            <hr>
            <form action="" method="post">
              <input type="text" name="iD" iD="iD_themKeHoach" class="visually-hidden">
              <label for="thoiGianTrienKhai_themKeHoach">Thời gian triển khai</label>
              <input type="date" class="form-control mb-2" name="thoiGianTrienKhai" id="thoiGianTrienKhai_themKeHoach">
              <label for="ghiChu_themKeHoach">Ghi chú</label>
              <input type="text" class="form-control mb-4" name="ghiChu" id="ghiChu_themKeHoach">
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" onclick="addKeHoachTuyenDung(event)">Thêm kế hoạch</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- sửa kế hoạch thực thi -->
    <div class="suaKeHoachTuyenDungContainer position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#suaKeHoachTuyenDungContainer">
      <div class="suaKeHoachTuyenDungForm shadow-lg position-relative rounded-3 shadow-lg" style="width: 500px; height: 300px; background-color: #fffcfc;">
        <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="suaKeHoachTuyenDungContainer" onclick="toggleNotify(event)">
          <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
        </div>
        <div class="suaKeHoachTuyenDungForm__content m-4">
            <h4 class="fw-bold text-center color-primary mb-4">Thêm kế hoạch bảo trì</h4>
            <hr>
            <form action="" method="post">
              <input type="text" name="iD" iD="iD_suaKeHoach" class="visually-hidden">
              <label for="thoiGianTrienKhai_suaKeHoach">Thời gian triển khai</label>
              <input type="date" class="form-control mb-2" name="thoiGianTrienKhai" id="thoiGianTrienKhai_suaKeHoach">
              <label for="ghiChu_suaKeHoach">Ghi chú</label>
              <input type="text" class="form-control mb-4" name="ghiChu" id="ghiChu_suaKeHoach">
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" onclick="updateKeHoachTuyenDung(event)">Sửa kế hoạch</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    
    <!-- Xác nhận thực thi kế hoạch -->
    <div class="xacNhanThucThiKeHoachTuyenDungContainer position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#xacNhanThucThiKeHoach">
      <div class="xacNhanThucThiKeHoachTuyenDungForm shadow-lg position-relative rounded-3 shadow-lg" style="width: 500px; height: 300px; background-color: #fffcfc;">
        <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="xacNhanThucThiKeHoach" onclick="toggleNotify(event)">
          <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
        </div>
        <div class="xacNhanThucThiKeHoachTuyenDungForm__content m-4">
            <h4 class="fw-bold text-center color-primary mb-4">Xác nhận thực thi</h4>
            <hr>
            <p>Bạn muốn bắt đầu thực thi kế hoạch ngay bây giờ</p>
            <form action="" method="post">
              <input class="visually-hidden" id="xacNhanThucThiKeHoach" name="xacNhanThucThiKeHoach">
              <div class="d-flex justify-content-center" style="margin-top: 120px;">
                <button type="submit" class="btn btn-primary" onclick="confirmToStartKeHoachTuyenDung(event)">Xác nhận</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Xác nhận xóa kế hoạch -->
    <div class="xacNhanXoaKeHoachTuyenDungContainer position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#xacNhanXoaKeHoachContainer">
      <div class="xacNhanXoaKeHoachTuyenDungForm shadow-lg position-relative rounded-3 shadow-lg" style="width: 500px; height: 300px; background-color: #fffcfc;">
        <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;"  data-passevent="xacNhanXoaKeHoachContainer" onclick="toggleNotify(event)">
          <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
        </div>
        <div class="xacNhanXoaKeHoachTuyenDungForm__content m-4">
            <h4 class="fw-bold text-center color-primary mb-4">Xác nhận xóa kế hoạch</h4>
            <hr>
            <p>Bạn muốn xóa kế hoạch</p>
            <form action="">
              <input id="xoaKeHoachInput" name="iD" class="visually-hidden">
              <div class="d-flex justify-content-center" style="margin-top: 120px;">
                <button type="submit" class="btn btn-primary" onclick="deleteKeHoachTuyenDung(event)">Xác nhận</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Chi tiết kế hoạch -->
    <div class="chiTietKeHoachElement position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#chiTietKeHoachContainer">
      <div class="thongTinChiTiet shadow-lg position-relative rounded-3 shadow-lg" style="width: 1000px; height: 650px; background-color: #fffcfc;">
          <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="chiTietKeHoachContainer" onclick="toggleNotify(event)">
            <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
          </div>
          <div>
            <div>
              <h4 class="fw-bold text-center color-primary pt-4">Thông tin chi tiết kế hoạch</h4>
            </div>
            <div class="p-3 overflow-auto" style="height: 300px;">
              <table class="table table-hover table-striped table-bordered">
                <thead class="table-info">
                  <tr>
                    <th scope="col" class="text-center" style="width: 20px;">STT</th>
                    <th scope="col" class="text-center" style="width: 180px;">Vị trí</th>
                    <th scope="col" class="text-center" style="width: 85px;">Số lượng</th>
                    <th scope="col" class="text-center">Kỹ năng cần thiết</th>
                    <th scope="col" class="text-center" style="width: 50px;"></th>
                  </tr>
                </thead>
                <tbody id="ChiTietBaoTriContainer">
                  <tr data-iD="iD-sdfsd" style="cursor: pointer;">
                    <td scope="row" class="text-center">1</td>
                    <td class="text-center">IT engineer</td>
                    <td class="text-center">2</td>
                    <td class="text-center">
                      3 năm kinh nghiệp C#
                    </td>
                    <td class="text-center">
                      <form action="#" method="post">
                        <input type="text" class="visually-hidden" name="iD" value="iD-sdfsd">
                        <button class="btn text-decoration-underline" type="submit">Xóa</button>
                      </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="p-3">
              <form action="#" method="post" onsubmit="addVitriTuyenDung(event)">
                <h5 class="mb-4">Thêm thông tin</h5>
                <div class="mb-3">
                  <input class="visually-hidden" iD="addViTriTuyen" name="iDKeHoachTuyenDung">
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      Vị trí
                    </span>
                    <select class="form-select" id="viTriNhanSu_addViTriTuyen" name="iDViTri">
                      <option value="1" selected>One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      Số lượng
                    </span>
                    <input class="form-control" type="text" name="soLuong" id="soLuong_addViTriTuyen">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">
                      Kỹ năng cần thiết
                    </span>
                    <input class="form-control" type="text" name="kyNangCanThiet" id="kyNangCanThiet_addViTriTuyen">
                  </div>
                </div>
                <div class="d-flex w-100 justify-content-end">
                  <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/UtilitiesFunction.js"></script>
  <script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/KeHoachTuyenDung/KeHoachTuyenDungContent.js"></script>
<?php $this->end(); ?>