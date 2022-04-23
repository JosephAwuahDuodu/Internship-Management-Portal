<div class="row">
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-primary">
                        <i class="material-icons-outlined">book</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Internship Offers</span>
                        <span class="widget-stats-amount">{{ count($internship_offers) ?? 0 }} </span>
                    </div>
                    {{-- <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                        <i class="material-icons">keyboard_arrow_down</i> 4%
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-warning">
                        <i class="material-icons-outlined">person</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Active Users</span>
                        <span class="widget-stats-amount">{{ count($users) ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-danger">
                        <i class="material-icons-outlined">house</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Organizations</span>
                        <span class="widget-stats-amount">{{ count($organizations) ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
