@extends('layouts.base')
@section('title', "My Logs")

@section('page_title', 'My Logs')

@section('main_content')
    {{-- @include('components.top-tabs') --}}

    <div class="row">
        <div class="col-xl-12 py-2">
            @if (!$current_internship)
                @include('components.alert', ['type'=>"danger", 'text'=>"You Are Currently Not Enrolled In Any Internship Yet."])
            @endif
        </div>
    </div>
@endsection
