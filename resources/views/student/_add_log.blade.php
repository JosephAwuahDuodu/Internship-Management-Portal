<!-- Modal -->
<div class="modal fade" id="add_log_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Week's Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('student_logs.store') }}" method="post">
                @csrf
                <div class="modal-body pt-0">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group mt-3">
                                <label for="title">Week Number:** </label>
                                <select name="" id="" class="form-control">
                                    <option value="" disabled>Select Week</option>
                                    <option value="1">Week 1</option>
                                    <option value="2">Week 2</option>
                                    <option value="3">Week 3</option>
                                    <option value="4">Week 4</option>
                                    <option value="5">Week 5</option>
                                    <option value="6">Week 6</option>
                                    <option value="7">Week 7</option>
                                    <option value="8">Week 8</option>
                                </select>
                            </div>

                            <div class="form-group  mt-3">
                                <label for="work_assigned">Work Assigned :** </label>
                                <textarea name="work_assigned" class="form-control" id="work_assigned" rows="4" required>{{ old('work_assigned') }}</textarea>
                            </div>

                            <div class="form-group  mt-3">
                                <label for="acquired_skill">Special Skill Acquired :** </label>
                                <textarea name="acquired_skill" class="form-control" id="acquired_skill" rows="4" required>{{ old('acquired_skill') }}</textarea>
                            </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success" value="Save Internship Offer Details">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
