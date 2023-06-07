function showChiTietKeHoach(event) {
    const btnThucThiKeHoach = event.currentTarget.getElementsByClassName('btn-thucThiKeHoach');
    const btnSuaKeHoach = event.currentTarget.getElementsByClassName('btn-suaKeHoach');
    const btnXoaKeHoach = event.currentTarget.getElementsByClassName('btn-xoaKeHoach');

    for(let i=0; i<btnThucThiKeHoach.length; i++) {
        if(event.target != btnThucThiKeHoach[i] && event.target != btnXoaKeHoach[i] && event.target != btnSuaKeHoach[i]) {
            toggleNotify(event);
        }
    }

}

function showSuaKeHoachTuyenDung(event) {
    event.preventDefault();
    const form = new FormData(event.currentTarget.parentElement);
    const body = {};
    for(const [name, value] of form) {
        body[name] = value;
    }
    fetch('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/GetKeHoachTuyenDung.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    })
    .then(response => response.json())
    .then(response => {
        const iDInput = document.getElementById('iD_suaKeHoach');
        const thoiGianTrienKhaiInput = document.getElementById('thoiGianTrienKhai_suaKeHoach');
        const ghiChuInput = document.getElementById('ghiChu_suaKeHoach');
        const thoiGianTrienKhai = new Date(response.data.thoiGianTrienKhai);

        iDInput.value = response.data.iD;
        thoiGianTrienKhaiInput.value = thoiGianTrienKhai.toISOString().split('T')[0];
        ghiChuInput.value = response.data.ghiChu;
    })
    toggleNotify(event);
}

function updateKeHoachTuyenDung(event) {
    event.preventDefault();

    const form = new FormData(event.currentTarget.parentElement.parentElement);
    const body = {};
    for(const [name, value] of form) {
        body[name] = value;
    }
    fetch('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/UpdateKeHoachTuyenDung.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    })
   .then(response => response.json())
    .then(response => {
        if(response.isSuccess) {
            alert("Update thành công");
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}

// chưa có đủ thông tin để làm
function addKeHoachTuyenDung(event) {
    event.preventDefault();
    const form = new FormData(event.currentTarget.parentElement.parentElement);
    const body = {};
    for(const [key, value] of form) {
        body[key] = value;
    }

}

function showXacNhanThucThiTuyenDung(event) {
    const iD = event.currentTarget.getAttribute("data-iD");

    const iDKeHoachBaoTriInput = document.getElementById('xacNhanThucThiKeHoach');
    iDKeHoachBaoTriInput.value = iD;

    toggleNotify(event);
}

function confirmToStartKeHoachTuyenDung(event) {
    event.preventDefault();

    const form = FormData(event.currentTarget.parentElement.parentElement);

    const body = {};
    for(const [value, key] of form) {
        body[key] = value;
    }

    fetch('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/UpdateKeHoachTuyenDung.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    })
    .then(response => {
        return JSON.parse(response);
    })
    .then(response => {
        if(response.isSuccess) {
            alert('Xác nhận thực thi thành công');
            window.location.reload();
        } else {
            alert('Có lỗi ở phía server. Vui lòng reload lại page');
        }
    })
}

function toggleNotify(event) {
    const sendedEventElement = event.currentTarget;
    const iDSendedEventElement = sendedEventElement.getAttribute('data-passevent');
    const nofifyElement = document.querySelectorAll(`[data-toggle="#${iDSendedEventElement}"]`);
    for(let i=0; i<nofifyElement.length; i++) {
        if(nofifyElement[i].classList.contains('toggle-show_hindden')) {
            nofifyElement[i].classList.remove('toggle-show_hindden');
            nofifyElement[i].style.display = 'none';
        } else {
            nofifyElement[i].classList.add('toggle-show_hindden');
            nofifyElement[i].style.display = 'flex';
        }
    }
}
