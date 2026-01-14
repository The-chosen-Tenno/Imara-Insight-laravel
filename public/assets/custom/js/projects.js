document.addEventListener('DOMContentLoaded', function() {
    // Initialize Select2 library
    if (typeof $ !== 'undefined' && $.fn.select2) {
        initializeSelect2();
    } else {
        console.warn('Select2 not loaded. Loading from CDN...');
        loadSelect2();
    }
    
    // Search functionality
    setupSearch();
    
    // Drag and drop functionality
    setupDragAndDrop();
    
    // Modal functionality
    setupModals();
    
    // Initialize demo data
    initializeDemoData();
});

function loadSelect2() {
    const script = document.createElement('script');
    script.src = 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js';
    script.onload = initializeSelect2;
    document.head.appendChild(script);
}

function initializeSelect2() {
    const addModal = document.getElementById('add-project');
    const editModal = document.getElementById('edit-project-modal');
    
    // Initialize Select2 for add modal
    if (addModal) {
        $('#addTags').select2({
            placeholder: "Select tags",
            tags: true,
            dropdownParent: addModal
        });
        
        $('#createSubAssigneeSelect').select2({
            placeholder: "Select sub-assignees",
            dropdownParent: addModal
        });
    }
    
    // Initialize Select2 for edit modal
    if (editModal) {
        $('#addTagsEdit').select2({
            placeholder: "Add tags",
            tags: true,
            dropdownParent: editModal
        });
        
        $('#removeTagsEdit').select2({
            placeholder: "Remove tags",
            dropdownParent: editModal
        });
    }
}

function setupSearch() {
    const searchInput = document.getElementById('search');
    const clearBtn = document.getElementById('clear-btn');
    
    if (!searchInput) return;
    
    function filterLogs() {
        const searchTerm = searchInput.value.toLowerCase();
        document.querySelectorAll('.column-container .box').forEach(box => {
            const text = box.textContent.toLowerCase();
            box.style.display = text.includes(searchTerm) ? '' : 'none';
        });
        clearBtn.style.display = searchInput.value.length > 0 ? 'block' : 'none';
    }
    
    searchInput.addEventListener('input', filterLogs);
    clearBtn.addEventListener('click', () => {
        searchInput.value = '';
        filterLogs();
        clearBtn.style.display = 'none';
    });
}

function setupDragAndDrop() {
    const permission = document.getElementById('app')?.dataset?.permission;
    if (permission !== 'admin') return;
    
    let draggedElement = null;
    
    // Make boxes draggable
    document.querySelectorAll('.box').forEach(box => {
        box.setAttribute('draggable', 'true');
        
        box.addEventListener('dragstart', handleDragStart);
        box.addEventListener('dragend', handleDragEnd);
    });
    
    // Setup dropzones
    document.querySelectorAll('.dropzone').forEach(dropzone => {
        dropzone.addEventListener('dragover', handleDragOver);
        dropzone.addEventListener('dragenter', handleDragEnter);
        dropzone.addEventListener('dragleave', handleDragLeave);
        dropzone.addEventListener('drop', handleDrop);
    });
    
    function handleDragStart(e) {
        draggedElement = this;
        this.classList.add('dragging');
        e.dataTransfer.setData('text/plain', this.dataset.id);
        e.dataTransfer.effectAllowed = 'move';
    }
    
    function handleDragEnd() {
        this.classList.remove('dragging');
        document.querySelectorAll('.dropzone').forEach(zone => {
            zone.classList.remove('drag-over');
        });
        draggedElement = null;
    }
    
    function handleDragOver(e) {
        e.preventDefault();
        e.dataTransfer.dropEffect = 'move';
    }
    
    function handleDragEnter(e) {
        e.preventDefault();
        this.classList.add('drag-over');
    }
    
    function handleDragLeave() {
        this.classList.remove('drag-over');
    }
    
    function handleDrop(e) {
        e.preventDefault();
        this.classList.remove('drag-over');
        
        const projectId = e.dataTransfer.getData('text/plain');
        const box = document.querySelector(`.box[data-id="${projectId}"]`);
        const newColumn = this.closest('.column-container').id;
        
        if (box && this !== box.parentNode) {
            this.appendChild(box);
            
            // Update status on server (simulated)
            updateProjectStatus(projectId, newColumn);
        }
    }
}

