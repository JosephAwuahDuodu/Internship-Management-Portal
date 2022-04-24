<!-- Modal -->
<div class="modal fade" id="add_internship_offer_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New organization</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('organizations.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group mt-3">
                                <label for="org_name">Organisation Name:* </label>
                                <input type="text" title="" name="org_name" value="{{ old('name') }}" placeholder="Company Official Name" class="form-control" id="org_name" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="primary_contact">Primary Phone Number:* </label>
                                <input type="text" pattern="[0-9]{12}" title="Valid Format: 12 Digits Including Country Code" name="primary_contact" value="{{ old('primary_contact') }}" placeholder="Example: 233553220200" class="form-control" id="primary_contact" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="region_id">Region:* </label>
                                <select name="region_id" id="region_id" class="form-control" required>
                                    <option value="">Select Regions</option>
                                    @if ($regions ?? "")
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->region_id }}">{{ $region->region_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="email">Email: </label>
                                <input type="email"title="" name="email" value="{{ old('email') }}" placeholder="Company Official Email" class="form-control" id="email" required>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group mt-3">
                                <label for="industry_id">Industry: </label>
                                <select name="industry_id" id="industry_id" class="form-control" required>
                                    <option value="">Select Industry</option>
                                    @if ($industries ?? "")
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->industry_id }}">{{ $industry->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="other_contacts">Other Phone Numbers: </label>
                                <input type="text" title="Valid Format: 12 Digits Including Country Code" name="other_contacts" value="{{ old('other_contacts') }}" placeholder="233553220200, 233553220200" class="form-control" id="other_contacts">
                            </div>

                            <div class="form-group mt-3">
                                <label for="city">City: </label>
                                <input name="city" value="{{ old('city') }}" type="text" class="form-control" id="city" >
                            </div>

                            <div class="form-group mt-3">
                                <label for="post_office">P. O Box Office: </label>
                                <input name="post_office" value="{{ old('post_office') }}" type="text" class="form-control" id="post_office" >
                            </div>

                            <div class="form-group mt-3">
                                <label for="address">Address: </label>
                                <input name="address" value="{{ old('address') }}" type="text" class="form-control" id="address" required>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <label for="org_desc">Extra Information: </label>
                            <textarea name="org_desc" class="form-control" id="org_desc" rows="3">{{ old('org_desc') }}</textarea>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success" value="Save Organization Details">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
