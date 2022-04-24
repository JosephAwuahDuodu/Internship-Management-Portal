@extends('layouts.base')
@section('title', "Organizations")

@section('page_title', 'Organizations')

@section('main_content')
    <div class="row">
        <div class="col">
            @if ($organizations ?? "")
                @include('admin.organizations._organizations', ['organizations'=>$organizations])
            @else
                <h3>Nothing to display</h3>
            @endif
        </div>
    </div>

    @include('admin.organizations._add_organization_modal')

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
