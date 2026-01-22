<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="projects"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="projects"></x-navbars.navs.auth>


        <link rel="stylesheet" href="{{ asset('assets/custom/css/projects.css') }}">
        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <div class="search-container">
                        <input type="text" id="search" placeholder="Search">
                        <button id="clear-btn">&times;</button>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm fw-bold ms-2" data-bs-toggle="modal"
                        data-bs-target="#add-project">
                        <i class="bi bi-plus"></i> Add Project
                    </button>
                </div>
            </div>

            <div class="columns-wrapper" data-permission="admin" id="app">
                @php
                    $columns = [
                        'started' => ['label' => 'Started', 'color' => '#22f0f0'],
                        'in_progress' => ['label' => 'In Progress', 'color' => '#0d6efd'],
                        'finished' => ['label' => 'Finished', 'color' => '#198754'],
                        'idle' => ['label' => 'Idle', 'color' => '#ffca2c'],
                        'cancelled' => ['label' => 'Cancelled', 'color' => '#dc3545'],
                    ];
                    
                    $groupedProjects = $projects->groupBy('status');
                @endphp

                @foreach ($columns as $col_id => $col)
                    <div id="{{ $col_id }}" class="column-container">
                        <div class="column-header" style="background: {{ $col['color'] }};">
                            {{ $col['label'] }}
                        </div>
                        <div class="dropzone border shadow bg-light p-2">
                            @foreach ($groupedProjects[$col_id] ?? [] as $project)
                                <div class="box" data-id="{{ $project->id }}">
                                    <div class="drag-handle">{{ $project->project_name }}</div>
                                    <div class="text-dark">
                                        <div><strong>Assignee:</strong> {{ $project->assignee }}</div>
                                        @if ($project->sub_assignees)
                                            <div><strong>Sub-Assignees:</strong> {{ $project->sub_assignees }}</div>
                                        @endif
                                        @if (!empty($project->tags))
                                            <div><strong>Tags:</strong>
                                                @foreach ($project->tags as $tag)
                                                    <span class="badge">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>


            {{-- Add Project Modal --}}
            <div class="modal fade" id="add-project" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="create-form">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Project Name</label>
                                    <input type="text" class="form-control" name="project_name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" rows="4" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Assign To</label>
                                    <select class="form-select" name="user_id" required>
                                        <option value="1">John Doe</option>
                                        <option value="2">Jane Smith</option>
                                        <option value="3">Mike Johnson</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <select id="addTags" name="tags[]" multiple style="width:100%;"></select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Sub-assignees</label>
                                    <select id="createSubAssigneeSelect" name="sub_assignees[]" multiple
                                        style="width:100%;"></select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Project Type</label>
                                    <select class="form-select" name="type" required>
                                        <option value="coding">Coding</option>
                                        <option value="automation">Automation</option>
                                    </select>
                                </div>
                                <div id="alert-container"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="create-project">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Edit Project Modal --}}
            <div class="modal fade" id="edit-project-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="update-form">
                            <div class="modal-header">
                                <h5 class="modal-title">Update Project</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="project_id" id="ProjectId">
                                <input type="hidden" name="user_id" id="UserID">

                                <div class="mb-3">
                                    <label class="form-label">Project Name</label>
                                    <input type="text" class="form-control" name="project_name" id="ProjectName"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="DescriptionUpdate" rows="4" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Project Status</label>
                                    <select class="form-select" id="ProjectStatus" name="status" required>
                                        <option value="idle">Idle</option>
                                        <option value="started">Started</option>
                                        <option value="in_progress">In Progress</option>
                                        <option value="finished">Finished</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Add Tags</label>
                                    <select id="addTagsEdit" name="tags_add[]" multiple style="width:100%;"></select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Remove Tags</label>
                                    <select id="removeTagsEdit" name="tags_remove[]" multiple
                                        style="width:100%;"></select>
                                </div>
                                <div id="edit-alert-container"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="update-project">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="{{ asset('assets/custom/js/projects.js') }}"></script>
</x-layout>
