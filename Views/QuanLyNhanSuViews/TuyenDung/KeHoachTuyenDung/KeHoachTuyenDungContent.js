function setViTriNhanSuForChiTietKeHoach() {
    const viTriNhanSuSelect = document.getElementById('viTriNhanSu_addViTriTuyen');
    
    fetchGet("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/GetAllViTriNhanSu.php")
    .then(response => {
        if(response.isSuccess) {
            let htmls = "";
            for(let i=0; i<response.data.length; i++) {
                htmls += `<option value="${response.data[i].maChucVu}" selected>${response.data[i].tenChucVu}</option>`
            }
            viTriNhanSuSelect.innerHTML = htmls;
        } else {
            alert(response.message);
        }
    })
}

setViTriNhanSuForChiTietKeHoach();

function showChiTietKeHoach(event) {
    const iDKeHoachTuyenDung = event.currentTarget.getAttribute("data-iD");
    setAllViTriTuyenDung(iDKeHoachTuyenDung);
    const iDKehoachTuyenDungInputOfForm = document.getElementById("addViTriTuyen");
    iDKehoachTuyenDungInputOfForm.value = iDKeHoachTuyenDung;

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

    const formElemnt = event.currentTarget.parentElement;
    const formData = getFormDataFromFormElement(formElemnt);

    fetchPost('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/GetKeHoachTuyenDung.php', formData)
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

    const formElement = event.currentTarget.parentElement.parentElement;
    const formData = getFormDataFromFormElement(formElement);
    fetchPost('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/UpdateKeHoachTuyenDung.php', formData)
    .then(response => {
        if(response.isSuccess) {
            alert("Update thành công");
            window.location.reload();
        } else {
            alert(response.message);
        }
    });
}

function addKeHoachTuyenDung(event) {
    event.preventDefault();
    const addKeHoachForm = event.currentTarget.parentElement.parentElement;
    const addKeHoachData = getFormDataFromFormElement(addKeHoachForm);

    fetchPost("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/AddKeHoachTuyenDung.php", addKeHoachData)
    .then(response => {
        if(response.isSuccess) {
            alert("Thêm thành công");
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}

function showXacNhanThucThiTuyenDung(event) {
    const iD = event.currentTarget.getAttribute("data-iD");

    const iDKeHoachBaoTriInput = document.getElementById('xacNhanThucThiKeHoach');
    iDKeHoachBaoTriInput.value = iD;

    toggleNotify(event);
}

function confirmToStartKeHoachTuyenDung(event) {
    event.preventDefault();

    const confirmStartKeHoachform = event.currentTarget.parentElement.parentElement;
    const confirmStartData = getFormDataFromFormElement(confirmStartKeHoachform);

    fetchPost('/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/XacNhanThucThi.php', confirmStartData)
    .then(response => {
        if(response.isSuccess) {
            alert('Xác nhận thực thi thành công');
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}

function showDeleteKeHoachTuyenDung(event) {
    const iD = event.currentTarget.getAttribute('data-iD');
    const xoaKeHoachInput = document.getElementById('xoaKeHoachInput');
    xoaKeHoachInput.value = iD;

    toggleNotify(event);
}

function deleteKeHoachTuyenDung(event) {
    event.preventDefault();
    const confirmDeleteForm = event.currentTarget.parentElement.parentElement;
    const confirmDeleteData = getFormDataFromFormElement(confirmDeleteForm);

    fetchPost("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/DeleteKeHoachTuyenDung.php", confirmDeleteData)
    .then(response => {
        if(response.isSuccess) {
            alert('Xóa thành công thành công');
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}

function setAllViTriTuyenDung(iDKeHoachTuyenDung) {
    fetchPost("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/getAllViTriTuyenByIDKeHoach.php", {iDKeHoachTuyenDung})
    .then(response => {
        if(response.isSuccess) {
            console.log(response.data);
            let allViTriTuyenDungHTML = '';
            for(let i=0; i<response.data.length; i++) {
                allViTriTuyenDungHTML += viTriTuyenDungHTML(response.data[i], i + 1);
            }
            const chiTietBaoTriBodyTable = document.getElementById('ChiTietBaoTriContainer');
            chiTietBaoTriBodyTable.innerHTML = allViTriTuyenDungHTML;
        } else {
            alert(response.message);
        }
    })
}

function viTriTuyenDungHTML(viTriTuyenDung, ordinalNumber) {
    return `
    <tr data-iD="iD-sdfsd" style="cursor: pointer;">
      <td scope="row" class="text-center">${ordinalNumber}</td>
      <td class="text-center">${viTriTuyenDung.tenChucVu}</td>
      <td class="text-center">${viTriTuyenDung.soLuong}</td>
      <td class="text-center">
        ${viTriTuyenDung.kyNangCanThiet}
      </td>
      <td class="text-center">
        <form action="#" method="post" onsubmit="deleteViTriTuyenDung(event)">
          <input type="text" class="visually-hidden" name="iD" value="${viTriTuyenDung.iD}">
          <button class="btn text-decoration-underline" type="submit">Xóa</button>
        </form>
      </td>
    </tr>`;
}

function addVitriTuyenDung(event) {
    event.preventDefault();
    const iDKeHoachTuyenDung = document.getElementById('addViTriTuyen').value;
    const addViTriTuyenDungForm = event.currentTarget;
    const soLuongString = document.getElementById('soLuong_addViTriTuyen').value;
    let soLuong = 0;
    try {
        soLuong = Number.parseInt(soLuongString);
    } catch(ex) {
        alert("Bạn nhập không đúng số lượng");
        return;
    }
    const addViTriTuyenDungData = getFormDataFromFormElement(addViTriTuyenDungForm);

    fetchPost("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/AddViTriTuyen.php", addViTriTuyenDungData)
    .then(response => {
        if(response.isSuccess) {
            alert("Thêm thành công");
            setAllViTriTuyenDung(iDKeHoachTuyenDung);
        } else {
            alert(response.message);
        }
    })
}

function deleteViTriTuyenDung(event) {
    event.preventDefault();
    const iDKeHoachTuyenDung = document.getElementById('addViTriTuyen').value;
    const deleteViTriTuyenDungForm = event.currentTarget;
    const deleteViTriTuyenDungData = getFormDataFromFormElement(deleteViTriTuyenDungForm);

    fetchPost("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/KeHoachTuyenDung/DeleteViTriTuyen.php", deleteViTriTuyenDungData)
    .then(response => {
        if(response.isSuccess) {
            alert("Đã xóa thành công");
            setAllViTriTuyenDung(iDKeHoachTuyenDung);
        } else {
            alert(response.message);
        }
    })
}

async function fetchPost(url, data) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });
    return response.json();
}