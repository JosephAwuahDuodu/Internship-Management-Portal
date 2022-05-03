@extends('layouts.base')
@section('title', "Homepage")

@section('page_title', 'Welcome')

@section('main_content')
    {{-- @include('components.top-tabs') --}}

    <div class="row">
        <div class="col-xl-12">
            @if (empty($current_internship))
                @include('components.alert', ['type'=>"danger", 'text'=>"You Are Currently Not Enrolled In Any Internship Yet."])

                @include('student._offers', ['offers'=>$internship_offers])
            @endif
        </div>
    </div>
@endsection
