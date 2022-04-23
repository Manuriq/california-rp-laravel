<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo">
                    <a href="index.html">
                        <img class="default-logo" src="{{ asset('img/sfrp_favico.png') }}" width="100px" height="100px" alt="" /><br>
                        <span>SFRP - Dashboard</span>
                    </a>
                </div>

                <li class="label">Dashboard</li>
                <li><a href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i> Accueil</a></li>
                <li><a href="{{ route('categorie.index') }}"><i class="fa-solid fa-comment-dots"></i> Forum</a></li>
                @if (Auth::User()->cAdmin > 1)
                    <li class="label">Administration</li>
                    <li><a href="#"><i class="fa-solid fa-user-gear"></i> Gestion Utilisateurs</a></li>
                    <li><a href="{{ route('forum.index') }}"><i class="fa-solid fa-gears"></i> Gestion Forum</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>