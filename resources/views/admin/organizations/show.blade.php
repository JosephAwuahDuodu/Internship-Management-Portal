@extends('layouts.base')
@section('title', $organization->org_name)

@section('page_title', $organization->org_name)

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-decoration-underline fw-bold">Organization Details </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            Contact: {{ $organization->info->primary_contact ?? "N / A" }}
                        </div>
                        <div class="col-3">
                            {{ $organization->info->email ?? "" }}
                        </div>
                        <div class="col-3">
                            {{ $organization->location->address ?? "" }}
                        </div>
                        <div class="col-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @include('organization.internship_offers._applicants', ['applicants'=>$applicants])
        </div>
    </div>

@endsection


@section('extra_js')
    <script src="{{ asset("static/plugins/datatables/datatables.min.js") }}"></script>
    <script src="{{ asset("static/js/pages/datatables.js") }}"></script>
@endsection
