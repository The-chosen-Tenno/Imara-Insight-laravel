
const addProject = document.getElementById('addProject');
const imageInput = document.getElementById('projectImages');
const createProjectForm = document.getElementById('createProjectForm');

let tagChoices = null;
let subAssigneeChoices = null;

addProject.addEventListener('click', function (e) {
    e.preventDefault();
    const createProjectForm = document.getElementById('createProjectForm');
    createProjectForm.reset();
    const tagSelect = document.getElementById('tagSelect');
    const subAssigneeSelect = document.getElementById('subAssigneeSelect');
    if (!tagChoices) {
        tagChoices = new Choices(tagSelect, {
            removeItemButton: true,
            duplicateItemsAllowed: false,
            addItems: true,
            maxItemCount: 10,
            placeholder: true,
            placeholderValue: 'Search or type tags',
        });
    }
    fetch('/tags', {
        method: 'GET'
    }).then(response => response.json())
        .then(data => {
            const tagFormatted = data.tags.map(tag => ({
                value: tag.id,
                label: tag.name
            }));
            tagChoices.setChoices(tagFormatted, 'value', 'label', false);
        });
    if (!subAssigneeChoices) {
        subAssigneeChoices = new Choices(subAssigneeSelect, {
            removeItemButton: true,
            duplicateItemsAllowed: false,
            addItems: true,
            maxItemCount: 10,
            placeholder: true,
            placeholderValue: 'Search for users',
        })
    }
    fetch('/users', {
        method: 'GET'
    }).then(response => response.json())
        .then(data => {
            const subAssigneeFormatted = data.users.map(sub => ({
                value: sub.id,
                label: sub.user_name
            }));
            subAssigneeChoices.setChoices(subAssigneeFormatted, 'value', 'label', false);
        });
})

imageInput.addEventListener('change', function () {
    const imagePreview = document.getElementById('imagePreviewContainer');
    imagePreview.innerHTML = '';
    const files = Array.from(this.files);
    files.forEach((file, index) => {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();

        reader.onload = function (e) {
            const wrapper = document.createElement('div');
            wrapper.classList.add('mb-2', 'd-flex', 'align-items-center', 'gap-2');

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
            desc.classList.add('form-control', 'mt-1');

            info.appendChild(name);
            info.appendChild(desc);

            wrapper.appendChild(img);
            wrapper.appendChild(info);

            imagePreview.appendChild(wrapper);
        };

        reader.readAsDataURL(file);
    });
})

createProjectForm.addEventListener('submit', function (e) {
    e.preventDefault();
    messageDiv = document.getElementById('messageDiv');
    messageDiv.innerHTML = '';
    const newProjectData = new FormData(createProjectForm);

    fetch('/project', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: newProjectData
    }).then(response => response.json())
        .then(data => {
            messageDiv.innerHTML = `<div class='success'>${data.message}</div>`;
            createProjectForm.reset();
            location.reload();
        }).catch(err => {
            messageDiv.innerHTML = `<div class='danger'>${err.message}</div>`
        })
})

document.addEventListener('click', function (e) {
    if (!e.target.classList.contains('edit-project-btn')) return;
    const projectId = e.target.dataset.id;

    fetch(`/project/${projectId}`, {
        method: 'GET'
    }).then(response => response.json())
        .then(data => {

        })
})
