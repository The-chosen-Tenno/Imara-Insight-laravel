{{-- Edit project model --}}
<div class="modal fade" id="editProjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-radius-lg">

            <!-- Header -->
            <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div
                    class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                    <h6 class="text-white m-0">Edit Project</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
            </div>

            <!-- Body -->
            <form action="" method="POST" id="editProjectForm">
                @csrf
                <input type="hidden" class="form-control" name="user_id" required>
                <div class="modal-body px-4 pb-3">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Project Name</label>
                        <input type="text" class="form-control" name="project_name" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">

                        <textarea class="form-control" name="description" rows="4" placeholder="Description"></textarea>
                    </div>

                    <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="project_type" required>
                            <option value="" disabled selected>Project Type</option>
                            <option value="coding">Coding</option>
                            <option value="automation">Automation</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="sub-assignees[]" id="subAssigneeSelect" multiple>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <select class="form-control" name="tags[]" id="tagSelect" multiple>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label" for="projectImages">Upload Project Images</label>
                        <input type="file" class="form-control" name="project_images[]" id="projectImages"
                            accept="image/*" multiple>
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