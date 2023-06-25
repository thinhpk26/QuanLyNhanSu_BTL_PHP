function sendRequestLogin(event) {
    event.preventDefault();

    const loginFormData = new FormData(event.target);
    loginFormData.append('action', 'login');

    fetch("/QuanLyNhanSu_BTL_PHP/Controllers/DangNhapController/DangNhapController.php", {
        method: 'POST',
        headers: {
            ContentType: 'application/x-www-form-urlencoded',
        },
        body: loginFormData
    })
    .then(response => response.json())
    .then(response => {
        console.log(response);
        if(response.isSuccess) {
            window.location.href = response.data;
        } else {
            alert(response.message);
        }
    })
}