function updateProjectStatus(projectId, newStatus) {
    console.log(`Updating project ${projectId} to status: ${newStatus}`);
    
    // Simulate API call
    fetch('/api/projects/' + projectId + '/status', {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify({
            status: newStatus
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Status updated successfully:', data);
        showAlert('Project status updated!', 'success');
    })
    .catch(error => {
        console.error('Error updating status:', error);
        showAlert('Failed to update status', 'danger');
    });
}

function setupModals() {
    const createModal = document.getElementById('add-project');
    const editModal = document.getElementById('edit-project-modal');
    
    // Create project
    document.getElementById('create-project')?.addEventListener('click', function() {
        const form = document.getElementById('create-form');
        if (form.checkValidity()) {
            const formData = new FormData(form);
            console.log('Creating project:', Object.fromEntries(formData));
            
            // Show success message
            showAlert('Project created successfully!', 'success', 'alert-container');
            
            // Simulate API call
            setTimeout(() => {
                const modal = bootstrap.Modal.getInstance(createModal);
                if (modal) modal.hide();
                // In real app, you would refresh or add the new project dynamically
                location.reload();
            }, 1500);
        } else {
            form.reportValidity();
        }
    });
    
    // Double-click to edit
    document.querySelectorAll('.box').forEach(box => {
        box.addEventListener('dblclick', function() {
            openEditModal(this.dataset.id);
        });
    });
    
    // Update project
    document.getElementById('update-project')?.addEventListener('click', function() {
        const form = document.getElementById('update-form');
        if (form.checkValidity()) {
            const formData = new FormData(form);
            console.log('Updating project:', Object.fromEntries(formData));
            
            showAlert('Project updated successfully!', 'success', 'edit-alert-container');
            
            setTimeout(() => {
                const modal = bootstrap.Modal.getInstance(editModal);
                if (modal) modal.hide();
                location.reload();
            }, 1500);
        } else {
            form.reportValidity();
        }
    });
}

function openEditModal(projectId) {
    const project = getDemoProject(projectId);
    if (!project) return;
    
    // Set form values
    document.getElementById('ProjectId').value = projectId;
    document.getElementById('ProjectName').value = project.name;
    document.getElementById('DescriptionUpdate').value = 'Sample project description for ' + project.name;
    document.getElementById('UserID').value = 1;
    document.getElementById('ProjectStatus').value = getColumnForProject(projectId);
    
    // Initialize Select2 for edit modal
    const addTagsEdit = document.getElementById('addTagsEdit');
    const removeTagsEdit = document.getElementById('removeTagsEdit');
    
    // Clear and populate
    if (addTagsEdit) {
        addTagsEdit.innerHTML = '';
        const allTags = ['Design', 'Frontend', 'Backend', 'Mobile', 'API', 'Database', 'Testing', 'DevOps', 'UI/UX'];
        allTags.forEach(tag => {
            const option = document.createElement('option');
            option.value = tag;
            option.textContent = tag;
            addTagsEdit.appendChild(option);
        });
        
        // Reinitialize Select2
        if ($ && $.fn.select2) {
            $('#addTagsEdit').select2({
                placeholder: "Add tags",
                tags: true,
                dropdownParent: document.getElementById('edit-project-modal')
            }).trigger('change');
        }
    }
    
    if (removeTagsEdit) {
        removeTagsEdit.innerHTML = '';
        // Add existing project tags
        const existingTags = project.tags || [];
        existingTags.forEach(tag => {
            const option = document.createElement('option');
            option.value = tag;
            option.textContent = tag;
            removeTagsEdit.appendChild(option);
        });
        
        // Reinitialize Select2
        if ($ && $.fn.select2) {
            $('#removeTagsEdit').select2({
                placeholder: "Remove tags",
                dropdownParent: document.getElementById('edit-project-modal')
            }).trigger('change');
        }
    }
    
    // Show modal
    const editModal = new bootstrap.Modal(document.getElementById('edit-project-modal'));
    editModal.show();
}

function initializeDemoData() {
    // Populate tags in add modal
    const addTags = document.getElementById('addTags');
    const subAssigneeSelect = document.getElementById('createSubAssigneeSelect');
    
    if (addTags) {
        const demoTags = ['Design', 'Frontend', 'Backend', 'Mobile', 'API', 'Database', 'Testing', 'DevOps', 'UI/UX'];
        demoTags.forEach(tag => {
            const option = document.createElement('option');
            option.value = tag;
            option.textContent = tag;
            addTags.appendChild(option);
        });
    }
    
    if (subAssigneeSelect) {
        const demoUsers = [
            {id: 1, name: 'John Doe'},
            {id: 2, name: 'Jane Smith'},
            {id: 3, name: 'Mike Johnson'},
            {id: 4, name: 'Sarah Wilson'},
            {id: 5, name: 'David Brown'}
        ];
        
        demoUsers.forEach(user => {
            const option = document.createElement('option');
            option.value = user.id;
            option.textContent = user.name;
            subAssigneeSelect.appendChild(option);
        });
    }
}

function getDemoProject(projectId) {
    const allProjects = {
        1: { id: 1, name: 'Website Redesign', tags: ['Design', 'Frontend'] },
        2: { id: 2, name: 'Mobile App', tags: ['Mobile', 'iOS'] },
        3: { id: 3, name: 'API Integration', tags: ['Backend', 'API'] },
        4: { id: 4, name: 'Database Migration', tags: ['Database', 'Migration'] },
        5: { id: 5, name: 'Login System', tags: ['Auth', 'Security'] },
        6: { id: 6, name: 'Analytics Dashboard', tags: ['Analytics', 'Dashboard'] },
        7: { id: 7, name: 'Legacy System Update', tags: ['Legacy'] }
    };
    
    return allProjects[projectId];
}

function getColumnForProject(projectId) {
    // Simple mapping for demo
    const columnMap = {
        1: 'started',
        2: 'started',
        3: 'in_progress',
        4: 'in_progress',
        5: 'finished',
        6: 'idle',
        7: 'cancelled'
    };
    
    return columnMap[projectId] || 'idle';
}

function showAlert(message, type, containerId = 'alert-container') {
    const container = document.getElementById(containerId);
    if (!container) return;
    
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    container.innerHTML = '';
    container.appendChild(alertDiv);
    
    // Auto remove after 3 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 3000);
}