<?php $this->layout('QuanLyNhanSuView'); ?>

<?php $this->section('Content'); ?>
    <h3 class="text-center mb-3">WEBSITE ĐĂNG TUYỂN</h3>
    <button class="btn btn-primary mb-2" data-passevent="addWebsiteDangTuyen" onclick="toggleNotify(event)">Thêm</button>
    <span class="visually-hidden" iD="iDKeHoachTuyenDung" data-iDKehoachTuyenDung="<?=$iDKeHoachTuyenDung?>"></span>
    <div class="input-group mb-3" style="width: 800px;">
        <div class="input-group-text"><p class="m-0">Trang gửi hồ sơ của người ứng tuyển <strong style="color: red;"></strong></p></div>
        <div style="font-size: 12px; word-wrap: break-word;" class="form-control">http://localhost/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/GuiHoSoController.php?iDKeHoachTuyenDung=<?=$iDKeHoachTuyenDung?></div>
    </div>
    <div class="border border-3 rounded-3">
        <table class="table table-light table-bordered table-hover mb-0">
            <thead>
                <tr>
                    <th scope="col" class="background-primary color-white text-center" style="width: 30px;">STT</th>
                    <th scope="col" class="background-primary color-white">Link đăng tuyển</th>
                    <th scope="col" class="background-primary color-white">Thời gian đăng tuyển</th>
                    <th scope="col" class="background-primary color-white">Thời gian kết thúc đăng tuyển</th>
                    <th scope="col" class="background-primary color-white">Ghi chú</th>
                    <th class="background-primary color-white"></th>
                    <th class="background-primary color-white"></th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i<count($websiteDangTuyenList); $i++) {?>
                    <tr style="cursor: pointer;">
                        <th scope="text-center"><?=$i+1?></th>
                        <td><a href="<?=$websiteDangTuyenList[$i]->linkDangTuyen?>" style="color: #000" class="text-decoration-underline"><?=$websiteDangTuyenList[$i]->linkDangTuyen?></a></td>
                        <td><?=$websiteDangTuyenList[$i]->thoiGianDangTuyen?></td>
                        <td><?=$websiteDangTuyenList[$i]->ketThucDangTuyen?></td>
                        <td><?=$websiteDangTuyenList[$i]->ghiChu?></td>
                        <td>
                            <form action="" method="post" data-passevent="updateWebsiteDangTuyen" onsubmit="showUpdateWebsiteDangTuyen(event)">
                                <input name="action" value="getThongTinWebsiteByID" class="visually-hidden">
                                <input name="iD" value="<?=$websiteDangTuyenList[$i]->iD?>" class="visually-hidden">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </form>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-iD="<?=$websiteDangTuyenList[$i]->iD?>" data-passevent="deleteWebsiteDangTuyen" onclick="showDeleteWebsiteDangTuyen(event)">Xóa</button>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <!-- Thêm trang web -->
    <div class="position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#addWebsiteDangTuyen">
        <div class="shadow-lg position-relative rounded-3 shadow-lg" style="width: 700px; background-color: #fffcfc;">
            <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="addWebsiteDangTuyen" onclick="toggleNotify(event)">
                <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
            </div>
            <form action="" method="post" class="m-4" onsubmit="addWebsiteDangTuyen(event)">
                <h4 class="text-center fw-bold m-3">Thêm các trang đăng tuyển khác</h4>
                <input type="text" name="action" value="addOneThongTinWebsite" class="visually-hidden">
                <label for="linkDangTuyen_add">Link trang đã đăng tuyển</label>
                <input type="text" class="form-control mb-2" name="linkDangTuyen" id="linkDangTuyen_add">
                <label for="thoiGianDangTuyen_add">Thời gian đăng tuyển</label>
                <input type="date" class="form-control mb-2" name="thoiGianDangTuyen" id="thoiGianDangTuyen_add">
                <label for="thoiGianKetThuc_add">Thời gian kết thúc</label>
                <input type="date" class="form-control mb-2" name="ketThucDangTuyen" id="thoiGianKetThuc_add">
                <label for="ghiChu_add">Ghi Chú</label>
                <textarea name="ghiChu" class="form-control mb-4" id="ghiChu_add" rows="3"></textarea>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Sửa trang web -->
    <div class="position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#updateWebsiteDangTuyen">
        <div class="shadow-lg position-relative rounded-3 shadow-lg" style="width: 700px; background-color: #fffcfc;">
            <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;" data-passevent="updateWebsiteDangTuyen" onclick="toggleNotify(event)">
                <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
            </div>
            <form action="" method="post" class="m-4" onsubmit="updateWebsiteDangTuyen(event)">
                <h4 class="text-center fw-bold m-3">Sửa trang đăng tuyển</h4>
                <input class="visually-hidden" name="iD" id="iD_update">
                <input type="text" name="action" value="updateThongTinWebsiteByID" class="visually-hidden">
                <label for="linkDangTuyen_update">Link trang đã đăng tuyển</label>
                <input type="text" class="form-control mb-2" name="linkDangTuyen" id="linkDangTuyen_update">
                <label for="thoiGianDangTuyen_update">Thời gian đăng tuyển</label>
                <input type="date" class="form-control mb-2" name="thoiGianDangTuyen" id="thoiGianDangTuyen_update">
                <label for="thoiGianKetThuc_update">Thời gian kết thúc</label>
                <input type="date" class="form-control mb-2" name="ketThucDangTuyen" id="thoiGianKetThuc_update">
                <label for="ghiChu_update">Ghi Chú</label>
                <textarea name="ghiChu" class="form-control mb-4" id="ghiChu_update" rows="3"></textarea>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Xóa trang web -->
    <div class="position-absolute justify-content-center align-items-center" style="top: 0; bottom: 0; right: 0; left: 0; background-color: rgba(0, 0, 0, 0.1); display: none;" data-toggle="#deleteWebsiteDangTuyen">
        <div class="shadow-lg position-relative rounded-3 shadow-lg" style="width: 500px; background-color: #fffcfc;">
            <div class="position-absolute" style="top: 18px; right: 18px; cursor: pointer;"  data-passevent="deleteWebsiteDangTuyen" onclick="toggleNotify(event)">
                <i class="fa-solid fa-x" style="color: #000000; font-size: 20px;"></i>
            </div>
            <form action="" method="post" class="m-4" onsubmit="deleteWebsiteDangTuyen(event)">
                <h4 class="text-center fw-bold m-3">Xác nhận xóa trang đăng tuyển</h4>
                <p class="mt-5">Bạn có chắc muốn xóa trang tuyển dụng trên</p>
                <input class="visually-hidden" name="iD" id="iD_delete">
                <input class="visually-hidden" name="action" value="deleteThongTinWebsiteByID">
                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/UtilitiesFunction.js"></script>
    <script src="/QuanLyNhanSu_BTL_PHP/Views/QuanLyNhanSuViews/TuyenDung/WebsiteDangTuyen/WebsiteDangTuyenContent.js"></script>
<?php $this->end(); ?>