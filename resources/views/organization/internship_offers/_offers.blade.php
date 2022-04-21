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
                        <a href="#" class="widget-list-item-description-title">
                            {{ $offer->title }}
                        </a>
                        <span class="widget-list-item-description-subtitle">
                            {{ $offer->job_description }}
                        </span>
                    </span>
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
