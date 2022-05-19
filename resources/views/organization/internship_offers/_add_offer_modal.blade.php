<!-- Modal -->
<div class="modal fade" id="add_internship_offer_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Internship Offer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('internship_offers.store') }}" method="post">
                @csrf
                <div class="modal-body pt-0">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group mt-3">
                                <label for="title">Title:** </label>
                                <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="dept">Department: </label>
                                <input name="dept" value="{{ old('dept') }}" type="text" class="form-control" id="dept" required>
                            </div>

                            <div class="form-group  mt-3">
                                <label for="job_description">Job Description:** </label>
                                <textarea name="job_description" class="form-control" id="job_description" rows="2" required>{{ old('job_description') }}</textarea>
                            </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="start_date">Start Date: </label>
                            <input name="start_date" value="{{ old('start_date') }}" type="date" class="form-control" id="start_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="end_date">End Date: </label>
                            <input name="end_date" value="{{ old('end_date') }}" type="date" class="form-control" id="end_date">
                        </div>
                    </div>
                    <input type="hidden" name="org_id" value="{{ $current_org_id }}">


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success" value="Save Internship Offer Details">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
