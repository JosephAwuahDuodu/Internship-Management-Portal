@extends('layouts.base')
@section('title', "Student Info")

@section('page_title', $student_info->name)

@section('main_content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start  text-decoration-underline">Student Basic Info</h4>
                    <a href="{{ route('students.index') }}" class="float-end btn btn-danger btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><b> Programme: </b> {{ $student_info->programme ?? "N/A" }}</div>
                        <div class="col"><b> Contact: </b> {{ $student_info->phone ?? "N/A" }}</div>
                        <div class="col"><b> Email: </b> {{ $student_info->email ?? "N/A" }}</div>
                        <div class="col-12 text-center mt-3"><h4><b> Internship Status: </b> <span class="text-danger">Not Started </span> </h4></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header text-decoration-underline"><h4> Internship Activity Log </h4></div>
                <div class="card-body"></div>
            </div>
        </div>
    </div>

    {{-- @include('admin.students._add_student_modal') --}}

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
