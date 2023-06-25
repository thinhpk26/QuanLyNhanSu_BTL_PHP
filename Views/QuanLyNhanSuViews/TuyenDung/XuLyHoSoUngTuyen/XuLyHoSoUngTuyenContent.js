let hoSoUngTuyenList = {};
function setInitDataForHoSoUngTuyenTable() {
    const iDKeHoachTuyenDung = document.getElementById('iDKeHoachTuyenDung').getAttribute('data-iDKeHoachTuyenDung');
    const categoryFormData = new FormData();
    categoryFormData.append('action', "getHoSoWithChuaQuyetDinh");
    categoryFormData.append('iDKeHoachTuyenDung', iDKeHoachTuyenDung);
    
    fetchFormData("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/XuLyHoSoUngTuyenController.php", categoryFormData)
    .then(response => {
        if(response.isSuccess) {
            hoSoUngTuyenList = response.data;
            setdataForHoSoUngTuyen(hoSoUngTuyenList);
        } else {
            alert(response.message);
        }
    })
}
setInitDataForHoSoUngTuyenTable();

function sortHoSoUngTuyen(event) {
    const field = event.currentTarget.getAttribute('data-field');
    hoSoUngTuyenList.sort(function(a, b) {
        return a[field].localeCompare(b[field]);
    })
    setdataForHoSoUngTuyen(hoSoUngTuyenList);
}

function sortDateTimeHoSoUngtuyen(event) {
    hoSoUngTuyenList.sort(function(a, b) {
        const dateA = Date.parse(a.ngaySinh);
        const dateB = Date.parse(b.ngaySinh);
        return dateA - dateB;
    })
    setdataForHoSoUngTuyen(hoSoUngTuyenList);
}

function findHoSoUngTuyen(event) {
    const value = event.target.value;
    const filterdhoSo = hoSoUngTuyenList.filter((hoSoUngTuyen) => {
        const haveInAnyField = hoSoUngTuyen.hoTen.includes(value) || hoSoUngTuyen.email.includes(value) || hoSoUngTuyen.soDT.includes(value) || hoSoUngTuyen.diaChi.includes(value) || hoSoUngTuyen.ngaySinh.includes(value);
        if(haveInAnyField)
            return true;
        return false;
    })
    setdataForHoSoUngTuyen(filterdhoSo);
}

function showDetailHoSoUngTuyen(event) {
    const iDHoSoUngTuyen = event.currentTarget.getAttribute("data-iDHoSoTuyenDung");
    const detailHoSoUngTuyenformData = new FormData();
    detailHoSoUngTuyenformData.append("iDHoSoUngTuyen", iDHoSoUngTuyen);
    detailHoSoUngTuyenformData.append("action", "detailHoSoTuyenDung");
    for(const [key, value] of detailHoSoUngTuyenformData) {
        console.log(key, value);
    }
    fetchFormData("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/XuLyHoSoUngTuyenController.php", detailHoSoUngTuyenformData)
    .then(response => {
        if(response.isSuccess) {
            const dataFromServer = response.data;
            console.log(dataFromServer);
            const generalInformation = dataFromServer.generalInformation;
            const giayToUngVien = dataFromServer.giayToUngVien;
            const chungChiList = dataFromServer.chungChiList;
            addUIForDetailHoSoUngTuyen(generalInformation, giayToUngVien, chungChiList);
            addExtendInformationForDetailHoSoUngTuyen(generalInformation);
        } else {
            alert(response.message);
            return;
        }
    })
    .catch(err => {
        alert(err.message);
        return;
    })

    toggleNotify(event);
}

function addUIForDetailHoSoUngTuyen(generalInformation, giayToUngVien, chungChiList) {
    let allImgHTML = "";
    for(const key in giayToUngVien) {
        if(giayToUngVien[key] !== null && key !== 'iD') {
            allImgHTML += imgHTML(giayToUngVien[key], key, "giấy tờ");
        }
    }
    chungChiList.forEach((chungChi) => {
        allImgHTML += imgHTML(chungChi.anhChungChi, chungChi.tenChungChi, "");
    })
    document.getElementById('container-row').innerHTML = allImgHTML;

    const generalInformationDiv = document.getElementById('generalInformation');
    generalInformationDiv.innerHTML = `
        <p><strong>Tên đầy đủ</strong>: ${generalInformation.hoTen}</p>
        <p><strong>Email</strong>: ${generalInformation.email}</p>
        <p><strong>Số điện thoại</strong>: ${generalInformation.soDT}</p>
        <p><strong>Địa chỉ</strong>: ${generalInformation.diaChi}</p>
        <p><strong>Ngày sinh</strong>: ${generalInformation.ngaySinh}</p>
        <p><strong>Ghi chú</strong>: ${generalInformation.ghiChu}</p>
    `;
}

