function phanHoiDeNghi(event) {
    event.preventDefault();
    const URL = event.currentTarget.getAttribute('action');
    const form = new FormData(event.currentTarget);
    const dataToServer = {};
    for(let [key, value] of form) {
        dataToServer[key] = value;
    }
    fetch(URL, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(dataToServer)
    })
    .then(response => response.json())
    .then(response => {
        if(response.isSuccess) {
            alert("Đã phản hồi lại trưởng phòng");
            window.location.reload();
        } else {
            alert(response.message);
        }
    })
}