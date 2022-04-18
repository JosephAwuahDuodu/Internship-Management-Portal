@extends('layouts.base')
@section('title', "Users")

@section('page_title', 'Users')

@section('main_content')
    <div class="row">
        <div class="col">
            @if ($users ?? "")
                @include('users._users', ['users'=>$users])
            @else
                <h3>Nothing to display</h3>
            @endif
        </div>
    </div>

    @include('users._add_user_modal')

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
