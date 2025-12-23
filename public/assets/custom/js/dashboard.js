
const addProject = document.getElementById('addProject');

addProject.addEventListener('click', function (e) {
    fetch('/tags', {
        method: 'GET'
    }).then(response => response.json())
        .then(data => {
            const tagSelect = document.querySelector('#tagSelect');
            tagSelect.innerHTML = `<option value="" disabled selected>Tags</option>`;
            data.tags.array.forEach(tag => {
                const option = document.createElement('option');
                option.value = tag.id;
                option.textContent = tag.name;
                select.appendChild(option);
            });
        })
});