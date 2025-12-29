<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>

            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <!-- Profile Header -->
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets/img/bruce-mars.jpg') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">Richard Davis</h5>
                            <p class="mb-0 font-weight-normal text-sm">CEO / Co-Founder</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Profile Info + Edit -->
                    <div class="col-12 col-xl-8">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                                <a href="javascript:;">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                        title="Edit Profile"></i>
                                </a>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <!-- Left Column for Description -->
                                    <div class="col-md-6 mb-4 mb-md-0">
                                        <p class="text-sm">
                                            Hi, I'm Richard Davis, CEO and Co-Founder. With over 15 years experience,
                                            I lead our team towards innovation. Philosophy: If you can't decide, the
                                            answer is no.
                                        </p>
                                        <hr class="horizontal gray-light my-4 d-md-none">
                                    </div>

                                    <!-- Right Column for Details -->
                                    <div class="col-md-6">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                                <strong class="text-dark">Full Name:</strong> &nbsp; Richard Davis
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">Position:</strong> &nbsp; CEO / Co-Founder
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">Email:</strong> &nbsp; richarddavis@mail.com
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">Location:</strong> &nbsp; London, UK
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm">
                                                <strong class="text-dark">Department:</strong> &nbsp; Executive
                                            </li>
                                            <li class="list-group-item border-0 ps-0 pb-0">
                                                <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                                <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                                    <i class="fab fa-facebook fa-lg"></i>
                                                </a>
                                                <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                                    <i class="fab fa-twitter fa-lg"></i>
                                                </a>
                                                <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                                    <i class="fab fa-linkedin fa-lg"></i>
                                                </a>
                                                <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                                                    <i class="fab fa-instagram fa-lg"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Card -->
                    <div class="col-12 col-xl-4 mt-4 mt-xl-0">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <h6 class="mb-0">Quick Stats</h6>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-12 mb-3 d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-check-bold text-white opacity-10"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-sm mb-0">Completed Projects</p>
                                            <h6 class="mb-0">42</h6>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3 d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm bg-gradient-success shadow text-center border-radius-md">
                                            <i class="ni ni-calendar-grid-58 text-white opacity-10"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-sm mb-0">Years Experience</p>
                                            <h6 class="mb-0">15</h6>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3 d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm bg-gradient-info shadow text-center border-radius-md">
                                            <i class="ni ni-single-02 text-white opacity-10"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-sm mb-0">Team Members</p>
                                            <h6 class="mb-0">24</h6>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="icon icon-shape icon-sm bg-gradient-warning shadow text-center border-radius-md">
                                            <i class="ni ni-trophy text-white opacity-10"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="text-sm mb-0">Awards Won</p>
                                            <h6 class="mb-0">8</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Projects Summary Section (old layout style) -->
                <div class="col-12 mt-4">
                    <div class="mb-5 ps-3">
                        <h6 class="mb-1">Projects</h6>
                        <p class="text-sm text-secondary">Recent projects and stats</p>
                    </div>

                    <div class="row g-3 justify-content-center">
                        <!-- Demo Project Card -->
                        <div class="col-6 col-md">
                            <div class="p-3 bg-light rounded shadow-sm text-center">
                                <h6 class="text-muted mb-1">Total Projects</h6>
                                <h5 class="fw-bold display-6 mb-0">10</h5>
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="p-3 bg-success bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-success mb-1">In Progress</h6>
                                <h5 class="fw-bold text-success display-6 mb-0">3</h5>
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="p-3 bg-secondary bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-secondary mb-1">Idle</h6>
                                <h5 class="fw-bold text-secondary display-6 mb-0">2</h5>
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="p-3 bg-info bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-info mb-1">Completed</h6>
                                <h5 class="fw-bold text-info display-6 mb-0">4</h5>
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="p-3 bg-danger bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-danger mb-1">Cancelled</h6>
                                <h5 class="fw-bold text-danger display-6 mb-0">1</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leave Summary Section -->
                <div class="col-12 mt-4">
                    <div class="mb-5 ps-3">
                        <h6 class="mb-1">Leave Summary</h6>
                        <p class="text-sm text-secondary">Annual, Casual, Medical & Short leaves</p>
                    </div>

                    <div class="row g-3 justify-content-center">
                        <!-- Demo Leave Cards -->
                        <div class="col-6 col-md">
                            <div class="p-3 bg-secondary bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-secondary mb-1">Annual</h6>
                                <div class="fw-bold">Used: 3</div>
                                <div class="small text-muted">Available</div>
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="p-3 bg-warning bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-warning mb-1">Casual</h6>
                                <div class="fw-bold">Used: 2</div>
                                <div class="small text-muted">Exhausted</div>
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="p-3 bg-danger bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-danger mb-1">Medical</h6>
                                <div class="fw-bold">Used: 1</div>
                                <div class="small text-muted">Overused</div>
                            </div>
                        </div>
                        <div class="col-6 col-md">
                            <div class="p-3 bg-secondary bg-opacity-10 rounded shadow-sm text-center">
                                <h6 class="text-secondary mb-1">Short</h6>
                                <div class="fw-bold">Used: 0</div>
                                <div class="small text-muted">No fixed limit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-layout>
