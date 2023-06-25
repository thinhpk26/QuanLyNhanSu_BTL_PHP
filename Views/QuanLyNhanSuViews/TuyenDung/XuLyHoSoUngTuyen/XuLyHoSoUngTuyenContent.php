<?php $this->layout('QuanLyNhanSuView'); ?>

<?php $this->section('Content'); ?>
  <div style="min-height: 100vh;">
    <input class="visually-hidden" id="iDKeHoachTuyenDung" data-iDKeHoachTuyenDung="<?=$iDHoSoUngTuyen?>">
    <div class="text-center mb-4">
      <h2>Hồ sơ đã ứng tuyển</h2>
    </div>
    <div class="mb-4">
      <label for="category" class="fw-bold">Phân loại theo:</label>
      <select class="form-select" name="Phân loại" id="category" style="display: inline-block; width: auto;" onchange="changeCategoryHoSoUngTuyen(event)">
        <option value="getHoSoWithChuaQuyetDinh" selected>Chưa quyết định</option>
        <option value="getHoSoWithLoaiBo">Loại bỏ</option>
        <option value="getHoSoWithChoPhongVan">Chờ phỏng vấn</option>
      </select>
      <label for="findInfor" class="ms-4 fw-bold">Tìm kiếm: </label>
      <input class="form-control" style="display: inline-block; width: auto;" type="text" id="findInfor" oninput="findHoSoUngTuyen(event)" placeholder="Nhập vào đây để tìm kiếm">
    </div>
    <div style="max-height: 75vh; overflow: auto">
    <table class="table table-hover table-bordered">
      <thead>
        <tr class="background-primary color-white">
          <th scope="col">STT</th>
          <th scope="col">ID</th>
          <th scope="col" data-field="hoTen" onclick="sortHoSoUngTuyen(event)">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sắp xếp" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
              Họ Tên
              <i class="fa-solid fa-caret-down"></i>
            </div>
          </th>
          <th scope="col" data-field="email" onclick="sortHoSoUngTuyen(event)">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sắp xếp" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
              Email
              <i class="fa-solid fa-caret-down"></i>
            </div>
          </th>
          <th scope="col" data-field="soDT" onclick="sortHoSoUngTuyen(event)">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sắp xếp" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
              Số điện thoại
              <i class="fa-solid fa-caret-down"></i>
            </div>
          </th>
          <th scope="col" data-field="diaChi" onclick="sortHoSoUngTuyen(event)">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sắp xếp" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
              Địa chỉ
              <i class="fa-solid fa-caret-down"></i>
            </div>
          </th>
          <th scope="col" onclick="sortDateTimeHoSoUngtuyen(event)">
            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sắp xếp" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;">
              Ngày sinh
              <i class="fa-solid fa-caret-down"></i>
            </div>
          </th>
          <th scope="col">Tin nhắn</th>
        </tr>
      </thead>
      <tbody id="allHoSoUngTuyen">
      </tbody>
    </table>
    </div>
    <div class="position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#detail-HoSoUngTuyen">
      <div class="shadow-lg position-relative rounded-3 shadow-lg" style="width: 1000px; background-color: #fffcfc; max-height: 510px; overflow: auto;">
          <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="detail-HoSoUngTuyen" onclick="toggleNotify(event)">
              <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
          </div>
          <div class="m-4">
            <h4 class="text-center mb-4 fw-bold">Chi tiết hồ sơ</h4>
            <hr>
            <div id="detail-HoSoUngTuyen">
                <div id="generalInformation">
                </div>
              <div class="container p-0">
                <div class="row gx-4 gy-4" id="container-row">
                </div>
              </div>
              <div class="d-flex justify-content-end mt-5">
                <form id="xuLyHoSo">
                  <input type="text" class="visually-hidden" name="action" value="chonLoc">
                  <input type="text" class="visually-hidden" id="xuLyHoSo_iDKeHoachTuyenDung" name="iDKeHoachTuyenDung" value="iDKeHoachTuyenDung">
                  <input type="text" class="visually-hidden" id="xuLyHoSo_iDHoSoTuyenDung" name="iDHoSoUngTuyen" value="iDHoSoUngTuyen">
                    <button class="btn btn-warning" type="submit" data-defineChoice="0" onclick="xuLyHoSo(event)">Loại bỏ</button>
                    <button class="btn btn-primary" type="submit" data-defineChoice="1" onclick="xuLyHoSo(event)">Xác nhận phỏng vấn</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

    <div class="position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#show-img">
      <div class="shadow-lg position-relative rounded-3 shadow-lg p-5" style="width: 1000px; background-color: #fffcfc; height: 700px; overflow: auto;">
          <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="show-img" onclick="toggleNotify(event)">
              <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
          </div>
          <img id="show-giayTo" src="" width="100%" alt="Ảnh CV">
      </div>
    </div>
  </div>
  <script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/UtilitiesFunction.js"></script>
  <script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/XuLyHoSoUngTuyen/XuLyHoSoUngTuyenContent.js"></script>
<?php $this->end(); ?>