<x-layout bodyClass="g-sidenav-show bg-gray-200">
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
                                    {{-- //text --}}
                                </p>
                            </div>
                        </div>

                        <div class="card-body px-4 pb-3">
                            <form id="leaveRequestForm">
                                @csrf

                                <!-- Leave Type -->
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
                                <!-- Duration -->
                                <div class="input-group input-group-outline mb-3">
                                    <select name="leave_duration" id="leaveDuration" class="form-control" required>
                                        <option value="" disabled>Duration</option>
                                        <option value="full">Full Day</option>
                                        <option value="half">Half Day</option>
                                        <option value="multi">Multiple Days</option>
                                    </select>
                                </div>

                                <!-- Single Date -->
                                <div class="input-group input-group-outline mb-3" id="singleDate">
                                    <label class="form-label">Leave Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>

                                <!-- Half Day -->
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

                                <!-- Multi Day -->
                                <div class="row d-none" id="multiDay">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group input-group-outline">
                                            <label class="form-label">Start Date</label>
                                            <input type="date" name="start_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group input-group-outline">
                                            <label class="form-label">End Date</label>
                                            <input type="date" name="end_date" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
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

                            <!-- Result -->
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

<script src="{{ asset('assets/custom/js/leave-request.js') }}"></script>
