const loginForm = document.getElementById('loginForm');
const messageDiv = document.getElementById('messageDiv');

loginForm.addEventListener('submit', function (e) {
    e.preventDefault();
    messageDiv.innerHTML = '';
    const loginFormData = new FormData(loginForm)

    fetch('/login', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: loginFormData
    }).then(response => response.json())
        .then(data => {
            messageDiv.innerHTML = `<div class="success">${data.message}</div>`;
            if (data.redirect) {
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 1000)
            } else {
                loginForm.reset();
            }
        }).catch(err => {
            let html = '<ul>';
            if (err.errors) {
                Object.values(err.errors).forEach(e => {
                    html += `<li>${e[0]}</li>`;
                });
            } else {
                html += `<li>${err.message}</li>`;
            }
            html += '</ul>';
            messageDiv.innerHTML = `<div class="error">${html}</div>`;
        })
});