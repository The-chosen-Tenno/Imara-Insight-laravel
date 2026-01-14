{{-- Add short leave --}}
<div class="modal fade" id="addShortLeave" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-radius-lg">

            <!-- Header -->
            <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div
                    class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                    <h6 class="text-white m-0">Add Short Leave</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
            </div>

            <!-- Body -->
            <form action="" method="POST" id="createProjectForm">
                @csrf

                <div class="modal-body px-4 pb-3">
                    <div id="currentTime" class=" mb-3 text-center"></div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Duration</label>
                        <input type="number" class="form-control" name="duration" required min="1" max="2" step="1">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Reason (optional)</label>
                        <input type="text" class="form-control" name="reason">
                    </div>
                    <div id="imagePreviewContainer" class="mb-3"></div>
                    <div id="messageDiv" class="mb-3"></div>
                </div>

                <!-- Footer -->
                <div class="modal-footer border-0 pt-0 px-4">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>