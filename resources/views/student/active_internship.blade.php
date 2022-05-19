@extends('layouts.base')
@section('title', "Homepage")

@section('page_title', 'Welcome')

@section('main_content')
    {{-- @include('components.top-tabs') --}}

    <div class="row">
        <div class="col-xl-12">
            @if ($current_internship)
                {{-- @include('components.alert', ['type'=>"danger", 'text'=>"You Are Currently Not Enrolled In Any Internship Yet."]) --}}
                <div class="card">
                    <div class="card-body">
                        <h2>Currently Engaged with: {{ $current_internship->organization->org_name ?? "" }} </h2>
                    </div>
                </div>

                <div class="card p-4">
                    <button class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#add_log_modal">Add New</button>
                    @include('student._logs')
                </div>


            @endif
        </div>
    </div>

    @include('student._add_log')

@endsection
