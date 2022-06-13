@extends("layouts.dashboard")


@section("content")
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Espace Whitelist</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Passer sa whitelist</h6>
            </div>
            <div class="card-body">
                <p>
                @if (!$whitelist)
                    Vous vous apprêtez à passer la whitelist pour jouer sur San Fierro RolePlay, assurez-vous d'avoir correctement lu le règlement du serveur,
                    vous n'avez le droit qu'à 3 chances. <br><br>
                    <a class="btn btn-primary" href="{{ route('whitelist.create') }}" role="button">Passer la whitelist</a>
                @elseif ($whitelist->statut == 1)
                    Votre demande de whitelist est en supérvision par notre équipe administrative. Merci de patienter.
                @elseif ($whitelist->statut == 2)
                    Félicitation votre demande de whitelist a été accepté. Vous pouvez vous connecter en jeu.
                @elseif ($whitelist->tryout < 3)
                    Votre demande de whitelist a été refusée pour la raison suivante: {!! $whitelist->comment !!}({{ $whitelist->tryout }}/3 tentatives restantes)<br><br>
                    <a class="btn btn-primary" href="{{ route('whitelist.create') }}" role="button">Re-tenter la whitelist</a>
                @else
                    Votre demande de whitelist a été refusée pour la raison suivante: {{ $whitelist->comment }}. ({{ $whitelist->tryout }}/3 tentatives)<br>
                    Vous n'avez plus de tentatives, vous ne correspondez pas aux attentes du serveur.
                @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection