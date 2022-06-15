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
                @if (Auth::User()->discord_id != 0)
                    @if (!$whitelist)
                    Vous vous apprêtez à passer la whitelist pour jouer sur San Fierro RolePlay, assurez-vous d'avoir correctement lu le règlement du serveur,
                    vous n'avez le droit qu'à 3 chances. <br><br>
                    <a class="btn btn-primary" href="{{ route('whitelist.create') }}" role="button">Passer la whitelist</a>
                    @elseif ($whitelist->statut == 0)
                    Vous vous apprêtez à passer la whitelist pour jouer sur San Fierro RolePlay, assurez-vous d'avoir correctement lu le règlement du serveur,
                    vous n'avez le droit qu'à 3 chances. <br><br>
                    <a class="btn btn-primary" href="{{ route('whitelist.create') }}" role="button">Passer la whitelist</a>
                    @elseif ($whitelist->statut == 1)
                        Votre demande de whitelist est en supérvision par notre équipe administrative. Merci de patienter.
                    @elseif ($whitelist->statut == 2)
                        Votre demande de whitelist a été traité par {{ $whitelist->admin }}. Félicitation vous avez été accepté, vous pouvez vous connecter en jeu. Commentaire Staff:<br>
                        @if ($whitelist->comment == "")
                            <p>Aucun commentaire.</p><br>
                        @else 
                            {!! $whitelist->comment !!}<br>
                        @endif
                        ({{ $whitelist->tryout }}/3 tentatives)
                    @elseif ($whitelist->statut == 3 && $whitelist->tryout < 3)
                        Votre demande de whitelist a été traité par {{ $whitelist->admin }}. Vous avez été refusée. Commentaire Staff:<br>
                        @if ($whitelist->comment == "")
                            <p>Aucun commentaire.</p><br>
                        @else 
                            {!! $whitelist->comment !!}<br>
                        @endif
                        
                        ({{ $whitelist->tryout }}/3 tentatives)<br>
                        <a class="btn btn-primary mt-2" href="{{ route('whitelist.create') }}" role="button">Re-tenter la whitelist</a>
                    @else
                        Votre demande de whitelist a été traité par {{ $whitelist->admin }}. Vous avez été refusée définitivement. Commentaire Staff:<br>
                        {!! $whitelist->comment !!}<br>
                        ({{ $whitelist->tryout }}/3 tentatives)
                    @endif
                @else
                    <p>Vous devez d'abord <span class="font-weight-bold text-primary">synchroniser</span> votre compte discord avant de pouvroir passer la whitelist.</p>
                @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection