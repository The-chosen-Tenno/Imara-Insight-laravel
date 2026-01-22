<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <style>
        .bg-warning-soft {
            background-color: #fff4e5;
        }

        .bg-success-soft {
            background-color: #e8f5e9;
        }

        .bg-danger-soft {
            background-color: #ffebee;
        }

        .text-xxs {
            font-size: 0.68rem !important;
            letter-spacing: 0.05rem;
        }

        .card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
    </style>
    <x-navbars.sidebar activePage="leave-approval"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Leave Requests Command Center"></x-navbars.navs.auth>

        <div class="container-fluid py-4">
            <div class="row px-4">
                @php
                $statusColors = [
                'pending' => 'warning',
                'approved' => 'success',
                'denied' => 'danger'
                ];
                @endphp
                @if ($leaveRequests->isNotEmpty())
                @foreach($leaveRequests as $leave)
                <div class="col-xl-4 col-md-6 mb-4 leave-card" data-leave-id="{{ $leave->id }}">
                    <div class="card border-0 shadow-lg overflow-hidden h-100">
                        {{-- Status Indicator Accent --}}
                        <div class="bg-gradient-{{ $statusColors[$leave->status] }}" style="height: 5px;"></div>

                        <div class="card-body p-3">
                            {{-- Header: Profile & Status --}}
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm rounded-circle bg-gray-200 me-2">
                                        <img src="{{ $leave->user->image ? asset($leave->user->image) : asset('assets/img/default-pfp.jpg') }}"
                                            alt="user">
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-sm font-weight-bolder">{{ $leave->user->user_name }}</h6>
                                        <p class="text-xxs text-muted mb-0">Applied {{
                                            $leave->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span
                                    class="badge badge-sm bg-{{ $statusColors[$leave->status] }}-soft text-{{ $statusColors[$leave->status] }} text-xxs">
                                    {{ strtoupper($leave->status) }}
                                </span>
                            </div>

                            {{-- The "Calendar" Insight Block --}}
                            <div class="row g-0 bg-gray-100 border-radius-lg p-3 mb-3">
                                <div
                                    class="col-4 text-center border-end border-gray-300 d-flex flex-column justify-content-center">
                                    <h4 class="mb-0 font-weight-bolder text-dark">
                                        {{ \Carbon\Carbon::parse($leave->start_date)->format('d') }}
                                    </h4>
                                    <small class="text-xxs text-uppercase text-muted font-weight-bold">
                                        {{ \Carbon\Carbon::parse($leave->start_date)->format('M Y') }}
                                    </small>
                                </div>
                                <div class="col-8 ps-3">
                                    <div class="mb-1">
                                        <span
                                            class="text-xxs text-uppercase text-muted font-weight-bolder">Duration</span>
                                        <p class="text-xs font-weight-bold mb-0">{{ $leave->leave_duration }} Day/s</p>
                                    </div>
                                    <div>
                                        <span class="text-xxs text-uppercase text-muted font-weight-bolder">End
                                            Date</span>
                                        <p class="text-xs font-weight-bold mb-0 text-info">
                                            {{-- Fallback logic: If end_date is empty, show start_date --}}
                                            {{ $leave->end_date ? \Carbon\Carbon::parse($leave->end_date)->format('M d,
                                            Y') : \Carbon\Carbon::parse($leave->start_date)->format('M d, Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- Employee Description --}}
                            <div class="mb-3 px-1">
                                <h6 class="text-xxs text-uppercase text-muted font-weight-bolder mb-1">Reason for Leave:
                                </h6>
                                <p class="text-xs text-dark opacity-8 mb-0" style="min-height: 40px; line-height: 1.4;">
                                    "{{ Str::limit($leave->description, 85) }}"
                                </p>
                            </div>

                            <hr class="horizontal dark my-3">

                            {{-- CRM Decision Footer --}}
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex gap-2 w-100">
                                    <button
                                        class="approve_button btn btn-sm bg-gradient-success flex-grow-1 mb-0 shadow-none"
                                        >
                                        <i class="material-icons text-xs me-1">done</i>Approve
                                    </button>
                                    <button
                                        class="btn btn-sm btn-outline-danger flex-grow-1 mb-0 shadow-none deny_button">
                                        <i class="material-icons text-xs me-1">close</i>Deny
                                    </button>
                                </div>
                                <form class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12">
                    <div class="text-center py-5">
                        <h5 class="mb-2">You covered all requests ✅</h5>
                        <button class="btn btn-sm btn-outline-primary">Load Old Requests</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/custom/js/leave-approval.js') }}"></script>
</x-layout>