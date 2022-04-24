@extends('layouts.base')
@section('title', "Students")

@section('page_title', 'Students')

@section('main_content')
    <div class="row">
        <div class="col">
            @if ($students ?? "")
                @include('admin.students._students', ['students'=>$students])
            @else
                <h3>Nothing to display</h3>
            @endif
        </div>
    </div>

    @include('admin.students._add_student_modal')

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
