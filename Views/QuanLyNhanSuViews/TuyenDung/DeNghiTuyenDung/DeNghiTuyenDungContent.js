function guiDeNghi(event) {
    event.preventDefault();

    const deNghiFormData = new FormData(event.target);
    fetch("/QuanLyNhanSu_BTL_PHP/Controllers/QuanLyNhanSu/TuyenDung/DeNghiTuyenDung/CreateDeNghi.php", {
        method: "POST",
        headers: {
            contentType: "application/x-www-form-urlencoded"
        },
        body: deNghiFormData
    })
    .then(response => response.json())
    .then(response => {
        console.log(response);
        if(response.isSuccess) {
            alert("Gửi đề nghị thành công");
        } else {
            alert(response.message);
        }
    })
    .catch(err => {
        alert(err.message);
    })
}