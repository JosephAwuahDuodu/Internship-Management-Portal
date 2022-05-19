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
                    {{-- <div class="card-header">
                        <h3>Weekly Log</h3>
                    </div> --}}
                    <div class="card-body shadow">
                        <h4>January : (Week 1)</h4>
                        <P>
                            - In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. <br>
                            - In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.
                        </P>
                    </div>
                    <div class="card-body shadow">
                        <h4>Currently Engaged with: {{ $current_internship->organization->org_name ?? "" }} </h4>
                    </div>
                </div>


                {{-- @include('student._offers', ['offers'=>$internship_offers]) --}}
            @endif
        </div>
    </div>
@endsection
