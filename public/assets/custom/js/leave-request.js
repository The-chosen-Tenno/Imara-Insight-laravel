document.addEventListener('DOMContentLoaded', () => {
    const duration = document.getElementById('leaveDuration');
    const singleDate = document.getElementById('singleDate');
    const halfDay = document.getElementById('halfDay');
    const multiDay = document.getElementById('multiDay');
    const form = document.getElementById('leaveRequestForm');

    duration.addEventListener('change', () => {
        singleDate.classList.remove('d-none');
        halfDay.classList.add('d-none');
        multiDay.classList.add('d-none');

        if (duration.value === 'half') {
            halfDay.classList.remove('d-none');
        }

        if (duration.value === 'multi') {
            singleDate.classList.add('d-none');
            multiDay.classList.remove('d-none');
        }
    });

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        if (duration.value === 'full') {
            halfDay.querySelectorAll('input').forEach(i => i.disabled = true);
            multiDay.querySelectorAll('input').forEach(i => i.disabled = true);
        } else if (duration.value === 'half') {
            singleDate.querySelectorAll('input').forEach(i => i.disabled = true);
            multiDay.querySelectorAll('input').forEach(i => i.disabled = true);
        } else if (duration.value === 'multi') {
            singleDate.querySelectorAll('input').forEach(i => i.disabled = true);
            halfDay.querySelectorAll('input').forEach(i => i.disabled = true);
        }

        const res = await fetch('/request-leave', {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        });

        const data = await res.json();

        form.classList.add('d-none');

        document.getElementById('resultTitle').innerText =
            data.success ? 'Success 🎉' : 'Failed';

        document.getElementById('resultMessage').innerText = data.message;

        document.getElementById('resultBox').classList.remove('d-none');

        form.querySelectorAll('input').forEach(i => i.disabled = false);
    });


    document.getElementById('requestAgain').addEventListener('click', () => {
        form.reset();
        form.classList.remove('d-none');
        document.getElementById('resultBox').classList.add('d-none');
        halfDay.classList.add('d-none');
        multiDay.classList.add('d-none');
        singleDate.classList.remove('d-none');
    });
});
