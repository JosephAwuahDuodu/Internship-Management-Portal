
<div class="card">
    <div class="card-body">
        <a href="" type="button" class="float-right btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add_student_modal">Add New Studnnt</a>
        <div class="table-responsive mt-4">
            <table id="dt_table" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th class="font-weight-bold">#</th>
                        <th class="font-weight-bold">Student ID</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Phone</th>
                        <th class="font-weight-bold">Email</th>
                        <th class="font-weight-bold">Programme</th>
                        <th class="font-weight-bold"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td style="width: 5px;">{{ $loop->iteration }}</td>
                            <td>{{ $student->student_id ?? "" }}</td>
                            <td>{{ $student->name ?? "" }}</td>
                            <td>{{ $student->phone ?? "N/A" }}</td>
                            <td>{{ $student->email ?? "N/A" }}</td>
                            <td>{{ $student->programme ?? "" }}</td>
                            <td style="min-width: 50px;">
                                <a href="{{ route('students.show', [$student->student_id]) }}" class="btn btn-sm btn-success">View</a>
                                {{-- <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Disable</button> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Programme</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
