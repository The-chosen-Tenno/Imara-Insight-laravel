<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <link rel="stylesheet" href="{{ asset('assets/custom/css/employees.css') }}">
    <x-navbars.sidebar activePage="employees"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="employees"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            {{-- Employees --}}
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                            data-bs-target="#addEmployeeModal">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Employee
                        </button>
                    </div>
                    <div class="row px-4">
                        @php
                        $employees = [
                        [
                        'user_name' => 'Drake',
                        'email' => 'drake@gmail.com',
                        'status' => 'active',
                        'project_status' => 'in_progress',
                        'image' => ''
                        ],
                        [
                        'user_name' => 'Jane Smith',
                        'email' => 'jane@gmail.com',
                        'status' => 'active',
                        'project_status' => 'idle',
                        'image' => ''
                        ],
                        [
                        'user_name' => 'Mike Johnson',
                        'email' => 'mike@gmail.com',
                        'status' => 'on_leave',
                        'project_status' => 'completed',
                        'image' => ''
                        ],
                        [
                        'user_name' => 'Sarah Williams',
                        'email' => 'sarah@gmail.com',
                        'status' => 'active',
                        'project_status' => 'in_progress',
                        'image' => ''
                        ],
                        ];

                        $statusColors = [
                        'active' => 'success',
                        'inactive' => 'secondary',
                        'on_leave' => 'warning'
                        ];

                        $projectStatusColors = [
                        'idle' => 'secondary',
                        'in_progress' => 'primary',
                        'completed' => 'success'
                        ];
                        @endphp

                        @foreach($employees as $employee)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card employee-card h-100">
                                <div class="card-header employee-card-header">
                                    <img src="{{ $employee['image'] ? asset($employee['image']) : asset('assets/img/default-pfp.jpg') }}"
                                        class="employee-avatar me-3" alt="{{ $employee['user_name'] }}">
                                    <div>
                                        <h6 class="employee-name">{{ $employee['user_name'] }}</h6>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column pt-3 pb-4">
                                    <div class="employee-info-row">
                                        <span class="employee-info-label">Email</span>
                                        <span class="employee-info-value">{{ $employee['email'] }}</span>
                                    </div>
                                    <div class="employee-info-row">
                                        <span class="employee-info-label">Status</span>
                                        <span class="badge bg-gradient-{{ $statusColors[$employee['status']] }}">
                                            {{ str_replace('_', ' ', ucfirst($employee['status'])) }}
                                        </span>
                                    </div>
                                    <div class="employee-info-row">
                                        <span class="employee-info-label">Project</span>
                                        <span
                                            class="badge bg-gradient-{{ $projectStatusColors[$employee['project_status']] }}">
                                            {{ str_replace('_', ' ', ucfirst($employee['project_status'])) }}
                                        </span>
                                    </div>
                                    <button class="btn btn-sm bg-gradient-primary w-100 btn-view" data-bs-toggle="modal"
                                        data-bs-target="#viewEmployeeModal">
                                        View Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('pages.modals.create-employee-modal')
        @include('pages.modals.view-employee-modal')
    </main>
</x-layout>