function imgHTML(path, nameIMG, titleIMG) {
    return `
        <div class="col col-4">
            <div class="card" data-path="/QuanLyNhanSu_BTL_PHP/Assets/ImageOfJobApplication/${path}" data-passevent="show-img" style="cursor: pointer;" onclick="showIMG(event)">
                <div class="overflow-hidden" style="max-height: 280px">
                    <img src="/QuanLyNhanSu_BTL_PHP/Assets/ImageOfJobApplication/${path}" class="card-img-top" alt="${nameIMG}">
                </div>
                <div class="card-body">
                <p class="card-text text-center">
                    Ảnh ${titleIMG}: ${nameIMG}
                </p>
                </div>
            </div>
        </div>`;
}

function addExtendInformationForDetailHoSoUngTuyen(generalInformation) {
    document.getElementById('xuLyHoSo_iDKeHoachTuyenDung').value = generalInformation.iDKeHoachTuyenDung;
    document.getElementById('xuLyHoSo_iDHoSoTuyenDung').value = generalInformation.iD;
}

function xuLyHoSo(event) {
    event.preventDefault();
    let choice;
    try {
        choice = Number.parseInt(event.target.getAttribute('data-defineChoice'));
    } catch(err) {
        alert("Không chuyển đổi được dữ liệu");
    }
    const xuLyHoSoFormData = new FormData(document.getElementById("xuLyHoSo"));
    xuLyHoSoFormData.append('loaiHoSo', choice);
    fetchFormData("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/XuLyHoSoUngTuyenController.php", xuLyHoSoFormData)
    .then(response => {
        console.log(response);
        if(response.isSuccess) {
            alert("Thành công");
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
    .catch(err => {
        alert(err);
    }) 
}

function showIMG(event) {
    const pathIMG = event.currentTarget.getAttribute("data-path");
    document.getElementById('show-giayTo').setAttribute('src', pathIMG);
    toggleNotify(event);
}

function changeCategoryHoSoUngTuyen(event) {
    const category = event.currentTarget.value;
    
    const iDKeHoachTuyenDung = document.getElementById('iDKeHoachTuyenDung').getAttribute('data-iDKeHoachTuyenDung');
    const categoryFormData = new FormData();
    categoryFormData.append('action', category);
    categoryFormData.append('iDKeHoachTuyenDung', iDKeHoachTuyenDung);

    fetchFormData("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/XuLyHoSoUngTuyenController.php", categoryFormData)
    .then(response => {
        if(response.isSuccess) {
            hoSoUngTuyenList = response.data;
            setdataForHoSoUngTuyen(hoSoUngTuyenList);
        } else {
            alert(response.message);
        }
    })
}

function setdataForHoSoUngTuyen(hoSoList) {
    const allHoSoUngTuyenDiv = document.getElementById('allHoSoUngTuyen');
    let hoSoUngTuyenHTML = "";
    hoSoList.forEach((hoSoUngTuyen, index) => {
        hoSoUngTuyenHTML += `
        <tr style="cursor: pointer;" data-iDHoSoTuyenDung="${hoSoUngTuyen.iD}" data-passevent="detail-HoSoUngTuyen" onclick="showDetailHoSoUngTuyen(event)">
            <th scope="row">${index + 1}</th>
            <td>${hoSoUngTuyen.iD}</td>
            <td>${hoSoUngTuyen.hoTen}</td>
            <td>${hoSoUngTuyen.email}</td>
            <td>${hoSoUngTuyen.soDT}</td>
            <td>${hoSoUngTuyen.diaChi}</td>
            <td>${hoSoUngTuyen.ngaySinh}</td>
            <td>${hoSoUngTuyen.ghiChu}</td>
        </tr>
        `
    })
    allHoSoUngTuyenDiv.innerHTML = hoSoUngTuyenHTML;
}