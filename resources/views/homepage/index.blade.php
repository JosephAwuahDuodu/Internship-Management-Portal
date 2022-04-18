@extends('layouts.base')
@section('title', "Homepage")

@section('page_title', 'Dashboard')

@section('main_content')
    @include('components.top-tabs')

    <div class="row">
        <div class="col-xl-8">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Internship Offers<span class="badge badge-success badge-style-light">0 Listed</span></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">Showing 5 out of 23 active tasks.</span>
                    <ul class="widget-list-content list-unstyled">
                        <li class="widget-list-item widget-list-item-green">
                            <span class="widget-list-item-icon"><i class="material-icons-outlined">article</i></span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Dashboard UI optimisations
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-blue">
                            <span class="widget-list-item-icon"><i class="material-icons-outlined">verified_user</i></span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Mailbox cleanup
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Woodrow Hawkins
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-purple">
                            <span class="widget-list-item-icon"><i class="material-icons-outlined">watch_later</i></span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Header scroll bugfix
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Sky Meyers
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-yellow">
                            <span class="widget-list-item-icon"><i class="material-icons-outlined">extension</i></span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Localization for file manager
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-red">
                            <span class="widget-list-item-icon"><i class="material-icons-outlined">invert_colors</i></span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    New E-commerce UX/UI design
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card widget widget-list">
                <div class="card-header">
                    <h5 class="card-title">Registered Students<span class="badge badge-success badge-style-light">0 Listed</span></h5>
                </div>
                <div class="card-body">
                    <span class="text-muted m-b-xs d-block">showing 5 out of 23 active tasks.</span>
                    <ul class="widget-list-content list-unstyled">
                        <li class="widget-list-item widget-list-item-green">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="">
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Dashboard UI optimisations
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-blue">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Mailbox cleanup
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Woodrow Hawkins
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-purple">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Header scroll bugfix
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Sky Meyers
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-yellow">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="">
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    Localization for file manager
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                        <li class="widget-list-item widget-list-item-red">
                            <span class="widget-list-item-check">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="" checked>
                                </div>
                            </span>
                            <span class="widget-list-item-description">
                                <a href="#" class="widget-list-item-description-title">
                                    New E-commerce UX/UI design
                                </a>
                                <span class="widget-list-item-description-subtitle">
                                    Oskar Hudson
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
