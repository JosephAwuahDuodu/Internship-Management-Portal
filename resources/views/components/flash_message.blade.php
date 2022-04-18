{{-- action response area --}}
@if(session('success'))
    <div class="alert alert-success font-weight-bolder"> {{ session('success') }} </div>
@endif
@if(session('error'))
    <div class="alert alert-danger font-weight-bolder"> {{ session('error') }} </div>
@endif

{{-- form errors area --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
