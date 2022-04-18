<!-- Modal -->
<div class="modal fade" id="add_organization_modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('add_new_user') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <!-- Name -->
                            <div class="mt-3">
                                <x-label for="username" :value="__('Username')" />

                                <x-input id="username" class="form-control" type="text" name="username"
                                    :value="old('username')" required autofocus />
                            </div>

                            <!-- Email -->
                            <div class="mt-3">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="form-control" type="text" name="email" :value="old('email')"
                                    required autofocus />
                            </div>

                            <!-- Phone Address -->
                            <div class="mt-3">
                                <x-label for="phone" :value="__('Phone')" />

                                <x-input id="phone" class="form-control" type="phone" name="phone" :value="old('phone')"
                                    required />
                            </div>

                            <div class="mt-3 org">
                                <x-label for="org" :value="__('Organization')" />

                                <select name="org" id="org" class="form-control">
                                    <option value="">Select User Organization</option>
                                    @if ($orgs ?? "")
                                    @foreach ($orgs as $org)
                                    <option value="{{ $org->org_id }}">{{ $org->org_name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <!-- Password -->
                            <div class="mt-3">
                                <x-label for="password" :value="__('Password')" />

                                <x-input id="password" class="form-control" type="password" name="password" required
                                    autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-3">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required />
                            </div>

                            <div class="mt-3">
                                <x-label for="role" :value="__('User Role')" />

                                <select name="role" id="role" class="form-control">
                                    <option value="" disabled>Select User Role</option>
                                    @if ($roles ?? "")
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>


                        <div class="flex items-center justify-end mt-3">
                            <x-button class="ml-4 btn btn-success">
                                {{ __('Add New User') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@section('extra_js')
    <script>
        // $(document).ready(function(){
            $('.org').hide();
            $('#role').on('change', function(){
                let role = $(this).val()
                // alert(role);
                if (role == 2) {
                    $('.org').show();
                } else {
                    $('.org').hide();
                }
            })
            // let role = $('#role').val();
        // })
    </script>
@endsection
