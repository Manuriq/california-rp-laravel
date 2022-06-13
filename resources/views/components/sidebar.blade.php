<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center my-2" href="">
        <img src="{{ asset('img/bannière.png') }}" width="200px" height="80px">    
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Espace Membre
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('whitelist.index') }}">
            <i class="fas fa-fw fa-solid fa-clipboard-list"></i>
            <span>Espace Whitelist</span>
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('personnage.list') }}">
            <i class="fas fa-fw fa-solid fa-users"></i>
            <span>Mes personnages</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="http://forum.california-rp.fr/">
            <i class="fas fa-fw fa-solid fa-message"></i>
            <span>Forum</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    @if (Auth::User()->ingame_adminrank > 1)
        <div class="sidebar-heading">
            Administration
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('whitelist.list') }}">
                <i class="fas fa-fw fa-solid fa-clipboard-list"></i>
                <span>Gestion Whitelist</span>
            </a>
        </li>
    @endif
    <!-- Heading -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('img/discord.png') }}" alt="...">
        @if (Auth::User()->discord_id == 0)
            <p class="text-center mb-2">Synchronisez votre <strong>Discord</strong> pour pouvoir vous connecter en jeu et sur notre serveur Discord!</p>
        @else
            <p class="text-center mb-2">Votre <strong>Discord</strong> est correctement synchronisé!</p>
        @endif
        <a class="btn btn-primary btn-sm" href="{{ route('discord') }}">Synchroniser Discord!</a>
    </div>
    

</ul>
<!-- End of Sidebar -->