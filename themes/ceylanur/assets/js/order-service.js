let backdrop = document.querySelector(".backdrop");
let closeModalBtn = document.querySelector("#modal_close");

function openModal() {
    backdrop.classList.add("active");
}

closeModalBtn.addEventListener("click", () => {
    backdrop.classList.remove("active");
});

const form = document.querySelector('.order_service_form');
let btn = form.querySelector('button');
let requiredMessages = document.querySelectorAll("#order_label > span")


form.addEventListener('submit', function (event) {
    event.preventDefault();
    btn.classList.add('disabledBtn');
    const formData = new FormData(form);
    fetch('/api/sendOrderServiceForm', {
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
            if (data.success) {
                form.reset()
                openModal()
            } else {
                console.error('Error:', data.error);
                requiredMessages.forEach(message => {
                    console.log(message.previousElementSibling.getAttribute("name"))
                    const emptyInput = message.previousElementSibling.getAttribute("name")
                    message.classList.add("isActive")
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
