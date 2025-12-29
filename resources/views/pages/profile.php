<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="profile"></x-navbars.sidebar>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="User Profile"></x-navbars.navs.auth>

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row g-4">

                <!-- Profile Card -->
                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm-8">
                                <div class="card-body bg-light">
                                    <h2 class="card-title fw-bold mb-3">
                                        {{ $loginUserDetails['user_name'] ?? '' }}
                                    </h2>
                                    <dl class="row mb-4">
                                        <dt class="col-sm-3 fw-semibold">Fullname:</dt>
                                        <dd class="col-sm-9">{{ $loginUserDetails['full_name'] ?? '' }}</dd>

                                        <dt class="col-sm-3 fw-semibold">Email:</dt>
                                        <dd class="col-sm-9">{{ $loginUserDetails['email'] ?? '' }}</dd>
                                    </dl>

                                    @if(($profileUserId ?? 0) == $userId)
                                        <button class="btn btn-primary btn-sm edit-user-btn"
                                                data-id="{{ $loginUserDetails['id'] ?? '' }}">
                                            <i class='bx bx-cog me-2'></i> Edit My Profile
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4 text-center">
                                <div class="card-body p-0">
                                    <div class="mx-auto rounded-circle overflow-hidden border border-primary"
                                         style="width:180px; height:180px; display:flex; align-items:center; justify-content:center;">
                                        <img src="{{ !empty($loginUserDetails['photo']) ? url($loginUserDetails['photo']) : url('assets/img/illustrations/default-profile-picture.png') }}"
                                             class="w-100 h-100" style="object-fit:cover;" alt="User Photo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Project Summary Card -->
                @php
                    $counts = ['finished'=>0,'in_progress'=>0,'cancelled'=>0,'idle'=>0];
                    foreach($ProjectDetails as $p) {
                        $status = strtolower($p['status']);
                        if(isset($counts[$status])) $counts[$status]++;
                    }
                    $totalProjects = array_sum($counts);
                @endphp

                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="fw-bold mb-3">Project Summary</h4>
                            <div class="row text-center g-3 justify-content-center">
                                @foreach(['Total'=>$totalProjects,'In Progress'=>$counts['in_progress'],'Idle'=>$counts['idle'],'Completed'=>$counts['finished'],'Cancelled'=>$counts['cancelled']] as $k=>$v)
                                    @php
                                        $bgClass = match($k){
                                            'In Progress'=>'success bg-opacity-10',
                                            'Idle'=>'secondary bg-opacity-10',
                                            'Completed'=>'info bg-opacity-10',
                                            'Cancelled'=>'danger bg-opacity-10',
                                            default=>'light'
                                        };
                                        $textClass = match($k){
                                            'In Progress'=>'success',
                                            'Idle'=>'secondary',
                                            'Completed'=>'info',
                                            'Cancelled'=>'danger',
                                            default=>'muted'
                                        };
                                        $icon = match($k){
                                            'Total'=>'bi-kanban-fill',
                                            'In Progress'=>'bi-hourglass-split',
                                            'Idle'=>'bi-pause-circle-fill',
                                            'Completed'=>'bi-check-circle-fill',
                                            'Cancelled'=>'bi-x-circle-fill',
                                        };
                                    @endphp
                                    <div class="col-6 col-md">
                                        <div class="p-3 rounded shadow-sm bg-{{ $bgClass }}">
                                            <h6 class="text-{{ $textClass }} mb-1">
                                                <i class="bi {{ $icon }}"></i> {{ $k }}
                                            </h6>
                                            <h5 class="fw-bold text-{{ $textClass }} display-6 mb-0">{{ $v }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Leave Summary Card -->
                @php
                    $defaultLeave = 7;
                    $result = [
                        'annual_taken'  => $defaultLeave - ($leaveLimitDetails['annual_balance'] ?? 0),
                        'casual_taken'  => $defaultLeave - ($leaveLimitDetails['casual_balance'] ?? 0),
                        'medical_taken' => $defaultLeave - ($leaveLimitDetails['medical_balance'] ?? 0),
                    ];
                    $totalLeaveTook = [
                        'annual_total' => $result['annual_taken'] + ($leaveLimitDetails['annual_extra'] ?? 0),
                        'casual_total' => $result['casual_taken'] + ($leaveLimitDetails['casual_extra'] ?? 0),
                        'medical_total'=> $result['medical_taken'] + ($leaveLimitDetails['medical_extra'] ?? 0)
                    ];
                    $statusColours = ['available'=>'secondary','exhausted'=>'warning','overused'=>'danger'];
                @endphp

                <div class="col-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <h4 class="fw-bold mb-3">Leave Summary</h4>
                            <div class="row text-center g-3 justify-content-center">
                                @foreach(['Annual','Casual','Medical'] as $type)
                                    @php
                                        $key = strtolower($type);
                                        $divColour = $statusColours[$leaveLimitDetails[$key.'_status'] ?? 'available'];
                                    @endphp
                                    <div class="col-6 col-md">
                                        <div class="p-3 bg-{{ $divColour }} bg-opacity-10 rounded shadow-sm">
                                            <h6 class="text-{{ $divColour }} mb-1">
                                                <i class="bi {{ $key=='annual'?'bi-calendar-check-fill':($key=='casual'?'bi-sun-fill':'bi-heart-pulse-fill') }}"></i> {{ $type }}
                                            </h6>
                                            <div class="fw-bold">Used: <span class="text-dark">{{ $totalLeaveTook[$key.'_total'] ?? 0 }}</span></div>
                                            <div class="small text-muted">{{ $leaveLimitDetails[$key.'_status'] ?? 'normal' }}</div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-6 col-md">
                                    <div class="p-3 bg-secondary bg-opacity-10 rounded shadow-sm">
                                        <h6 class="text-secondary mb-1">
                                            <i class="bi bi-clock-fill"></i> Short
                                        </h6>
                                        <div class="fw-bold">Used: <span class="text-dark">{{ $leaveLimitDetails['total_short_leave'] ?? 0 }}</span></div>
                                        <div class="small text-muted">No fixed limit</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit-user-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="update-form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update_user">
                        <input type="hidden" id="user_id" name="ID">

                        <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" id="user_name" name="UserName" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" name="Email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Profile Image</label>
                            <input type="file" name="Photo" id="profileImage" class="form-control" accept="image/*">
                            <img id="profileImagePreview" src="" alt="Profile Preview" class="mt-2 d-none" style="max-width:100px;">
                        </div>

                        <div id="edit-additional-fields"></div>
                        <div id="edit-alert-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update-user">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const editBtns = document.querySelectorAll('.edit-user-btn');
    const modal = new bootstrap.Modal(document.getElementById('edit-user-modal'));
    const userIdInput = document.getElementById('user_id');
    const userNameInput = document.getElementById('user_name');
    const emailInput = document.getElementById('email');

    editBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.id;
            // just fill dummy values, route is empty
            userIdInput.value = id;
            userNameInput.value = '';
            emailInput.value = '';
            modal.show();
        });
    });

    document.getElementById('update-user').addEventListener('click', () => {
        const form = document.getElementById('update-form');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }
        // simulate success
        document.getElementById('edit-alert-container').innerHTML =
            '<div class="alert alert-success">Updated successfully!</div>';
        setTimeout(()=> modal.hide(), 1000);
    });
});
</script>
