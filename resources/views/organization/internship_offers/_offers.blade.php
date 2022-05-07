<div class="card widget widget-list">
    <div class="card-header">
        <h5 class="card-title">Listed Openings
            <span class="badge badge-success badge-style-light">
                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#add_internship_offer_modal">Add New Offer</button>
            </span>
        </h5>
    </div>
    <div class="card-body">
        <ul class="widget-list-content list-unstyled">
            @forelse ($offers as $offer)
                <li class="widget-list-item widget-list-item-green">
                    <span class="widget-list-item-icon"><i class="material-icons-outlined">article</i></span>
                    <span class="widget-list-item-description">
                        <a href="{{ route('internship_offers.show', ['internship_offer'=>$offer->offer_id]) }}" class="widget-list-item-description-title">
                            <span style="font-weight:bold;"> Job Title:</span> {{ $offer->title }}
                        </a>
                        <span class="widget-list-item-description-subtitle">
                            @if (\App\Models\User::is_admin())
                                <span style="font-weight:bolder;">
                                    <a class="text-dark" href="{{ route('organizations.show', ['organization' => $offer->org_id]) }}">
                                        Company:</span> {{ $offer->company->org_name }} |
                                    </a>
                                </span>
                                @endif
                                Posted: <span style="font-weight:bold;"> {{ $offer->created_at->diffForHumans() }} </span>
                        </span>
                    </span>

                    {{-- show only when for admin  --}}
                    @if (\App\Models\User::is_admin())
                        <form action="{{ route('change_offer_status') }}" method="post">
                            @csrf
                            @if ($offer->active_status)
                                <input type="hidden" name="offer" value="{{ $offer->offer_id }}">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="material-icons-outlined">cancel</i>
                                    Disapprove
                                </button>
                            @else
                                <input type="hidden" name="offer" value="{{ $offer->offer_id }}">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="material-icons-outlined">check</i>
                                    Approve
                                </button>
                            @endif
                        </form>
                    @else
                        @if ($offer->active_status)
                            <button type="button" class="btn btn-outline-success btn-sm">
                                <i class="material-icons-outlined">check</i>
                                Approved
                            </button>
                        @else
                            <button type="button" class="btn btn-outlined-danger btn-sm">
                                <i class="material-icons-outlined">cancek</i>
                                Awaiting Approval
                            </button>
                        @endif
                    @endif

                </li>

            @empty
                    <li class="text-center widget-list-item widget-list-item-green">
                        <span class="widget-list-item-icon"><i class="material-icons-outlined">article</i></span>
                        <span class="widget-list-item-description">
                            <a href="#" class="widget-list-item-description-title">
                                No Openings Available
                            </a>
                        </span>
                    </li>
            @endforelse
        </ul>
    </div>
</div>
