
<div class="card">
    <div class="card-body">
        <a href="" type="button" class="float-right btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add_organization_modal">Add New User</a>
        <div class="table-responsive mt-4">
            <table id="dt_table" class="table display" style="width:100%">
                <thead>
                    <tr>
                        <th class="font-weight-bold">#</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Phone</th>
                        <th class="font-weight-bold">Email</th>
                        <th class="font-weight-bold">Role</th>
                        <th class="font-weight-bold"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td style="width: 5px;">{{ $loop->iteration }}</td>
                            <td>{{ $user->username ?? "" }}</td>
                            <td>{{ $user->phone ?? "N / A" }}</td>
                            <td>{{ $user->email ?? "" }}</td>
                            <td>{{ $user->user_role->role->name ?? "" }}</td>
                            <td style="min-width: 200px;">
                                <button class="btn btn-sm btn-success">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Disable</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th class="font-weight-bold">#</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Phone</th>
                        <th class="font-weight-bold">Email</th>
                        <th class="font-weight-bold">Role</th>
                        <th class="font-weight-bold"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
