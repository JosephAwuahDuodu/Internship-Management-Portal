@extends('layouts.base')
@section('title', "Homepage")

@section('page_title', 'Dashboard')

@section('main_content')
    @include('components.top-tabs')

    <div class="row">
        <div class="col-xl-8">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Internship Offers<span class="badge badge-success badge-style-light">{{ count($internship_offers) ?? 0 }} Listed</span></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">Showing {{ count($internship_offers) ?? 0 }} out of {{ count($internship_offers) ?? 0 }} active offers.</span>
                    <ul class="widget-list-content list-unstyled">
                        @if ($internship_offers ?? "")
                            @forelse ($internship_offers as $offer)
                                <li class="widget-list-item widget-list-item-green">
                                    <span class="widget-list-item-icon"><i class="material-icons-outlined">article</i></span>
                                    <span class="widget-list-item-description">
                                        <a href="#" class="widget-list-item-description-title">
                                            {{ $offer->title ?? "N/A" }}
                                        </a>
                                        <span class="widget-list-item-description-subtitle">
                                            {{ $offer->company->org_name ?? "Company Name"}}
                                        </span>
                                    </span>
                                </li>
                            @empty
                                <span class="text-center font-weight-bolder text-danger">No Internship Offers Listed Yet.</span>
                            @endforelse
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Organizations<span class="badge badge-success badge-style-light">{{ count($organizations) ?? "" }} Listed</span></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">showing {{ count($organizations) ?? "" }} out of {{ count($organizations) ?? "" }} active records.</span>
                    <ul class="widget-list-content list-unstyled">
                        @if ($organizations ?? "")
                            @forelse ($organizations as $org)
                            <li class="widget-list-item widget-list-item-green">
                                <span class="widget-list-item-description">
                                    <a class="widget-list-item-description-title">
                                        {{ $org->org_name ?? "Organization Name" }}
                                    </a>
                                    <span class="widget-list-item-description-subtitle">
                                        {{-- {{ Oskar Hudson }} --}}
                                    </span>
                                </span>
                            </li>

                            @empty

                            @endforelse
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
