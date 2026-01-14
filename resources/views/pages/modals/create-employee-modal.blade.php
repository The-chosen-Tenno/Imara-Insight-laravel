{{-- Add Employee Modal --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content border-radius-lg">
            <div class="modal-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div
                    class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 px-3 w-100 d-flex justify-content-between align-items-center">
                    <h6 class="text-white m-0">Add Employee</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
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
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>