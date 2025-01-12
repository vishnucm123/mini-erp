<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    {{-- <a class="navbar-brand" href="{{ url('/') }}"> PRO CRM </a> --}}
    {{-- Uncomment the logo if needed --}}



    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">




            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('panel/dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>



            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Banner">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fa fa-user-o"></i>
                    <span class="nav-link-text">User</span>
                </a>
            </li>




            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Banner">
                <a class="nav-link" href="{{ route('customers.index') }}">
                    <i class="fa fa-address-card"></i>
                    <span class="nav-link-text">Customer</span>
                </a>
            </li>


            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Banner">
                <a class="nav-link" href="{{ route('invoices.index') }}">
                    <i class="fa fa-superpowers"></i>
                    <span class="nav-link-text">Invoices</span>
                </a>
            </li>






        </ul>


        <ul class="navbar-nav ml-auto">
            <!-- User Profile Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link admin-user d-flex justify-content-between align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- Check if the user has a profile picture, else use the default image -->
                   <div class="admin-user-profile">
                    <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('default-avatar.png') }}" class="rounded-circle" width="30" height="30" alt="{{ auth()->user()->name }}">
                   </div>
                    <p>{{ auth()->user()->name }}</p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fa fa-fw fa-sign-out"></i> Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

