<div class="app-sidebar">
    <div class="logo" style="padding: 15px 20px">
        <a href="{{ route('home') }}" class="logo-icon"><span class="logo-text">LWCC</span></a>
        <div class="sidebar-user-switcher user-activity-online">
            {{-- <a href="#">
                <img src="../../assets/images/avatars/avatar1.jpg">
                <span class="activity-indicator"></span>
                <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span>
            </a> --}}
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Menu
            </li>
            <li><a href="{{ route('home') }}"><i class="material-icons-two-tone">dashboard</i>Home</a>
            </li>
            <li>
                <a href="{{ route('internship_offers.index') }}"><i class="material-icons-two-tone">book</i>Internship Offers</a>
            </li>
            <li>
                <a href="{{ route('students.index') }}"><i class="material-icons-two-tone">person</i>Students</a>
            </li>
            <li>
                <a href="{{ route('organizations.index') }}"><i class="material-icons-two-tone">business</i>Organisations</a>
            </li>

            <li class="sidebar-title">
                Logs
            </li>
            <li><a href=""><i class="material-icons-two-tone">book</i>Student Logs</a></li>

            <li class="sidebar-title">
                System
            </li>
            <li><a href="{{ route('user.index') }}"><i class="material-icons-two-tone">book</i>Manage Users</a></li>
            {{-- <li><a href=""><i class="material-icons-two-tone">book</i>System Logs</a></li> --}}
            <li><a href=""><i class="material-icons-two-tone">edit</i>Edit My Profile</a></li>

            <li class="text-center mt-3">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-danger btn-sm font-weight-bold">
                        {{-- <i class="material-icons-two-tone">access_time</i> --}}
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </div>
</div>
