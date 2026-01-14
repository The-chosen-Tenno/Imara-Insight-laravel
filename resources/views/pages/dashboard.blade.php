<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="dashboard"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            {{-- My Projects --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div
                                class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize m-0">My Projects</h6>
                                <button type="button" id="addProject" class="btn bg-gradient-dark mb-0"
                                    data-bs-toggle="modal" data-bs-target="#addProjectModal">
                                    <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add
                                </button>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Type</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Status</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Last updated</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $statusColor = [
                                                    'started' => 'info',
                                                    'in_progress' => 'primary',
                                                    'idle' => 'warning',
                                                    'success' => 'success',
                                                    'cancelled' => 'danger',
                                                ];
                                            @endphp
                                            @foreach (auth()->user()->projects as $project)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $project->project_name }}
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $project->project_type }}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-{{ $statusColor[$project->status] }}">{{ $project->status }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">14/09/20</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a type="button" id="editProject"
                                                            class="text-secondary font-weight-bold text-xs edit-project-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editProjectModal"
                                                            data-id="{{ $project->id }}"">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- My Leaves --}}
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div
                                class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize m-0">My Leave Requests</h6>
                                <button class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                    data-bs-target="#addShortLeave" id="addShortLeavebutton">
                                    <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Short Leave
                                </button>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Requested Date</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Leave Type</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Duration</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Start</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    End</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Approval</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $leaveStatusColor = [
                                                    'approved' => 'success',
                                                    'pending' => 'warning',
                                                    'denied' => 'danger',
                                                ];
                                            @endphp
                                            @foreach (auth()->user()->leaveRequests as $leave)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">
                                                                    {{ $leave->created_at->format('Y-m-d') }}
                                                                </h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $leave->reason_type }}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $leave->leave_duration }}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $leave->start_date }}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $leave->end_date }}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-{{ $leaveStatusColor[$leave->status] }}">{{ $leave->status }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    {{-- Create project model --}}
    <div class="modal fade" id="addProjectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-radius-lg">

                <!-- Header -->
                <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                        <h6 class="text-white m-0">Add Project</h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                </div>

                <!-- Body -->
                <form action="" method="POST" id="createProjectForm">
                    @csrf
                    <input type="hidden" class="form-control" name="user_id" required>
                    <div class="modal-body px-4 pb-3">
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="project_name" required>
                        </div>
                        <div class="input-group input-group-dynamic input-group-outline mb-3">

                            <textarea class="form-control" name="description" rows="4" placeholder="Description"></textarea>
                        </div>

                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="project_type" required>
                                <option value="" disabled selected>Project Type</option>
                                <option value="coding">Coding</option>
                                <option value="automation">Automation</option>
                            </select>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="sub-assignees[]" id="subAssigneeSelect" multiple>
                            </select>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="tags[]" id="tagSelect" multiple>
                            </select>
                        </div>
                        <div class="input-group input-group-static mb-4">
                            <label class="" for="projectImages">Upload Project Images</label>
                            <input type="file" class="form-control" name="project_images[]" id="projectImages"
                                accept="image/*" multiple>
                        </div>
                        <div id="imagePreviewContainer" class="mb-3"></div>
                        <div id="messageDiv" class="mb-3"></div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer border-0 pt-0 px-4">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- Edit project model --}}
    <div class="modal fade" id="editProjectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-radius-lg">

                <!-- Header -->
                <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                        <h6 class="text-white m-0">Edit Project</h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                </div>

                <!-- Body -->
                <form action="" method="POST" id="editProjectForm">
                    @csrf
                    <input type="hidden" class="form-control" name="user_id" required>
                    <div class="modal-body px-4 pb-3">
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Project Name</label>
                            <input type="text" class="form-control" name="project_name" required>
                        </div>
                        <div class="input-group input-group-outline mb-3">

                            <textarea class="form-control" name="description" rows="4" placeholder="Description"></textarea>
                        </div>

                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="project_type" required>
                                <option value="" disabled selected>Project Type</option>
                                <option value="coding">Coding</option>
                                <option value="automation">Automation</option>
                            </select>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="sub-assignees[]" id="subAssigneeSelect" multiple>
                            </select>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <select class="form-control" name="tags[]" id="tagSelect" multiple>
                            </select>
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label" for="projectImages">Upload Project Images</label>
                            <input type="file" class="form-control" name="project_images[]" id="projectImages"
                                accept="image/*" multiple>
                        </div>
                        <div id="imagePreviewContainer" class="mb-3"></div>
                        <div id="messageDiv" class="mb-3"></div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer border-0 pt-0 px-4">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div><style>
    </style>
    {{-- Add short leave --}}
    <div class="modal fade" id="addShortLeave" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content border-radius-lg">

                <!-- Header -->
                <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                        <h6 class="text-white m-0">Add Short Leave</h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                </div>

                <!-- Body -->
                <form action="" method="POST" id="createProjectForm">
                    @csrf

                    <div class="modal-body px-4 pb-3">
                        <div id="currentTime" class=" mb-3 text-center"></div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Duration</label>
                            <input type="number" class="form-control" name="duration" required min="1"
                                max="2" step="1">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Reason (optional)</label>
                            <input type="text" class="form-control" name="reason">
                        </div>
                        <div id="imagePreviewContainer" class="mb-3"></div>
                        <div id="messageDiv" class="mb-3"></div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer border-0 pt-0 px-4">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn bg-gradient-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layout>

<script src="{{ asset('assets/custom/js/dashboard.js') }}"></script>
