@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href="">
            <img src="{{ asset('assets/custom/img/icons/favicon.png') }}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-2 font-weight-bold text-white">Imara - Insight</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="/pages/dashboard">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'projects' ? ' active bg-gradient-primary' : '' }} "
                    href="/pages/projects">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dataset</i>
                    </div>
                    <span class="nav-link-text ms-1">Projects</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'leave' ? ' active bg-gradient-primary' : '' }} "
                    href="/pages/leave">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">event_busy</i>
                    </div>
                    <span class="nav-link-text ms-1">Request leave</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'employees' ? ' active bg-gradient-primary' : '' }} "
                    href="/pages/employees">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">diversity_1</i>
                    </div>
                    <span class="nav-link-text ms-1">Employees</span>
                </a>
            </li>
            </li>
            @if (auth()->user()->role === 'admin')
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'leave-approval' ? ' active bg-gradient-primary' : '' }} "
                    href="/pages/leave-approval">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">free_cancellation</i>
                    </div>
                    <span class="nav-link-text ms-1">Leave Approval</span>
                </a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'register' ? ' active bg-gradient-primary' : '' }} "
                    href="/pages/dashboard">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_add</i>
                    </div>
                    <span class="nav-link-text ms-1">Register</span>
                </a>
            </li>
            </li>
            @endif
            <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                <div class="mx-3">
                    <a class="btn bg-gradient-primary w-100" href="/pages/profile"> <i
                            class="material-icons opacity-10">account_circle</i>
                        <span class="nav-link-text ms-1">Profile</span></a>
                </div>
            </div>
        </ul>
    </div>

</aside>