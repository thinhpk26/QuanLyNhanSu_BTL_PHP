function addWebsiteDangTuyen(event) {
    event.preventDefault();
    const iDKeHoachTuyenDung = document.getElementById('iDKeHoachTuyenDung').getAttribute('data-iDKehoachTuyenDung');
    const addWebDangTuyenForm = event.currentTarget;
    const addWebDangTuyenData = getFormDataFromFormElement(addWebDangTuyenForm, {iDKeHoachTuyenDung});
    fetchPost('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/WebsiteTuyenDungController.php', addWebDangTuyenData)
    .then(response => {
        if(response.isSuccess) {
            alert("Thêm thành công");
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}

function showUpdateWebsiteDangTuyen(event) {
    event.preventDefault();
    const websiteDangTuyenForm = event.currentTarget;
    console.log(event);
    const websiteDangTuyenData = getFormDataFromFormElement(websiteDangTuyenForm);
    fetchPost('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/WebsiteTuyenDungController.php', websiteDangTuyenData)
    .then(response => {
        if(response.isSuccess) {
            const iDInput = document.getElementById('iD_update');
            const linkInput = document.getElementById('linkDangTuyen_update');
            const thoiGianDangTuyenInput = document.getElementById('thoiGianDangTuyen_update');
            const ketThucDangTuyenInput = document.getElementById('thoiGianKetThuc_update');
            const ghiChuInput = document.getElementById('ghiChu_update');
            iDInput.value = response.data.iD;
            linkInput.value = response.data.linkDangTuyen;
            const thoiGianDangTuyen = new Date(response.data.thoiGianDangTuyen);
            const ketThucDangTuyen = new Date(response.data.ketThucDangTuyen);
            thoiGianDangTuyenInput.value = thoiGianDangTuyen.toISOString().split('T')[0];
            ketThucDangTuyenInput.value = ketThucDangTuyen.toISOString().split('T')[0];
            ghiChuInput.value = response.data.ghiChu;
        } else {
            alert(response.message);
        }
    })
    toggleNotify(event);
}

function updateWebsiteDangTuyen(event) {
    event.preventDefault();
    const addWebDangTuyenForm = event.currentTarget;
    const addWebDangTuyenData = getFormDataFromFormElement(addWebDangTuyenForm);
    fetchPost('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/WebsiteTuyenDungController.php', addWebDangTuyenData)
    .then(response => {
        if(response.isSuccess) {
            alert("Update dữ liệu thành công");
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}

function showDeleteWebsiteDangTuyen(event) {
    const iD = event.currentTarget.getAttribute("data-iD");
    const iDInput = document.getElementById("iD_delete");
    iDInput.value = iD;
    toggleNotify(event);
}

function deleteWebsiteDangTuyen(event) {
    event.preventDefault();
    const deleteWebsiteDangTuyenForm = event.currentTarget;
    const deleteWebsiteDangTuyenData = getFormDataFromFormElement(deleteWebsiteDangTuyenForm);

    fetchPost('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/WebsiteTuyenDungController.php', deleteWebsiteDangTuyenData)
    .then(response => {
        if(response.isSuccess) {
            alert("Delete thành công");
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}