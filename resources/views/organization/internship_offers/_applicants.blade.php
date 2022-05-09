<div class="card widget widget-list">
    <div class="card-header">
        <h4 class="fw-bold text-decoration-underline">Applicants <span class="badge badge-success badge-style-light"></span></h4>
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
                                {{ $applicant->details->name }}
                            </a>
                        </span>
                        <span class="widget-list-item-description-subtitle">
                            @if ($applicant->active_status)
                                <button type="button" class="btn btn-outline-success btn-sm">
                                    {{-- <i class="material-icons-outlined">check</i> --}}
                                    Approved
                                </button>
                            @else
                                @if (\App\Models\User::is_organization())
                                    <form action="{{ route('approve_intership_request') }}" method="post" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="request" value="{{ $applicant->id }}">
                                        <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-success btn-sm">
                                            Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('approve_intership_request') }}" method="post" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="request" value="{{ $applicant->id }}">
                                        <button onclick="return confirm('Are You Sure?')" type="submit" class="btn btn-danger btn-sm">
                                            Reject
                                        </button>
                                    </form>
                                @endif
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
