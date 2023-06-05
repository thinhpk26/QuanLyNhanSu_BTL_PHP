function showChiTietKeHoach(event) {
    console.log(event.currentTarget);

    const btnThucThiKeHoach = document.getElementsByClassName('btn-thucThiKeHoach');
    const btnSuaKeHoach = document.getElementsByClassName('btn-suaKeHoach');
    const btnXoaKeHoach = document.getElementsByClassName('btn-xoaKeHoach');

    for(let i=0; i<btnThucThiKeHoach.length; i++) {
        if(event.target != btnThucThiKeHoach[i]) {
            toggleNotify(event);
        }
        if(event.target != btnXoaKeHoach[i]) {
            toggleNotify(event);
        }
        if(event.target != btnSuaKeHoach[i]) {
            toggleNotify(event);
        }
    }

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

function toggleChiTietKeHoach(event) {
    const chiTietKeHoachElement = document.getElementsByClassName('chiTietKeHoachElement');
    if(chiTietKeHoachElement[0].classList.contains('toggle-ChiTietKeHoachContainer')) {
        chiTietKeHoachElement[0].classList.remove('toggle-ChiTietKeHoachContainer');
        chiTietKeHoachElement[0].style.display = 'none';
    } else {
        chiTietKeHoachElement[0].classList.add('toggle-ChiTietKeHoachContainer');
        chiTietKeHoachElement[0].style.display = 'flex';
    }
}