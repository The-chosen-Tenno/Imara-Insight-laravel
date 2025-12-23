<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Profile'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets/img/bruce-mars.jpg') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Richard Davis
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                CEO / Co-Founder
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <!-- Profile Information Section - Updated to use full width -->
                        <div class="col-12 col-xl-8">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <h6 class="mb-0">Profile Information</h6>
                                        </div>
                                        <div class="col-md-4 text-end">
                                            <a href="javascript:;">
                                                <i class="fas fa-user-edit text-secondary text-sm"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Edit Profile"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <!-- Left Column for Description -->
                                        <div class="col-md-6 mb-4 mb-md-0">
                                            <p class="text-sm">
                                                Hi, I'm Richard Davis, CEO and Co-Founder of our company. With over 15 years of experience in the industry, I lead our team towards innovation and excellence. My philosophy: If you can't decide, the answer is no. When faced with two equally difficult paths, choose the one more painful in the short term.
                                            </p>
                                            <hr class="horizontal gray-light my-4 d-md-none">
                                        </div>
                                        
                                        <!-- Right Column for Details -->
                                        <div class="col-md-6">
                                            <ul class="list-group">
                                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                        class="text-dark">Full Name:</strong> &nbsp; Richard Davis</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Position:</strong> &nbsp; CEO / Co-Founder</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Email:</strong> &nbsp; richarddavis@mail.com</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Location:</strong> &nbsp; London, UK</li>
                                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                        class="text-dark">Department:</strong> &nbsp; Executive</li>
                                                <li class="list-group-item border-0 ps-0 pb-0">
                                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0"
                                                        href="javascript:;">
                                                        <i class="fab fa-facebook fa-lg"></i>
                                                    </a>
                                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0"
                                                        href="javascript:;">
                                                        <i class="fab fa-twitter fa-lg"></i>
                                                    </a>
                                                    <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0"
                                                        href="javascript:;">
                                                        <i class="fab fa-linkedin fa-lg"></i>
                                                    </a>
                                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0"
                                                        href="javascript:;">
                                                        <i class="fab fa-instagram fa-lg"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Stats/Info Card to fill the space -->
                        <div class="col-12 col-xl-4 mt-4 mt-xl-0">
                            <div class="card card-plain h-100">
                                <div class="card-header pb-0 p-3">
                                    <h6 class="mb-0">Quick Stats</h6>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon icon-shape icon-sm bg-gradient-primary shadow text-center border-radius-md">
                                                    <i class="ni ni-check-bold text-white opacity-10"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <p class="text-sm mb-0">Completed Projects</p>
                                                    <h6 class="mb-0">42</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon icon-shape icon-sm bg-gradient-success shadow text-center border-radius-md">
                                                    <i class="ni ni-calendar-grid-58 text-white opacity-10"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <p class="text-sm mb-0">Years Experience</p>
                                                    <h6 class="mb-0">15</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon icon-shape icon-sm bg-gradient-info shadow text-center border-radius-md">
                                                    <i class="ni ni-single-02 text-white opacity-10"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <p class="text-sm mb-0">Team Members</p>
                                                    <h6 class="mb-0">24</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
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
                    </div>
                    
                    <div class="col-12 mt-4">
                        <div class="mb-5 ps-3">
                            <h6 class="mb-1">Projects</h6>
                            <p class="text-sm text-secondary">Recent projects and team collaborations</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-blog card-plain">
                                    <div class="card-header p-0 mt-n4 mx-3">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="{{ asset('assets/img/home-decor-1.jpg') }}"
                                                alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body p-3">
                                        <p class="mb-0 text-sm">Project #2</p>
                                        <a href="javascript:;">
                                            <h5>
                                                Modern
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            As Uber works through a huge amount of internal management turmoil.
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button"
                                                class="btn btn-outline-primary btn-sm mb-0">View
                                                Project</button>
                                            <div class="avatar-group mt-2">
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Elena Morison">
                                                    <img alt="Image placeholder"
                                                        src="{{ asset('assets/img/team-1.jpg') }}">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Ryan Milly">
                                                    <img alt="Image placeholder"
                                                        src="{{ asset('assets/img/team-2.jpg') }}">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Nick Daniel">
                                                    <img alt="Image placeholder"
                                                        src="{{ asset('assets/img/team-3.jpg') }}">
                                                </a>
                                                <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Peterson">
                                                    <img alt="Image placeholder"
                                                        src="{{ asset('assets/img/team-4.jpg') }}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- You can add more project cards here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>