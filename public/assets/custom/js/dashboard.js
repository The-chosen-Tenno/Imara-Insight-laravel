const addProject = document.getElementById('addProject');
const imageInput = document.getElementById('projectImages');
const createProjectForm = document.getElementById('createProjectForm');
const addShortLeaveButton = document.getElementById('addShortLeavebutton');

let tagSelectInstance = null;
let subAssigneeSelectInstance = null;

addProject.addEventListener('click', function (e) {
    e.preventDefault();

    createProjectForm.reset();

    const tagSelect = document.getElementById('tagSelect');
    const subAssigneeSelect = document.getElementById('subAssigneeSelect');

    if (tagSelectInstance) tagSelectInstance.destroy();
    if (subAssigneeSelectInstance) subAssigneeSelectInstance.destroy();

    fetch('/tags')
        .then(res => res.json())
        .then(data => {
            tagSelectInstance = new TomSelect(tagSelect, {
                options: data.tags.map(tag => ({
                    value: tag.id,
                    text: tag.name
                })),
                create: true,
                maxItems: 10,
                plugins: ['remove_button'],
                placeholder: 'Search or type tags'
            });
        });

    fetch('/users')
        .then(res => res.json())
        .then(data => {
            subAssigneeSelectInstance = new TomSelect(subAssigneeSelect, {
                options: data.users.map(user => ({
                    value: user.id,
                    text: user.user_name
                })),
                maxItems: 10,
                plugins: ['remove_button'],
                placeholder: 'Search for users'
            });
        });
});

imageInput.addEventListener('change', function () {
    const imagePreview = document.getElementById('imagePreviewContainer');
    imagePreview.innerHTML = '';

    Array.from(this.files).forEach(file => {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();

        reader.onload = function (e) {
            const wrapper = document.createElement('div');
            wrapper.className = 'mb-2 d-flex align-items-center gap-2';

            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '60px';
            img.style.height = '60px';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '4px';

            const info = document.createElement('div');
            info.style.flex = '1';

            const name = document.createElement('div');
            name.textContent = file.name;
            name.classList.add('fw-semibold');

            const desc = document.createElement('input');
            desc.type = 'text';
            desc.name = 'project_images_description[]';
            desc.placeholder = 'Image description';
            desc.className = 'form-control mt-1';

            info.appendChild(name);
            info.appendChild(desc);

            wrapper.appendChild(img);
            wrapper.appendChild(info);

            imagePreview.appendChild(wrapper);
        };

        reader.readAsDataURL(file);
    });
});

createProjectForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const messageDiv = document.getElementById('messageDiv');
    messageDiv.innerHTML = '';

    const newProjectData = new FormData(createProjectForm);

    fetch('/project', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: newProjectData
    })
        .then(res => res.json())
        .then(data => {
            messageDiv.innerHTML = `<div class="success">${data.message}</div>`;
            createProjectForm.reset();
            location.reload();
        })
        .catch(err => {
            messageDiv.innerHTML = `<div class="danger">${err.message}</div>`;
        });
});

document.addEventListener('click', function (e) {
    if (!e.target.classList.contains('edit-project-btn')) return;

    const projectId = e.target.dataset.id;

    fetch(`/project/${projectId}`)
        .then(res => res.json())
        .then(data => {
            const form = document.getElementById('editProjectForm');

            form.querySelector('input[name="user_id"]').value = data.user_id;
            form.querySelector('input[name="project_name"]').value = data.project_name;
            form.querySelector('textarea[name="description"]').value = data.description || '';
            form.querySelector('select[name="project_type"]').value = data.project_type;

            document.getElementById('imagePreviewContainer').innerHTML = '';
        });
});

addShortLeaveButton.addEventListener('click', function (e) {
    e.preventDefault();

    const currentTime = document.getElementById('currentTime');
    const now = new Date();

    const h = String(now.getHours()).padStart(2, '0');
    const m = String(now.getMinutes()).padStart(2, '0');

    currentTime.innerHTML = `Are you sure you want to take a short leave at: ${h}:${m}?`;
});
