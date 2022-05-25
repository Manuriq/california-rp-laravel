<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="{{ route('dashboard') }}">
                        <img class="default-logo" src="{{ asset('img/sfrp_favico.png') }}" width="100px" height="100px" alt="" /><br>
                        <span>SFRP - Dashboard</span>
                    </a>
                </div>

                <li class="label">Dashboard</li>
                <li><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Accueil</a></li>
                <li><a href="{{ route('personnage.list') }}"><i class="fa-solid fa-users"></i> Vos personnages</a></li>
                <li><a href="{{ route('categorie.index') }}"><i class="fa-solid fa-comment-dots"></i> Forum</a></li>
                @if (Auth::User()->cAdmin > 1)
                    <li class="label">Administration</li>
                    <li><a href="{{ route('forum.index') }}"><i class="fa-solid fa-gears"></i> Gestion Forum</a></li>
                    <li><a href="{{ route('categorie.list') }}"><i class="fa-solid fa-folder-open"></i> Gestion Catégories</a></li>
                    <li><a href="{{ route('compte.list') }}"><i class="fa-solid fa-users-gear"></i> Gestion Utilisateur</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>