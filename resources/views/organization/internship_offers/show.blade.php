@extends('layouts.base')
@section('title', "Internship Offers")

@section('page_title', $offer->title)

@section('main_content')
    {{-- @include('components.top-tabs') --}}

    <div class="row">
        <div class="col-xl-12">
            @include('organization.internship_offers._applicants', ['applicants'=>$applicants])
        </div>
    </div>

    {{-- @include('organization.internship_offers._add_offer_modal') --}}

@endsection
