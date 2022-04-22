<div class="card widget widget-list">
    <div class="card-header">
        <h5 class="card-title">Applicants
            <span class="badge badge-success badge-style-light">
                <a href="{{ route('internship_offers.index') }}" class="btn btn-sm btn-danger">Back</a>
            </span>
        </h5>
    </div>
    <div class="card-body">
        <ul class="widget-list-content list-unstyled">
            @forelse ($applicants as $applicant)
                <li class="widget-list-item widget-list-item-green">
                    <span class="widget-list-item-icon"><i class="material-icons-outlined">article</i></span>
                    <span class="widget-list-item-description">
                        <a href="{{ route('internship_applicants.show', ['internship_applicant'=>$applicant->applicant_id]) }}" class="widget-list-item-description-title">
                            {{ $applicant->title }}
                        </a>
                        <span class="widget-list-item-description-subtitle">
                            {{ $applicant->job_description }}
                        </span>
                    </span>
                </li>

                @empty
                    <li class="text-center widget-list-item widget-list-item-green">
                        {{-- <span class="widget-list-item-icon"><i class="material-icons-outlined">article</i></span> --}}
                        <span class="widget-list-item-description">
                            <a  class="widget-list-item-description-title text-danger font-weight-bold">
                                No Applicants in this Offer Yet!
                            </a>
                        </span>
                    </li>

            @endforelse
        </ul>
    </div>
</div>
