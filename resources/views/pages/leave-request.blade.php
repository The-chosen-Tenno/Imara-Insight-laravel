{{-- <x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="leave"></x-navbars.sidebar>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Leave Request"></x-navbars.navs.auth>

        <div class="container-fluid py-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 text-center">
                                <h6 class="text-white mb-0">Submit Leave Request</h6>
                                <p class="text-sm text-white opacity-8 mb-0">

                                </p>
                            </div>
                        </div>

                        <div class="card-body px-4 pb-3">
                            <form id="leaveRequestForm">
                                @csrf

                                <div class="input-group input-group-outline mb-3">
                                    <select name="reason_type" class="form-control" required>
                                        <option value="" disabled selected>Leave Type</option>
                                        <option value="annual">
                                            Annual
                                        </option>
                                        <option value="casual">
                                            Casual
                                        </option>
                                        <option value="medical">
                                            Medical
                                        </option>
                                    </select>
                                </div>

                                <div class="input-group input-group-outline mb-3">
                                    <select name="leave_duration" id="leaveDuration" class="form-control" required>
                                        <option value="" disabled>Duration</option>
                                        <option value="full">Full Day</option>
                                        <option value="half">Half Day</option>
                                        <option value="multi">Multiple Days</option>
                                    </select>
                                </div>

                                <div class="input-group input-group-static mb-3" id="singleDate">
                                    <label>Leave Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>

                                <div class="mb-3 d-none" id="halfDay">
                                    <label class="text-sm fw-bold d-block mb-2">Half Day</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="half_day" value="first">
                                            <label class="form-check-label">Morning</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="half_day" value="second">
                                            <label class="form-check-label">Afternoon</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row d-none" id="multiDay">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group input-group-static">
                                            <label class="">Start Date</label>
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group input-group-static">
                                            <label class="">End Date</label>
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group input-group-outline mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" rows="4" class="form-control" required></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-primary w-100">
                                        Submit Request
                                    </button>
                                </div>
                            </form>

                            <div id="resultBox" class="text-center d-none mt-4">
                                <h5 id="resultTitle"></h5>
                                <p id="resultMessage"></p>
                                <button class="btn btn-outline-dark" id="requestAgain">
                                    Request Again
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>

<script src="{{ asset('assets/custom/js/leave-request.js') }}"></script> --}}

<x-layout bodyClass="g-sidenav-show bg-gray-200">
    <x-navbars.sidebar activePage="leave"></x-navbars.sidebar>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Leave Request"></x-navbars.navs.auth>

        <div class="container-fluid py-4">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="text-white text-capitalize m-0">Submit Leave Request</h6>
                                        <p class="text-sm text-white opacity-8 mb-0 mt-1">
                                            Request time off by completing the form
                                        </p>
                                    </div>
                                    <i class="material-icons text-white opacity-10"
                                        style="font-size: 2.5rem;">event_note</i>
                                </div>
                            </div>
                        </div>

                        <div class="card-body px-4 pb-4 pt-4">
                            <form id="leaveRequestForm">
                                @csrf

                                <div class="row">
                                    <!-- Leave Type -->
                                    <div class="col-md-6 mb-4">
                                        <label
                                            class="form-label text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-2">
                                            <i class="material-icons text-sm align-middle me-1">category</i>Leave Type
                                        </label>
                                        <div class="input-group input-group-outline">
                                            <select name="reason_type" class="form-control" required>
                                                <option value="" disabled selected>Choose type</option>
                                                <option value="annual">Annual Leave</option>
                                                <option value="casual">Casual Leave</option>
                                                <option value="medical">Medical Leave</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Duration -->
                                    <div class="col-md-6 mb-4">
                                        <label
                                            class="form-label text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-2">
                                            <i class="material-icons text-sm align-middle me-1">schedule</i>Duration
                                        </label>
                                        <div class="input-group input-group-outline">
                                            <select name="leave_duration" id="leaveDuration" class="form-control"
                                                required>
                                                <option value="" disabled selected>Choose duration</option>
                                                <option value="full" selected>Full Day</option>
                                                <option value="half">Half Day</option>
                                                <option value="multi">Multiple Days</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Date -->
                                <div class="mb-4" id="singleDate">
                                    <label
                                        class="form-label text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-2">
                                        <i class="material-icons text-sm align-middle me-1">calendar_today</i>Leave Date
                                    </label>
                                    <div class="input-group input-group-static">
                                        <input type="date" name="start_date" class="form-control border px-3 py-2">
                                    </div>
                                </div>

                                <!-- Half Day -->
                                <div class="mb-4 d-none" id="halfDay">
                                    <label
                                        class="form-label text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-2 d-block">
                                        <i class="material-icons text-sm align-middle me-1">access_time</i>Select Period
                                    </label>
                                    <div class="d-flex gap-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="half_day" value="first"
                                                id="morning">
                                            <label class="form-check-label text-sm" for="morning">
                                                <span class="badge badge-sm bg-gradient-info">
                                                    <i class="material-icons text-xs align-middle">wb_sunny</i> Morning
                                                </span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="half_day" value="second"
                                                id="afternoon">
                                            <label class="form-check-label text-sm" for="afternoon">
                                                <span class="badge badge-sm bg-gradient-warning">
                                                    <i class="material-icons text-xs align-middle">wb_twilight</i>
                                                    Afternoon
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Multi Day -->
                                <div class="row d-none" id="multiDay">
                                    <div class="col-md-6 mb-4">
                                        <label
                                            class="form-label text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-2">
                                            <i class="material-icons text-sm align-middle me-1">start</i>Start Date
                                        </label>
                                        <div class="input-group input-group-static">
                                            <input type="date" name="start_date" class="form-control border px-3 py-2">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label
                                            class="form-label text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-2">
                                            <i class="material-icons text-sm align-middle me-1">event</i>End Date
                                        </label>
                                        <div class="input-group input-group-static">
                                            <input type="date" name="end_date" class="form-control border px-3 py-2">
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <label
                                        class="form-label text-uppercase text-secondary text-xs font-weight-bolder opacity-7 mb-2">
                                        <i class="material-icons text-sm align-middle me-1">description</i>Reason for
                                        Leave
                                    </label>
                                    <div class="input-group input-group-outline">
                                        <textarea name="description" rows="5" class="form-control"
                                            placeholder="Please provide details about your leave request..."
                                            required></textarea>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn bg-gradient-primary w-100 mb-0 py-3">
                                        <i class="material-icons align-middle">send</i>&nbsp;&nbsp;Submit Leave Request
                                    </button>
                                </div>
                            </form>

                            <!-- Result -->
                            <div id="resultBox" class="d-none">
                                <div class="card mt-4 border-0">
                                    <div class="card-body text-center py-5">
                                        <div class="mb-3">
                                            <i class="material-icons text-success" style="font-size: 3rem;"
                                                id="resultIcon">check_circle</i>
                                        </div>
                                        <h5 class="mb-2 font-weight-bold" id="resultTitle"></h5>
                                        <p class="text-sm text-secondary mb-4" id="resultMessage"></p>
                                        <button class="btn btn-outline-primary mb-0 px-5" id="requestAgain">
                                            <i class="material-icons text-sm align-middle">refresh</i>&nbsp;&nbsp;Submit
                                            Another Request
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>

<script src="{{ asset('assets/custom/js/leave-request.js') }}"></script>