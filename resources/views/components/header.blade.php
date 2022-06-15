<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">             

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                    {{ Auth::User()->name }}
                    @if (Auth::User()->discord_id == 0)
                        (Discord Non Synchronisé)
                    @else
                        ({{ Auth::User()->discord_name }}#{{ Auth::User()->discord_disc }})
                    @endif
                </span>
                <img class="img-profile rounded-circle"
                    src="{{ asset('img/logo.png') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="http://forum.california-rp.fr/index.php?/profile/{{ Auth::User()->member_id }}-{{  Auth::User()->name }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                    Profile
                </a>
            
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    Déconnexion
                </a>
       
                @if (Auth::User()->discord_id == 0)
                    <a class="dropdown-item" href="{{ route('discord') }}">
                        <i class="fa-brands fa-discord"></i>
                        Synchroniser Discord
                    </a>
                @else
                    <a class="dropdown-item" href="{{ route('discord') }}">
                        <i class="fa-brands fa-discord"></i>
                        {{ Auth::User()->discord_name }}#{{ Auth::User()->discord_disc }}
                    </a>        
                @endif
                
            </div>
        </li>

    </ul>

</nav>