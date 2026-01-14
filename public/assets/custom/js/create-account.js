const signUpform = document.getElementById('signupForm');
const messageDiv = document.getElementById('formMessage');

signUpform.addEventListener('submit', function (e) {
    e.preventDefault();
    messageDiv.innerHTML = '';
    const signUpformData = new FormData(signUpform);

    fetch('/user', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: signUpformData
    }).then(response => response.json())
        .then(data => {
            messageDiv.innerHTML = `<div class="success">${data.message}</div>`;
            signUpform.reset();
            setTimeout(() => {
                window.location.href = '/'
            }, 2000)
        })
        .catch(async err => {
            const data = await err.json();
            let html = `<ul>`;
            Object.values(data.errors).forEach(error => {
                html += `<li>${error[0]}</li>`;
            });
            html += '</ul>';
            messageDiv.innerHTML = `<div class="error">${html}</div>`;
        })
});