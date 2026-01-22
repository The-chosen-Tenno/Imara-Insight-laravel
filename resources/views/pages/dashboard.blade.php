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
                                    <table class="data-table table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                                                    style="padding: 12px 8px;">
                                                    Project Name
                                                </th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Type
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Status
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Last Updated
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Actions
                                                </th>
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
                                                            <h6 class="mb-0 text-sm">{{ $project->project_name }}</h6>
                                                            <p class="text-xs text-secondary mb-0">ID: #{{ $project->id
                                                                }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{
                                                        ucfirst($project->project_type) }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="badge badge-sm bg-gradient-{{ $statusColor[$project->status] }}">
                                                        <span class="me-1">●</span>{{ ucfirst(str_replace('_', ' ',
                                                        $project->status)) }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $project->updated_at->format('M d, Y') }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-link text-secondary mb-0 px-1"
                                                        data-bs-toggle="tooltip" title="View Project">
                                                        <i class="fas fa-eye text-xs"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-link text-secondary mb-0 px-1 edit-project-btn"
                                                        data-bs-toggle="modal" data-bs-target="#editProjectModal"
                                                        data-id="{{ $project->id }}" title="Edit Project">
                                                        <i class="fas fa-edit text-xs"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary mb-0 px-1"
                                                        data-bs-toggle="tooltip" title="More Options">
                                                        <i class="fas fa-ellipsis-h text-xs"></i>
                                                    </button>
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
                                    <table class="data-table table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2"
                                                    style="padding: 12px 8px;">
                                                    Requested Date
                                                </th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Leave Type
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Duration
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Start Date
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    End Date
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Status
                                                </th>
                                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"
                                                    style="padding: 12px 8px;">
                                                    Actions
                                                </th>
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
                                                            <h6 class="mb-0 text-sm">{{ $leave->created_at->format('M d,
                                                                Y') }}</h6>
                                                            <p class="text-xs text-secondary mb-0">{{
                                                                $leave->created_at->format('h:i A') }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ ucfirst(str_replace('_',
                                                        ' ', $leave->reason_type)) }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-sm bg-gradient-secondary">
                                                        {{ $leave->leave_duration }} {{ (int)$leave->leave_duration ===
                                                        1 ? 'day' : 'days' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ \Carbon\Carbon::parse($leave->start_date)->format('M d, Y')
                                                        }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ \Carbon\Carbon::parse($leave->end_date)->format('M d, Y') }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="badge badge-sm bg-gradient-{{ $leaveStatusColor[$leave->status] }}">
                                                        <span class="me-1">●</span>{{ ucfirst($leave->status) }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-link text-secondary mb-0 px-1"
                                                        data-bs-toggle="tooltip" title="View Details">
                                                        <i class="fas fa-eye text-xs"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary mb-0 px-1"
                                                        data-bs-toggle="tooltip" title="Download">
                                                        <i class="fas fa-download text-xs"></i>
                                                    </button>
                                                    <button class="btn btn-link text-secondary mb-0 px-1"
                                                        data-bs-toggle="tooltip" title="More Options">
                                                        <i class="fas fa-ellipsis-h text-xs"></i>
                                                    </button>
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
    @include('pages.modals.create-project-modal')
    @include('pages.modals.edit-project-modal')
    @include('pages.modals.create-project-modal')
    @include('pages.modals.create-short-leave-modal')
    <script src="{{ asset('assets/custom/js/dashboard.js') }}"></script>
</x-layout>