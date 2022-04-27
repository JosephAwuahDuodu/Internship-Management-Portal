<!-- Modal -->
<div class="modal fade" id="add_student_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('organizations.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body pt-0">
                    <div class="row">

                        <div class="col-md-12">

                            <a href="{{ asset('static/files/student_list.jpg') }}" style="font-size: 1.2em; font-weight:bold;" type="button" class="text-center text-uppercase btn btn-danger btn-sm" download>Download Sample Sheet</a>

                            <div class="form-group mt-3">
                                <label for="org_name">Student List File:* </label>
                                <input type="file" title="Upload Student File" name="students_list" value="{{ old('students_list') }}" placeholder="Student List to be Uploaded" class="form-control" id="students_list" required>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success" value="Upload Students Details">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
