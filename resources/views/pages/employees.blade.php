<x-layout bodyClass="g-sidenav-show  bg-gray-200">
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
                        'name' => 'Drake',
                        'email' => 'drake@gmail.com',
                        'status' => 'active',
                        'project_status' => 'in_progress',
                        'role' => 'Senior Developer',
                        'image' => 'assets/img/drake.jpg'
                        ],
                        [
                        'name' => 'Jane Smith',
                        'email' => 'jane@gmail.com',
                        'status' => 'active',
                        'project_status' => 'idle',
                        'role' => 'Designer',
                        'image' => 'assets/img/drake.jpg'
                        ],
                        // Add more employees here
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
                            <div class="card h-100 shadow-sm border-0" style="border-radius: 1rem; overflow: hidden;">
                                <div class="card-header d-flex align-items-center p-3 bg-gradient border-0"
                                    style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                    <img src="{{ asset($employee['image']) }}"
                                        class="rounded-circle me-3 border border-3 border-white"
                                        style="width: 50px; height: 50px; object-fit: cover;"
                                        alt="{{ $employee['name'] }}">
                                    <div>
                                        <h6 class=" mb-0 fw-bold">{{ $employee['name'] }}</h6>
                                        <p class=" mb-0 text-xs">{{ $employee['role'] }}</p>
                                    </div>
                                </div>
                                <div class="card-body pt-3 pb-4">
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                        <span class="text-muted text-xs">Email</span>
                                        <span class="text-xs fw-semibold">{{ $employee['email'] }}</span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                        <span class="text-muted text-xs">Status</span>
                                        <span
                                            class="badge badge-sm bg-gradient-{{ $statusColors[$employee['status']] }}">
                                            {{ ucfirst($employee['status']) }}
                                        </span>
                                    </div>
                                    <div
                                        class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                                        <span class="text-muted text-xs">Project Status</span>
                                        <span
                                            class="badge badge-sm bg-gradient-{{ $projectStatusColors[$employee['project_status']] }}">
                                            {{ str_replace('_', ' ', ucfirst($employee['project_status'])) }}
                                        </span>
                                    </div>
                                    <button class="btn btn-sm bg-gradient-primary w-100 mt-2"
                                        style="border-radius: 0.5rem;" data-bs-toggle="modal"
                                        data-bs-target="#viewEmployeeModal">
                                        View Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                {{-- Add Employee Modal --}}
                <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content border-radius-lg">
                            <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div
                                    class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                                    <h6 class="text-white m-0">Add Employee</h6>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>
                            </div>
                            <form action="" method="POST" id="addEmployeeForm">
                                @csrf
                                <div class="modal-body px-4 pb-3">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Role</label>
                                        <input type="text" class="form-control" name="role" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <select class="form-control" name="status" required>
                                            <option value="" disabled selected>Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="on_leave">On Leave</option>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-static mb-4">
                                        <label for="employeeImage">Upload Profile Image</label>
                                        <input type="file" class="form-control" name="employee_image" id="employeeImage"
                                            accept="image/*">
                                    </div>
                                    <div id="messageDiv" class="mb-3"></div>
                                </div>
                                <div class="modal-footer border-0 pt-0 px-4">
                                    <button type="button" class="btn btn-outline-dark"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- View Employee Modal --}}
                <div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content border-radius-lg">
                            <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div
                                    class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                                    <h6 class="text-white m-0">Employee Details</h6>
                                    <button type="button" class="btn-close btn-close-white"
                                        data-bs-dismiss="modal"></button>
                                </div>
                            </div>
                            <div class="modal-body px-4 pb-3">
                                <!-- Employee details would go here -->
                                <p class="text-muted">Detailed employee information and stats</p>
                            </div>
                            <div class="modal-footer border-0 pt-0 px-4">
                                <button type="button" class="btn btn-outline-dark"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn bg-gradient-primary">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
</x-layout>