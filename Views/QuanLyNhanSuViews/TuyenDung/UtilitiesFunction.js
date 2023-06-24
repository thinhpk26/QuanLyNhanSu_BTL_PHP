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

async function fetchGet(url) {
    const response = await fetch(url, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
    });
    return response.json();
}

async function fetchFormData(url, formData) {
    const response = await fetch(url, {
        method: 'POST',
        header: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData,
    });
    return response.json();
}

async function fetchWithMutiplePart(url, formData) {
    const response = await fetch(url, {
        method: 'POST',
        header: {
            'Content-Type': 'multipart/form-data',
        },
        body: formData,
    });
    return response.json();
}

function getFormDataFromFormElement(formElement, addAttributes = {}) {
    const formData = new FormData(formElement);
    const body = {};
    for(const [key, value] of formData) {
        body[key] = value;
    }
    return {...body, ...addAttributes};
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
