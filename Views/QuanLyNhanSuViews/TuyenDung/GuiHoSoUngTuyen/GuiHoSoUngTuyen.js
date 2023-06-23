const chungChiForm = document.getElementById('certificateInformation');
let numberChungChi = 1;


function addChungChi(event) {
    const chungChiDiv = document.createElement('div');
    chungChiDiv.innerHTML = `
    <div class="input-group mb-3">
      <div class="input-group-text">Tên chứng chỉ ${numberChungChi}</div>
      <input type="text" class="form-control" name="tenChungChi${numberChungChi}">
    </div>
    <div class="input-group mb-3">
      <div class="input-group-text">Ảnh chứng chỉ${numberChungChi}</div>
      <input type="file" class="form-control" name="anhChungChi${numberChungChi}" placeholder="Chọn ảnh của bạn">
    </div>`;
    
    chungChiForm.appendChild(chungChiDiv);
    numberChungChi++;
}

function confirmSend(event) {
    if(validateThongTinHoSo()) {
        toggleNotify(event);
    }
} 

async function addThongTinHoSo(event) {
    event.preventDefault();
    const dataForServer = await formatThongTinHoSo();
    console.log(dataForServer);
    fetchPost("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/GuiHoSoController.php", dataForServer)
    .then(response => {
        if(response.isSuccess) {
            alert("Đã thêm thành công");
        } else {
            alert(response.message);
        }
    })

}

async function formatThongTinHoSo() {
    const generalInformationFormData = new FormData(document.getElementById('generalInformation'));
    const documentsFormData = new FormData(document.getElementById('documents'));
    const certificateInformationFormData = new FormData(document.getElementById('certificateInformation'));
    const extendInformationFormData = new FormData(document.getElementById('extendInformation'));
    const formatedCertificate = await formatToArray(certificateInformationFormData);

    const generalInformation = {};
    for(const [key, value] of generalInformationFormData) {
        generalInformation[key] = value;
    }
    const documents = {};
    for(const [key, value] of documentsFormData) {
        if(value.size > 0) {
            documents[key] = await convertFileToObject(value);
        }
    }
    const extendInformation = {};
    for(const [key, value] of extendInformationFormData) {
        extendInformation[key] = value;
    }

    return {generalInformation, documents, certificatesList: formatedCertificate, extendInformation};
}

async function formatToArray(initData) {
    const formatedCertificateList = [];
    for(const [key, value] of initData) {
        const keyCertifiCate = key.slice(-1);
        
        let isHaveKey = false;
        const isFileValue = value instanceof File && value.size > 0;
        const isStringValue = typeof value === "string" && value.length > 0;

        for(let i=0; i<formatedCertificateList.length; i++) {
            if(formatedCertificateList[i].key === keyCertifiCate) {
                isHaveKey = true;
                if(isFileValue) formatedCertificateList[i][key.slice(0, key.length - 1)] = await convertFileToObject(value);
                if(isStringValue) formatedCertificateList[i][key.slice(0, key.length - 1)] = value;
            }
        }

        if(isHaveKey) continue;

        const certificate = {};
        certificate['key'] = keyCertifiCate;
        if(isFileValue) certificate[key.slice(0, key.length - 1)] = await convertFileToObject(value);
        if(isStringValue) certificate[key.slice(0, key.length - 1)] = value;
        formatedCertificateList.push(certificate);
    }

    const fullCertificateList = formatedCertificateList.filter((value, index) => {
        return Object.keys(value).length === 3;
    })

    fullCertificateList.forEach(certificate => {
        delete certificate.key;
    })
    
    return fullCertificateList;
}

function validateThongTinHoSo() {
    const requiredCheckHaveValueInput = document.getElementsByClassName('isHaveValue');
    for(let i=0; i<requiredCheckHaveValueInput.length; i++) {
        if(!isHaveValue(requiredCheckHaveValueInput[i].value)) {
            alert("Các trường họ tên, số điện thoại, ngày sinh, địa chỉ không được bỏ trống");
            return false;
        }
    }
    const emailInput = document.getElementById('email');
    if(!checkEmail(emailInput.value)) {
        alert("Trường email nhập không đúng");
        return false;
    }
    const soDTInput = document.getElementById('soDienThoai');
    if(!checkSoDT(soDTInput.value)) {
        alert("Trường số điện thoại không đúng");
        return false;
    }
    const imgInput = document.getElementsByClassName('isImage');
    for(let i=0; i<imgInput.length; i++) {
        if(isHaveValue(imgInput[i].value) && !isIMG(imgInput[i].value)) {
            alert("Chỉ cho phép gửi ảnh là ảnh");
            return false;
        }
    }
    return true;
}

async function convertFileToObject(file) {
    const base64File = await convertFileToBase64(file);
    return {
        name: file.name,
        size: file.size,
        type: file.type,
        data: base64File,
    }
}

function convertFileToBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result.split(',')[1]);
        reader.onerror = reject;
    })
};

function checkSoDT(data) {
    const regex = /^\d{10,15}$/;
    return regex.test(data);
}

function checkEmail(data) {
    const regex = new RegExp("(?=.*@gmail\.com).{10,50}");
    return regex.test(data);
}

function isHaveValue(data) {
    if(data !== null && data.trim() !== "") {
        return true;
    }
    return false;
}

function isIMG(data) {
    const regex = new RegExp("\.(jpg|jpeg|gif|png)$");
    return regex.test(data);
}