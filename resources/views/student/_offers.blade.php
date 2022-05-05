<div class="card widget widget-list">
    <div class="card-header">
        <h5 class="card-title">Listed Openings
            <span class="badge badge-success badge-style-light">
                {{-- <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#add_internship_offer_modal">Add New Offer</button> --}}
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
                            <span style="font-weight:bolder;"> Company:</span> {{ $offer->job_description }} |
                            Posted: <span style="font-weight:bold;"> {{ $offer->created_at->diffForHumans() }} </span>
                        </span>
                    </span>

                    @if (!$applied_internships->contains($offer->offer_id))
                        <form action="{{ route('offer_applications.store') }}" method="post">
                            @csrf

                                <input type="hidden" name="offer" value="{{ $offer->offer_id }}">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="material-icons-outlined">check</i>
                                    Apply
                                </button>

                        </form>
                    @else
                    <form action="{{ route('offer_applications.withdraw_application') }}" method="post">
                        @csrf

                            <input type="hidden" name="offer" value="{{ $offer->offer_id }}">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="material-icons-outlined">cancel</i>
                                Pending: Withdraw Application
                            </button>

                    </form>
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
