@extends('layouts.base')
@section('title', "Company Dashboard")

@section('page_title', 'Dashboard')

@section('main_content')
    {{-- @include('components.top-tabs') --}}

    <div class="row">
        <div class="col-xl-6">
            @include('organization.internship_offers._offers', ['offers'=>$offers])
        </div>

        <div class="col-xl-6">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Applicants <span class="badge badge-success badge-style-light"></span></h5>
                </div>
                <div class="card-body">
                    {{-- <span class="text-muted m-b-xs d-block">showing 5 out of 23 active tasks.</span> --}}
                    @if ($applicants ?? "")
                        @forelse ($applicants as $applicant)
                            <ul class="widget-list-content list-unstyled">
                                <li class="widget-list-item widget-list-item-green">
                                    <span class="widget-list-item-icon"><i class="material-icons-outlined">article</i></span>
                                    <span class="widget-list-item-description">
                                        <a class="widget-list-item-description-title">
                                            {{ $applicant->details->name ?? "" }} | {{ $applicant->offer_details->title ?? "" }}
                                        </a>
                                    </span>
                                    <span class="widget-list-item-description-subtitle">
                                        @if ($applicant->active_status)
                                            <button type="button" class="btn btn-outline-success btn-sm">
                                                Approved
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-outline-danger btn-sm">
                                                Awaiting Approval
                                            </button>
                                        @endif
                                    </span>
                                </li>
                            </ul>
                        @empty
                            <div class="alert alert-danger">No Records Found</div>
                        @endforelse
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
