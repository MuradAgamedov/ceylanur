"use strict";

// modal

let backdrop = document.querySelector(".backdrop");
let closeModalBtn = document.querySelector("#modal_close");

function openModal() {
    backdrop.classList.add("active");
}

closeModalBtn.addEventListener("click", () => {
    backdrop.classList.remove("active");
});

const form = document.querySelector('.contact__form');
let btn = form.querySelector('button');
let requiredMessages = document.querySelectorAll("#form_label > span")

form.addEventListener('submit', function (event) {
    event.preventDefault();
    btn.classList.add('disabledBtn');
    const formData = new FormData(form);
    fetch('/api/sendContactForm', {
        method: 'POST',
        headers: {
            'X-API-KEY': 'your_api_key'
        },
        body: formData
    })
        .then(response => {
          
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Unexpected server response');
            }
        })
        .then(data => {
            console.log(data)
            if (data.success) {
                form.reset();
                openModal();
                requiredMessages.forEach(message => {
                    message.style.display = "none"
                })
            } else {
                console.error('Error:', data.error);
                if(data.exception) {
                    console.error('Exception:', data.exception);
                }
                requiredMessages.forEach(message => {
                    const emptyInput = message.previousElementSibling.getAttribute("name")
                    message.style.display = "inline"
                    const errorMessage = data.error[emptyInput]
                    message.textContent = errorMessage
                })
            }
        })
        .catch(error => {
            console.error('Request failed:', error);
        })
        .finally(() => {
            btn.classList.remove('disabledBtn');
        });
});

