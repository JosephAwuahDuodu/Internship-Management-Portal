@extends('layouts.base')
@section('title', "Internship Offers")

@section('page_title', 'Internship Offers')

@section('main_content')
    {{-- @include('components.top-tabs') --}}

    <div class="row">
        <div class="col-xl-12">
            @include('organization.internship_offers._offers')
        </div>
    </div>

    @include('organization.internship_offers._add_offer_modal')

@endsection
